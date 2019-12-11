<?php

namespace App\Http\Controllers;

use App\CourceDetail;
use App\StudentCourceDetail;
use App\User;
use Illuminate\Http\Request;

class StudentRecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Check_Record()
    {
        $student=request('student');
        
    }
    public function search_course(Request $request)
    {
        $result="";
        $name=request('name');
     
      $student =User::role('Student')->where('id',auth()->user()->id)->get();
        if($student)
        {
            $course=StudentCourceDetail::where('student_id',auth()->user()->id)->get();
            
            if(count($course)==0)
            {
                if($name)
                {
                   
                   $result= CourceDetail::groupBy('cource_details.id')->join('cource_modules','cource_modules.course_id','=','cource_details.id')->where('cource_modules.Level','1')->where('cource_details.course_name',$name)->orderBy('cource_details.id','desc')->get();

                }
                else
                {
                    $result= CourceDetail::groupBy('cource_details.id')->join('cource_modules','cource_modules.course_id','=','cource_details.id')->where('cource_modules.Level','1')->orderBy('cource_details.id','desc')->get();

                }
            }
            return response($result);
    
        }
    }
    
}
