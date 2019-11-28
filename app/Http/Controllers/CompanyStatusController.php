<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyStatus;

class CompanyStatusController extends Controller
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
        $status=CompanyStatus::orderBy('id','desc')->get();
        return view('pages.company_status.index')->with('permissions',$status);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Company_status.create');
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status=request('status');
$color=request('color');
        CompanyStatus::create(['company_status' => $status,'color'=>$color]);
        toastr()->success('Status has been Created successfully!');

        return redirect('CompanyStatus');
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
        $permission=CompanyStatus::where('id',$id)->first();
        return view('pages.Company_status.edit')->with('permission',$permission);
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
        $permission=CompanyStatus::where('id',$id)->first();
        $permission->company_status=request('status');
        $permission->color=request('color');

        $permission->save();
        toastr()->success('Status has been Updated successfully!');

        return redirect('CompanyStatus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission=CompanyStatus::where('id',$id)->first();
        $permission->delete();
        toastr()->error('Status has been Deleted successfully!');

        return redirect('CompanyStatus');
    }
}
