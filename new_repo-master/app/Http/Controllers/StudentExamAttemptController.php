<?php

namespace App\Http\Controllers;

use App\StudentExamAttempt;
use Illuminate\Http\Request;

class StudentExamAttemptController extends Controller
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
        $student=StudentExamAttempt::where('created_by',auth()->user()->id)->get();
        return view('pages.StudentExamAttempt.index')->with('student',$student);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.StudentExamAttempt.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attempt=new StudentExamAttempt();
        $attempt->created_by=auth()->user()->id;
        $attempt->Attempt=request('attempt');
        $attempt->exam_id=request('exams');
        $attempt->student_id=request('student');
        $attempt->save();
        toastr()->success('Exam Attempt has been Created successfully!');

        return redirect('StudentExams');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentExamAttempt  $studentExamAttempt
     * @return \Illuminate\Http\Response
     */
    public function show(StudentExamAttempt $studentExamAttempt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentExamAttempt  $studentExamAttempt
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attempt=StudentExamAttempt::where('id',$id)->where('created_by',auth()->user()->id)->first();
        return view('pages.StudentExamAttempt.edit')->with('attempt',$attempt);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentExamAttempt  $studentExamAttempt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $attempt=StudentExamAttempt::where('id',$id)->where('created_by',auth()->user()->id)->first();
        $attempt->exam_id=request('exams');
        $attempt->Attempt=request('attempt');
        $attempt->student_id=request('student');
        $attempt->created_by=auth()->user()->id;
        $attempt->update();
        toastr()->success('Exam Attempt has been Updated successfully!');

        return redirect('StudentExams');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentExamAttempt  $studentExamAttempt
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StudentExamAttempt::where('id',$id)->delete();
        toastr()->error('Exam Attempt has been Deleted successfully!');

        return redirect('StudentExams');
    }
}
