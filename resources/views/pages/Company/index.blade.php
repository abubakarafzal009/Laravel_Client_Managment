@extends('layouts.app')

@push('css')
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
                    <h2 class="content-header-title float-left mb-0">Role</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Role
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
      
@role('SuperAdmin')
@else
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <a href="{{route('Company.create')}}" class="btn btn-primary pull-right"> <i class="fa fa-plus"></i></a>
        </div>
        @endrole   
    </div>
               <!-- DataTable starts -->
                    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Role</h4>


                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text">Role</p>
                            <div class="table-responsive">
                                <table class="table table-sm zero-configuration">
                                    <thead>
                                    <tr>
                                        <th> <a href="#">Id </a>  </th>
                                        <th> <a href="#">Name </a> </th>
                                        <th>  <a href="#">Address </a> </th>
                                       

                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($role as $roles)
                                    <tr>
                                    <td>{{$roles->id}}</td>
                                    <td>{{$roles->name}}</td>
                                    <td>{{$roles->address}}</td>

                                  @role('SuperAdmin')   

                                  @else 
                                        <td>
                                                <a href="{{route('Company.edit',$roles->id)}}" class=""><i
                                                    class="feather icon-edit" vx-tooltip
                                                    title="Modifica"></i></a>
                                       
                                                    <button class="fabutton"  data-toggle="modal" data-target="#confirm-delete{{$roles->id}}">
                                                            <i class="feather icon-trash"></i>
                                                        </button>
                                        </td>
                                        @endrole
                            </tr>
                            <div class="modal fade" id="confirm-delete{{$roles->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                       Do You Really Want to Delete?
                                                    </div>
                                                    <div class="modal-body">
                                                            <form action="{{route('Company.destroy', $roles->id)}}" method="POST">
                            
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

