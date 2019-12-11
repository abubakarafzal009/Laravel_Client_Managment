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
                            <li class="breadcrumb-item active">Student progress
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
                        <h4 class="card-title">Student Progress</h4>


                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <!-- <p class="card-text">Gestione del parco contenitori</p> -->
                            <div class="table-responsive">
                            <table class="table table-sm zero-configuration">
                                    <thead>
                                    <tr>
                                        <th> <a href="#">Id </a>  </th>
                                        <th> <a href="#">Student Name</a> </th>
                                        <th> <a href="#">Module Name</a> </th>
                                        <th> <a href="#">Level</a> </th>
                                        <th> <a href="#">Progress</a> </th>
                                        <th> <a href="#">Action</a> </th>



                                      

                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($student as $permission)
                                     
                                        
                                        

                                    <tr
                                   @if(count(progress($permission->id))==0)
                                   class="not-allowed"
                                   @else
                                   @foreach(progress($permission->id) as $prog)
                                
                                        @if($prog->Progress=="Pass")

                                        class="not-allowed"
                                        @endif
                                         @endforeach
                                        
                                        @endif
                                      
                                        
                                         >
                                         
                                    <td>{{$permission->id}}</td>
                                    <td>{{$permission->student->name}}</td>
                                    <td>{{$permission->Module_Name}}</td>
                                    <td>{{$permission->Level}}</td>
                                  

                                    @foreach(progress($permission->id) as $progress)
                                  
                                   <td></td>
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
                                    
                                   
                     
                      <!-- <td>
                          <div class="chip chip-danger">
                              <div class="chip-body">
                                  <div class="chip-text">Nothing</div>
                              </div>
                          </div>
                      </td> -->
                     

                                    

                      

                                  
@role('SuperAdmin')

                                    <td >
                                            <a href="" class=""><i
                                                class="feather icon-edit" vx-tooltip
                                                title="Modifica"></i></a>
                                   
                                                <button class="fabutton"  data-toggle="modal" data-target="#confirm-delete{{$permission->id}}">
                                                        <i class="feather icon-trash"></i> 
                                                    </button>
                                    </td>
                                    
                                  
                                    @endrole
                                    @role('Teacher')

                                    <td>
                                            <a href="{{route('StudentProgress.edit',$permission->id)}}" class=""><i
                                                class="feather icon-edit" vx-tooltip
                                                title="Modifica"></i></a>
                                   
                                                <button class="fabutton"  data-toggle="modal" data-target="#confirm-delete{{$permission->id}}">
                                                        <i class="feather icon-trash"></i>
                                                    </button>
                                    </td>
                                  
                                    @endrole
                                
                        </tr>
                        <div class="modal fade" id="confirm-delete{{$permission->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                   Do You Really Want to Delete?
                                                </div>
                                                <div class="modal-body">
                                                        <form action="{{route('StudentProgress.destroy', $permission->id)}}" method="POST">
                        
                                                        @csrf
                                                @method('DELETE')
                                                </div>
                                                <div class="modal-footer">
                                                       
                                                        <button type="submit" class="btn btn-danger btn-ok">Delete</button>
                                                    </form>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                </div>
                                           
                                            </div>
                                        </div>
                                    </div>
@endforeach
                                    </tfoot>
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
  <script>
$(document).ready(function(){
  
    $('.not-allowed .fabutton').attr('disabled','');
    $('.not-allowed a').css('pointer-events','none');

})
    </script>
  @jquery
  @toastr_js
  @toastr_render
  @endpush
@endsection

