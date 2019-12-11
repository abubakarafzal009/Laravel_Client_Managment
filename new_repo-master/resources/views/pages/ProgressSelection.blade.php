@extends('layouts.app')

@push('css')
<style>
  .not-allowed{
    opacity: 0.5;
    cursor:not-allowed;
  }
  </style>
@toastr_css
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
@endpush

@section('content')

<div class="content-body">
                <!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">
                    <!-- <div class="action-btns d-none">
                        <div class="btn-dropdown mr-1 mb-1">
                            <div class="btn-group dropdown actions-dropodown">
                                <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Archive</a>
                                    <a class="dropdown-item" href="#">Print</a>
                                    <a class="dropdown-item" href="#">Another Action</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Student Progress</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Student Progress
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<!-- @role('SuperAdmin') 
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <a href="{{route('StudentProgress.create')}}" class="btn btn-primary pull-right"> <i class="fa fa-plus"></i></a>
        </div>
        @endrole
        @role('Teacher') 
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <a href="{{route('StudentProgress.create')}}" class="btn btn-primary pull-right"> <i class="fa fa-plus"></i></a>
        </div>
        @endrole -->
    </div>
  <div class="row">
@if(request('course')==null)
  @foreach(all_course() as $course)
    <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="card text-white bg-gradient-danger text-center">
                                <div class="card-content d-flex">
                                    <div class="card-body">
                                        
                                        <h4 class="card-title text-white mt-3">{{$course->course_name}}</h4>
                                        <p class="card-text">Donut toffee candy brownie.</p>
                                        <a href="{{url('Progress-Selection')}}?course={{$course->id}}">
                                        <button class="btn btn-danger btn-darken-3">See</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                       <?php
                       $id=request('course');
                     
                       ?>
                       @else
                        @foreach(students(request('course')) as $student)
                       
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="card text-white bg-gradient-danger text-center">
                                <div class="card-content d-flex">
                                    <div class="card-body">
                                        
                                        <h4 class="card-title text-white mt-3">{{$student->student->name}}</h4>
                                        <p class="card-text">Donut toffee candy brownie.</p>
                                        <a href="{{url('Progress')}}?course={{request('course')}}&student={{$student->student_id}}">
                                        <button class="btn btn-danger btn-darken-3">See</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        
  </div>
                    <!-- DataTable starts -->
                   

            </div>
    <!--/ Zero configuration table -->
    @push('js')
    @jquery
    @toastr_js
    @toastr_render
    @endpush
@endsection

