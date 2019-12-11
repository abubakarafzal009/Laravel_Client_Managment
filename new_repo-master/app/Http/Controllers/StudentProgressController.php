<?php

namespace App\Http\Controllers;

use App\CourceDetail;
use App\CourceModule;
use App\StudentCourceDetail;
use App\StudentProgress;

use Illuminate\Http\Request;
use Session;
class StudentProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $student=StudentProgress::where('created_by',auth()->user()->id)->orderBy('id','desc')->get();
        return view('pages.StudentProgress.index')->with('student',$student);
    }
public function check_progress($course="", $student="")
{
    \Session::put('course',request('course'));
   
    $student=StudentCourceDetail::join('cource_modules','student_cource_details.course_id','=','cource_modules.course_id')->where('cource_modules.course_id',request('course'))->where('student_cource_details.student_id',request('student'))->get();

    return view('pages.StudentProgress.index')->with('student',$student);
}
public function check_progress1()
{
    $student=StudentCourceDetail::join('cource_modules','student_cource_details.course_id','=','cource_modules.course_id')->where('student_cource_details.student_id',auth()->user()->id)->orderBy('cource_modules.id','asc')->get();
    
    return view('pages.StudentModule')->with('student',$student);
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.StudentProgress.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student=new StudentProgress();
        $student->Grades=request('grade');
        $student->student_id=request('student');
        $student->exam_id=request('exam');
        $student->progress=request('progress');
        $student->created_by=auth()->user()->id;
        $student->save();
        toastr()->success('Student Progress has been Created successfully!');

        return redirect('StudentProgress');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentProgress  $studentProgress
     * @return \Illuminate\Http\Response
     */
    public function show(StudentProgress $studentProgress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentProgress  $studentProgress
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $student=StudentProgress::where('course_module',$id)->first();
        $data['student']=StudentProgress::where('id',$student->id)->first();
        $data['id']=$id;
        return view('pages.StudentProgress.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @4param  \App\StudentProgress  $studentProgress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $student=StudentProgress::where('id',$id)->first();
        $id=Session::get('course');
$number=CourceModule::where('id','>',request('exam'))->where('course_id',$id)->first();
      if(request('progress')=="Pass" && $number)
      {
        $student->Grades=request('grade');
        $student->student_id=request('student');
        $student->course_module=request('exam');
        $student->progress=request('progress');
        $student->created_by=auth()->user()->id;
        $student1=new StudentProgress();
        
        $student1->student_id=request('student');
        $student1->course_module=$number->id;
        $student1->progress="Start";
        $student1->created_by=auth()->user()->id;
        $student1->save();
        $student->update();
      }
      else
      {
        $student->Grades=request('grade');
        $student->student_id=request('student');
        $student->course_module=request('exam');
        $student->progress=request('progress');
        $student->created_by=auth()->user()->id;
       
        $student->update();
      }        
        toastr()->success('Student Progress has been Created successfully!');

        return redirect('Progress-Selection');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentProgress  $studentProgress
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student=StudentProgress::where('id',$id)->where('created_by',auth()->user()->id)->first();
$student->delete();
toastr()->error('Student Progress has been Deleted successfully!');

return redirect('StudentProgress');

    }
}
