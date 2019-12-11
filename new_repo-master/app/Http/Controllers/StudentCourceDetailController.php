<?php

namespace App\Http\Controllers;

use App\CourceModule;
use App\StudentCourceDetail;
use App\StudentProgress;
use App\User;
use Illuminate\Http\Request;

class StudentCourceDetailController extends Controller
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
        $teacher=User::role('Teacher')->where('id',auth()->user()->id)->first();
        $student=User::role('Student')->where('id',auth()->user()->id)->first();
       if($teacher)
       {
        $student=StudentCourceDetail::where('created_by',auth()->user()->id)->groupBy('student_id')->get();
        
       }
       elseif($student)
       {
        $student=StudentCourceDetail::where('student_id',auth()->user()->id)->get();
       

       }
       else
       {
        $student=StudentCourceDetail::groupBy('student_id')->orderBy('id','desc')->get();

       }
        return view('pages.StudentCourse.index')->with('student',$student);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.StudentCourse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new StudentCourceDetail();
        $id=request('student');
        $course_id=request('id');
        
if($course_id)
{
    $student=new StudentCourceDetail();
    $student->student_id=auth()->user()->id;
    $student->course_id=request('id');
    $student->save();
    $course=CourceModule::where('course_id',$student->course_id)->where('Level','1')->first();
    $progress=new StudentProgress();
    $progress->Progress="Start";
    $progress->course_module=$course->id;
    $progress->student_id=auth()->user()->id;

    $progress->save();
    $obj->feedback = 'true';
    return json_encode($obj);
}
 else
 {
    foreach(request('course') as $course)
    {
        $student=new StudentCourceDetail();

    $student->student_id=$id;
    $student->course_id=$course;
    $student->created_by=auth()->user()->id;
    $student->save();
    }
    toastr()->success('Student Course has been Created successfully!');

    return redirect('StudentCourse');
 }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentCourceDetail  $studentCourceDetail
     * @return \Illuminate\Http\Response
     */
    public function show(StudentCourceDetail $studentCourceDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentCourceDetail  $studentCourceDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        // $student=StudentCourceDetail::where('created_by',auth()->user()->id)->where('student_id',$id)->first();
        return view('pages.StudentCourse.edit')->with('student',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentCourceDetail  $studentCourceDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $id=request('student');
        // dd($id);
        StudentCourceDetail::whereStudentId($id)->where('created_by',auth()->user()->id)->delete();

        foreach(request('course') as $course)
        {
            $student=new StudentCourceDetail();

        $student->student_id=$id;
        $student->course_id=$course;
        $student->created_by=auth()->user()->id;
        $student->save();
        }
        toastr()->success('Student Course has been Updated successfully!');
        return redirect('StudentCourse');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentCourceDetail  $studentCourceDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //    dd($id);
        StudentCourceDetail::whereStudentId($id)->where('created_by',auth()->user()->id)->delete();
        toastr()->error('Student Course has been Deleted successfully!');

        return redirect('StudentCourse');
    }
}
