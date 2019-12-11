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
            <h4 class="mb-0">Course</h4>

        </div>
        <form class="form form-vertical" method="POST" action="{{ route('CourseDetail.store') }}">
            @csrf
            <div class="card-content">
                <div class="card-body">
                   
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Course Name</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <input name="course" type="text" class="form-control input-sm" value=""
                                   placeholder="Company Name" required>
                        </div>
                    </div>

                    <hr>
                <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                <h3>Add Module For Course</h3>
                </div>

             
                 
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <a href="javascript:void(0);" class="btn btn-primary pull-right add-div" title="Add field" style="margin-top: 16px;"> <i class="fa fa-plus"></i></a>
        </div>
                        </div>
                 
                
                    <div class="field_wrapper parent-of-copied">
                 
                    <div class="form-group row extend-form to-copy">

                     <div class="col-lg-12">
                     <div class="pull-right" style="margin-top: 12px;">
                    <div class="content-header-right text-md-right  d-md-block d-none">
        <a href="javascript:void(0);" class="btn btn-primery remove-div" style="background-color: red; color:white;" title="Remove Module"> <i class="fa fa-minus" aria-hidden="true"></i></a>
        </div>
                    </div>
                      <div class="col-sm-4 pull-right">
                        <label class="control-label  text-right font-weight-bold" for="crud-indirizzo_carico">Module Name</label>
                        <div  id="wrap-indirizzo_carico">
                            <input name="name[]" type="text" class="form-control input-sm" value=""
                                   placeholder="Module Address" required>
                        </div>
                        </div>
                        <div class="col-sm-4 pull-right">
                            <label class="control-label  text-right font-weight-bold"
                                   for="crud-contratto">Level</label>
                            
                
                            <select class="form-control" name="level[]" id="basicSelect" required>
                                                        <option value="level 1">Level 1</option>
                                                        <option value="level 2">Level 2</option>
                                                        <option value="level 3">Level 3</option>
                                                        <option value="level 4">Level 4</option>

                                                    </select>
                           
                            
                        </div>
                 
                        </div>    
                  
                    </div>
                   
                    </div>
                   
                    

                </div>
            </div>
            <div class="card-footer mb-3">
                <div class="pull-right">

              
                      <button type="reset" class="btn btn-warning btn-xs text-white">Cancel</button>  
                   
                    <button type="submit" class="btn btn-success btn-xs text-white">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>






    <script type="text/javascript">
// $(document).ready(function(){
//     var maxField = 10; //Input fields increment limitation
//     var addButton = $('.add_button'); //Add button selector
//     var wrapper = $('.field_wrapper'); //Input field wrapper
//     var fieldHTML = '<div class="form-group row"><div class="col-lg-12"><div class="pull-right" style="margin-top: 12px;"><div class="content-header-right text-md-right  d-md-block d-none"><a href="javascript:void(0);" class="btn btn-primery remove_button" style="background-color: red; color:white;" title="Remove Module"> <i class="fa fa-minus" aria-hidden="true"></i></a></div></div><div class="col-sm-4 pull-right"><label class="control-label  text-right font-weight-bold" for="crud-indirizzo_carico">Module Name</label><div  id="wrap-indirizzo_carico"><input name="address" type="text" class="form-control input-sm" value="" placeholder="Company Address" required></div></div><div class="col-sm-4 pull-right"><label class="control-label  text-right font-weight-bold" for="crud-contratto">Level</label><div class="dropdown-mul-2" id="wrap-contratto"><select required="" data-select-2="" name="status" class="form-control input-sm select2-hidden-accessible"  id="crud-contratto mul-2"><option value="1">Sample</option></select></div></div></div></div>'; //New input field html 
//     var x = 1; //Initial field counter is 1
    
//     //Once add button is clicked
//     $(addButton).click(function(){
//         //Check maximum number of input fields
//         if(x < maxField){ 
//             x++; //Increment field counter
//             $(wrapper).append($(".extend-form")); //Add field html
//         }
//     });
    
//     //Once remove button is clicked
//     $(wrapper).on('click', '.remove_button', function(e){
//         e.preventDefault();
//        $(document).removeClass('extend-form'); //Remove field html
//         x--; //Decrement field counter
//     });
// });
</script>

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

<script>
                $(function() {
                  document.querySelector('.add-div').onclick = function() {
                    document.querySelector('.parent-of-copied').insertAdjacentHTML('beforeend', `<div class="form-group row extend-form to-copy">

                     <div class="col-lg-12">
                     <div class="pull-right" style="margin-top: 12px;">
                    <div class="content-header-right text-md-right  d-md-block d-none">
        <a href="javascript:void(0);" class="btn btn-primery remove-div waves-effect waves-light" style="background-color: red; color:white;" title="Remove Module"> <i class="fa fa-minus" aria-hidden="true"></i></a>
        </div>
                    </div>
                      <div class="col-sm-4 pull-right">
                        <label class="control-label  text-right font-weight-bold" for="crud-indirizzo_carico">Module Name</label>
                        <div id="wrap-indirizzo_carico">
                            <input name="name[]" type="text" class="form-control input-sm" value="" placeholder="Module Name" required>
                        </div>
                        </div>
                        <div class="col-sm-4 pull-right">
                            <label class="control-label  text-right font-weight-bold" for="crud-contratto">Level</label>
                           
                
                            <select class="form-control" name="level[]" id="basicSelect" required>
                            <option value="level 1">Level 1</option>
                                                        <option value="level 2">Level 2</option>
                                                        <option value="level 3">Level 3</option>
                                                        <option value="level 4">Level 4</option>
                                                    </select>
     
                            
                       
                 
                        </div>    
                  
                    </div>`);
                  }
                })


                $(document).on('click','.remove-div', function() {
                  $(this).closest('.to-copy').remove();
                });
              </script>

@endsection