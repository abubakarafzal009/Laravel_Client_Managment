<?php

use App\CourceDetail;
use App\CourceModule;
use App\StudentCourceDetail;
use App\StudentProgress;
use App\user;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
function students($id)
{
    $student= StudentCourceDetail::where('course_id',$id)->get();
return $student;
}
function permission()
{
    return Permission::orderBy('id','desc')->get();
}
// function status()
// {
//     return CompanyStatus::orderBy('id','desc')->get();
// }
// function company()
// {
//     return Company::where('employee_id',auth()->user()->id)->get();
// }
function role()
{
    return Role::orderBy('id','desc')->get();
}
function all_permission($id)
{
    return Permission::join('role_has_permissions','permissions.id','=','role_has_permissions.permission_id')->where('role_has_permissions.role_id',$id)->get();
}
function course_selection()
{
    if(User::role('Student')->where('id',auth()->user()->id))
    {
        $course=StudentCourceDetail::where('student_id',auth()->user()->id)->get();
        
        if(count($course)==0)
        {
            
            return CourceDetail::groupBy('cource_details.id')->join('cource_modules','cource_modules.course_id','=','cource_details.id')->where('cource_modules.Level','1')->orderBy('cource_details.id','desc')->get();
        }

    }
}
function all_roles($id)
{
    return Role::join('model_has_roles','model_has_roles.role_id','=','roles.id')->where('model_has_roles.model_id',$id)->where('model_has_roles.model_type','App\User')->get();
}
function modules($id)
{
    return CourceModule::where('course_id',$id)->get();
}
function student()
{
   return User::role('Student')->get();
}
function course()
{
    return CourceDetail::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
}
function courses($id)
{
    return StudentCourceDetail::where('student_id',$id)->groupBy('student_id')->get();
}
function student_progress($id)
{
    $student= StudentProgress::where('course_module',$id)->where('student_id',auth()->user()->id)->get();
    return $student;
}
function progress($id)
{
    
    $student= StudentProgress::where('course_module',$id)->get();
    return $student;
}
function check_previous($id)
{
$student=StudentProgress::join('cource_modules','student_progresses.course_module','=','cource_modules.id')->where('cource_modules.id',$id)->get();

return $student;
}
function all_course()
{
    return CourceDetail::orderBy('id','desc')->get();
}
function progress_id($id)
{
    $student= StudentProgress::where('course_module',$id)->first();
$ida=$student->id;
return $ida;
}