@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-header">
            <h4 class="mb-0">Student Progress</h4>

        </div>
        <form class="form form-vertical" method="POST" action="{{ route('StudentProgress.update',$student->id) }}">
            @csrf
            @method('PUT')
            <div class="card-content">
                <div class="card-body">
               
                                   <!-- <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Name</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <input name="name" type="text" class="form-control input-sm" value=""
                                   placeholder="Permission Name">
                        </div>
                    </div> -->
                    <div class="form-group row">
                            <label class="control-label col-sm-4 text-right font-weight-bold"
                                   for="crud-contratto">Student</label>
                            <div class="col-sm-8 dropdown-mul-2" id="wrap-contratto">
                
                                <select required data-select-2="" name="student"
                                        class="form-control input-sm select2-hidden-accessible"  id="crud-contratto mul-2">
                             
                            <option   selected  value="{{$student->student_id}}">{{$student->student->name}}</option>
                                                      
                           
                                </select>
                            </div>
                        </div>    
                    <hr>
                     
                        <hr>
                        <div class="form-group row">
                            <label class="control-label col-sm-4 text-right font-weight-bold"
                                   for="crud-contratto">Progress</label>
                            <div class="col-sm-8 dropdown-mul-2" id="wrap-contratto">
                
                                <select required data-select-2="" name="progress"
                                        class="form-control input-sm select2-hidden-accessible"  id="crud-contratto mul-2">
                            <option @if($student->Progress=="Start" || $student->Progress=="on going") disabled selected @endif value="Start">Start</option>
                              
                            <option @if($student->Progress=="on going" || $student->Progress=="Pass") selected @endif value="on going">on going</option>
                            <option @if($student->Progress=="Pass") selected @endif value="Pass">Pass</option>



                                </select>
                            </div>
                        </div>    
                        <input type="hidden" name="exam" value="{{$student->course_module}}">
                        <hr> 
                        <div class="form-group row">
                            <label class="control-label col-sm-4 text-right font-weight-bold"
                                   for="crud-contratto">Grade</label>
                            <div class="col-sm-8 dropdown-mul-2" id="wrap-contratto">
                
                                <select required="" data-select-2="" name="grade"
                                        class="form-control input-sm select2-hidden-accessible"  id="crud-contratto mul-2">
                              

                            <option @if($student->Grades=="1") selected @endif value="1">A+</option>
                            <option @if($student->Grades=="2") selected @endif value="2">A</option>
                            <option @if($student->Grades=="3") selected @endif value="3">B</option> 

                           
                                       
                                   
                                   
                                   
                                </select>
                            </div>
                        </div>    

                </div>
            </div>
            <div class="card-footer mb-3">
                <div class="pull-right">

                    <a class="btn btn-warning btn-xs text-white">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-success btn-xs text-white">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>












@endsection