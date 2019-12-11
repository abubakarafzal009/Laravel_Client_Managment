@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-header">
            <h4 class="mb-0">Studetn Exam Attempt</h4>

        </div>
        <form class="form form-vertical" method="POST" action="{{ route('StudentExams.update',$attempt->id) }}">
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

                    <hr>
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Attempt</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                        <select class="form-control" name="attempt" id="basicSelect">
                            
                                                        <option @if($attempt->Attempt=="1st") selected @endif value="1st">1st</option>
                                                        <option @if($attempt->Attempt=="2nd") selected @endif value="2nd">2nd</option>
                                                        <option @if($attempt->Attempt=="3rd") selected @endif value="3rd">3rd</option>
                                                        <option @if($attempt->Attempt=="4th") selected @endif value="4th">4th</option>

                                                    </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Exam</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                        <select class="form-control" name="exams" id="basicSelect">
                            
                                                        <option @if($attempt->exam_id=="1st") selected @endif value="1st">1st</option>
                                                        <option @if($attempt->exam_id=="2nd") selected @endif value="2nd">2nd</option>
                                                        <option @if($attempt->exam_id=="3rd") selected @endif value="3rd">3rd</option>
                                                        <option @if($attempt->exam_id=="4th") selected @endif value="3th">4th</option>

                                                    </select>
                        </div>
                    </div>
<hr>
<div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Student</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                        <select class="form-control" name="student" id="basicSelect">
                            @foreach(student() as $stu)
                                                        <option @if($stu->id==$attempt->student_id) selected @endif value="{{$stu->id}}">{{$stu->name}}</option>
                                                      @endforeach  

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