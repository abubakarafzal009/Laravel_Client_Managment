@extends('layouts.app')

@section('content')
@push('css')
 
<script type="text/javascript" src="{{asset ('app-assets/css/plugins/mock.js')}}"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset ('app-assets/css/plugins/jquery.dropdown.css')}}">
<script src="{{asset ('app-assets/css/plugins/jquery.dropdown.js')}}"></script>
@endpush
<div class="card">
        <div class="card-header">
            <h4 class="mb-0">Student Course</h4>

        </div>
        @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div style="color:red; font-size:14px;">{{$error}}</div>
     @endforeach
 @endif
        <form class="form form-vertical" method="POST" action="{{ route('StudentCourse.update',$student) }}">
            @csrf
            @method('PUT')
            <div class="card-content">
                <div class="card-body">
                <!-- <div class="form-group row">
                <label class="control-label col-sm-4 text-right font-weight-bold" for="name">Name</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                        <input name="name" type="text" class="form-control input-sm" value=""
                                   placeholder="Name" require>
                                         
                        </div>
                    </div> -->
                   
                    <!-- <div class="form-group row">
                    <label class="control-label col-sm-4 text-right font-weight-bold" for="email">Email</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                        <input name="email" type="email" class="form-control input-sm" value=""
                                   placeholder="Email" require>
                                            
                        </div>
                    </div>
                    <hr> -->
                    <!-- <div class="form-group row">
                    <label class="control-label col-sm-4 text-right font-weight-bold" for="email">Phone Number</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                        <input name="phone" type="number" class="form-control input-sm" value=""
                                   placeholder="Phone Number" require>
                                            
                        </div>
                    </div>
                    <hr> -->
                    <!-- <div class="form-group row">
                    <label class="control-label col-sm-4 text-right font-weight-bold" for="password">Designation</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                        <input name="designation" type="text" class="form-control input-sm" value=""
                                   placeholder="Designation" require>
                       
                        </div>
                    </div>

                    <hr> -->
                  
                    <div class="form-group row">
                            <label class="control-label col-sm-4 text-right font-weight-bold"
                                   for="crud-contratto">Student</label>
                            
                                   <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <select class="form-control" name="student" id="basicSelect">
                            @foreach(student() as $stu)
                                                        <option @if($stu->id==$student) selected @endif value="{{$stu->id}}">{{$stu->name}}</option>
                                                      @endforeach  

                                                    </select>
                                   </div>
                        </div>
                    <div class="form-group row">
                            <label class="control-label col-sm-4 text-right font-weight-bold"
                                   for="crud-contratto">Course</label>
                            <div class="col-sm-8 dropdown-mul-2" id="wrap-contratto">
                      
                            <select required="" data-select-2="" name="course[]"
                                        class="form-control input-sm select2-hidden-accessible" multiple id="crud-contratto mul-2">
                                   @foreach (course() as $item)
                                   @foreach(courses($student) as $stu)
                                
                            <option @if($item->id==$stu->course_id) selected @endif value="{{$item->id}}">{{$item->course_name}}</option>
                                       
                                   @endforeach
                                    @endforeach
                                   
                                </select>
                            </div>
                        </div>
                   


                </div>
            </div>
            <div class="card-footer mb-3">
                <div class="pull-right">

                <button type="reset" class="btn btn-warning btn-xs text-white">Cancel</button>
                &nbsp;&nbsp;&nbsp;
                   <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Register</button>
                   
                </div>
            </div>
        </form>
    </div>









    <script>
            var Random = Mock.Random;
            var json1 = Mock.mock({
              "data|10-50": [{
                name: function () {
                  return Random.name(true)
                },
                "id|+1": 1,
                "disabled|1-2": true,
                groupName: 'Group Name',
                "groupId|1-4": 1,
                "selected": false
              }]
            });
        
            $('.dropdown-mul-1').dropdown({
              data: json1.data,
              limitCount: 40,
              multipleMode: 'label',
              choice: function () {
                // console.log(arguments,this);
              }
            });
        
            var json2 = Mock.mock({
              "data|10000-10000": [{
                name: function () {
                  return Random.name(true)
                },
                "id|+1": 1,
                "disabled": false,
                groupName: 'Group Name',
                "groupId|1-4": 1,
                "selected": false
              }]
            });
        
            $('.dropdown-mul-2').dropdown({
              limitCount: 5,
              searchable: false
            });
        
            $('.dropdown-sin-1').dropdown({
              readOnly: true,
              input: '<input type="text" maxLength="20" placeholder="Search">'
            });
        
          
          </script>


@endsection