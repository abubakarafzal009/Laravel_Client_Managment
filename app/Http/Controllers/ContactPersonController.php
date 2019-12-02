<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactPerson;
use App\User;

class ContactPersonController extends Controller
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
        $users = User::role('SuperAdmin')->get();
        if($users)
        {
            $user=ContactPerson::orderBy('id','desc')->paginate(10);

        }
        else{
            $user=ContactPerson::orderBy('id','desc')->where('employee_id',auth()->user()->id)->paginate(10);

        }
        return view('pages.ContactPerson.index')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.ContactPerson.create');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = array(
            // Names In Form
            'email.required' => 'This Field is Required',
            'phone.required' => 'This Field is Required',
            'designation.required' => 'This Field is Required',
            'company.required' => 'This Field is Required', 

        
            
    
            );
            $rules = array(
                'email' => 'unique:contact_people,email',
                'phone' => 'required',
                'designation'=>'required',

               'company'=>'required'
            
            );
            $validator = \Validator::make($request->all(), $rules , $messages);
            if ($validator->fails())
            {
                // dd($validator->messages);

                return Redirect::back()->withErrors($validator);
            }
     else
     {
        $user=new ContactPerson();
       
        $user->email=request('email');
        $user->designation=request('designation');
        // $user->mobile=request('mobile');
     $user->company_id=request('company');
     $user->employee_id=auth()->user()->id;
        $user->phone=request('phone');
        $user->save();
       
        toastr()->success('Person has been saved successfully!');
        return redirect('ContactPerson');
     }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['person']=ContactPerson::where('id',$id)->where('employee_id',auth()->user()->id)->first();
        // $data['roles']=User::join('model_has_roles','model_has_roles.model_id','=','users.id')->where('model_has_roles.model_type','App\User')->where('model_has_roles.model_id',$id)->get();
        // dd($data['roles']);
        return view('pages.ContactPerson.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=ContactPerson::where('id',$id)->first();
       
            
        // dd(request('email'));
      if(request('email')==$user->email)
      {
        $messages = array(
            // Names In Form
            'email.required' => 'This Field is Required',
            'phone.required' => 'This Field is Required',
            'company.required'=>'This Field is Required',
            'designation.required'=>'This Field is Required'
          
        
            );
        $rules = array(
           
            'phone' => 'required',
            'company'=>'required',
            'designation'=>'required',
            
          
        );
        $validator = \Validator::make($request->all(), $rules , $messages);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
           
        //    $user->name=request('name');
        $user->email=request('email');
       $user->phone=request('phone');
       $user->company_id=request('company');
       $user->designation=request('designation');
     $user->employee_id=auth()->user()->id;

        //    \DB::table('model_has_roles')->where('model_id',$id)->delete();
           $user->update();

        //    foreach(request('role') as $role)
        //    {
        //        $user->assignRole($role);
        //    }

           return redirect('ContactPerson');
        }
      }
      else
      {
        $messages = array(
            // Names In Form
            'email.required' => 'This Field is Required',
            'phone.required' => 'This Field is Required',
            'company.required'=>'This Field is Required',
            'designation.required'=>'This Field is Required'
          
        
            );
        $rules = array(
            'email' => 'unique:contact_people,email',
            'phone' => 'required',
         
        
        );
        $validator = \Validator::make($request->all(), $rules , $messages);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
           
        }
        else
        {
           
            $user->email=request('email');
            $user->phone=request('phone');
            $user->company_id=request('company');
            $user->designation=request('designation');
     $user->employee_id=auth()->user()->id;
       
          
           $user->update();

           
           toastr()->success('Person has been Updated successfully!');

           return redirect('ContactPerson');
        }
      }
     
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=ContactPerson::where('id',$id)->where('employee_id',auth()->user()->id)->first();
      $user->delete();
      toastr()->error('Person has been Deleted successfully!');

      return redirect('ContactPerson');
    }
}
