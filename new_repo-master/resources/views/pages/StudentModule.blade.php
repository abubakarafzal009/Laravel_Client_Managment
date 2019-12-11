@extends('layouts.app')


@push('css')
@toastr_css
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <style>
  .not-allowed{
    opacity: 0.5;
    cursor:not-allowed;
  }
  </style>
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
                    <h2 class="content-header-title float-left mb-0">Student Course</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Student Course
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
    
    
    </div>
                    <!-- DataTable starts -->
                    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Student Course</h4>


                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <!-- <p class="card-text">Gestione del parco contenitori</p> -->
                            <div class="col-sm-4"></div>
   
    </div>
                            <div class="table-responsive">
                            <table class="table table-sm data-list-view">
                            <thead>
                                <tr>
                                
                                    <th>Course Modules</th>
                                     <th>Level</th>
                                     <th>Progress</th>

                                   <!-- <th>ORDER STATUS</th>
                                    <th>PRICE</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            

                             
                               @foreach($student as $course)
                              
                              
                                <tr @if(count(student_progress($course->id))==0) class="not-allowed" @endif >
                      
                                    <td class="product-name">{{$course->Module_Name}}</td>
                                    <td class="product-category">{{$course->Level}}</td>
                                  

                                    

                                    <!-- <td>
                                        <div class="progress progress-bar-success">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:97%"></div>
                                        </div>
                                    </td> -->
                                    @foreach(student_progress($course->id) as $progress)
                                    @if($progress->Progress=="on going")
                                    <td>
                                        <div class="chip chip-warning">
                                            <div class="chip-body">
                                                <div class="chip-text">On Going</div>
                                            </div>
                                        </div>
                                    </td>
                                    @elseif($progress->Progress=="Start")
                                    <td>
                          <div class="chip chip-danger">
                              <div class="chip-body">
                                  <div class="chip-text">Start</div>
                              </div>
                          </div>
                      </td>
                      @elseif($progress->Progress=="Pass")
                      <td>
                          <div class="chip chip-success">
                              <div class="chip-body">
                                  <div class="chip-text">Pass</div>
                              </div>
                          </div>
                      </td>
                      @else
                      <td>
                          <div class="chip chip-danger">
                              <div class="chip-body">
                                  <div class="chip-text">Nothing</div>
                              </div>
                          </div>
                      </td>
                      @endif
                      @endforeach
                                </tr>
                                @endforeach   
                               
                
                     
                
                   
                            </tbody>
                        </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                    <!-- DataTable ends -->

                    <!-- add new sidebar starts -->
                    
                    <!-- add new sidebar ends -->
                </section>
                <!-- Data list view end -->

            </div>
    <!--/ Zero configuration table -->
  @push('js')

  @jquery
  @toastr_js
  @toastr_render
  @endpush
@endsection

