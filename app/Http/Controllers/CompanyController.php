<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
class CompanyController extends Controller
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
        $role=Company::where('employee_id',auth()->user()->id)->orderBy('id','desc')->paginate(10);
        return view('pages.Company.index')->with('role',$role);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Company.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Company::create(['name' => request('name'),'address'=>request('address'),'employee_id'=>auth()->user()->id]);
        toastr()->success('Company has been Created successfully!');
       
        return redirect('Company');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['role']=Company::where('id',$id)->where('employee_id',auth()->user()->id)->first();
        return view('pages.Company.edit')->with($data);
        //
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
        $permission=Company::where('id',$id)->where('employee_id',auth()->user()->id)->first();
        $permission->name=request('name');
        $permission->address=request('address');

        $permission->employee_id=auth()->user()->id;

        $permission->save();
        toastr()->success('Company has been Updated successfully!');

        return redirect('Company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission=Company::where('id',$id)->first();
        $permission->delete();
        toastr()->error('Company has been Deleted successfully!');

        return redirect('Company');
    }
}
