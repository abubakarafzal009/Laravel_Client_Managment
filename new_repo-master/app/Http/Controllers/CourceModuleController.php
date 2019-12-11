<?php

namespace App\Http\Controllers;

use App\CourceModule;
use Illuminate\Http\Request;

class CourceModuleController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourceModule  $courceModule
     * @return \Illuminate\Http\Response
     */
    public function show(CourceModule $courceModule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourceModule  $courceModule
     * @return \Illuminate\Http\Response
     */
    public function edit(CourceModule $courceModule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourceModule  $courceModule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourceModule $courceModule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourceModule  $courceModule
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourceModule $courceModule)
    {
        //
    }
}
