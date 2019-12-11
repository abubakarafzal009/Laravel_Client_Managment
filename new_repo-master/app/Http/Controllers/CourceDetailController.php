<?php

namespace App\Http\Controllers;

use App\CourceDetail;
use App\CourceModule;
use App\User;
use Illuminate\Http\Request;

class CourceDetailController extends Controller
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
       
        $course=CourceDetail::where('user_id',auth()->user()->id)->get();

      
      

       
        
        return view('pages.Course.index')->with('course',$course);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    $size=count(request('name'));  
    $course=new CourceDetail();
    $course->course_name=request('course');
    $course->user_id=auth()->user()->id;
    $course->save();
      for($i=0; $i<$size; $i++)
      {
        $module=new CourceModule();

         $module->Module_Name=request('name')[$i];
         $module->Level=request('level')[$i];
         $module->course_id=$course->id;
         $module->save();
      }
      toastr()->success('Course has been Created successfully!');
      return redirect('CourseDetail');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourceDetail  $courceDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CourceDetail $courceDetail)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourceDetail  $courceDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data['course']=CourceDetail::where('id',$id)->where('user_id',auth()->user()->id)->first();
        $course=CourceDetail::where('id',$id)->where('user_id',auth()->user()->id)->first();

        $data['module']=CourceModule::where('course_id',$course->id)->get();
        return view('pages.Course.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourceDetail  $courceDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $course=CourceDetail::where('id',$id)->first();
        CourceModule::where('course_id',$course->id)->delete();
        $size=count(request('name'));  
  
        $course->course_name=request('course');
        $course->user_id=auth()->user()->id;
        $course->update();
          for($i=0; $i<$size; $i++)
          {
            $module=new CourceModule();
    
             $module->Module_Name=request('name')[$i];
             $module->Level=request('level')[$i];
             $module->course_id=$course->id;
             $module->save();
          }
          toastr()->success('Course has been Updated successfully!');
          return redirect('CourseDetail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourceDetail  $courceDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course=CourceDetail::where('id',$id)->first();

        CourceModule::where('course_id',$course->id)->delete();
        $course->delete();
        toastr()->error('Course has been Deleted successfully!');
        return redirect('CourseDetail');

    }
}
