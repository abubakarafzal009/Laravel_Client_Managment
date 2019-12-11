@extends('layouts.app')


@push('css')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@toastr_css
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  


@endpush
@section('content')

@role('Student')
<div class="content-body" id="app">
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
                            
    
    <!-- <div class="input-group mb-3">
        <input type="text" class="form-control" @keyup="onChange($e)" v-model="form.name" name="name">
        <div class="input-group-append">
<button  class="btn btn-primay fabutton" style="background-color:#7367f0; color:white; padding:10px;"><i class="fa fa-search"></i></button>
        </div>
    </div> -->

                            <div class="table-responsive">
                            <table class="table table-sm data-list-view">
                            <thead>
                                <tr>
                                <th></th>
                                    <th>Course Name</th>
                                   
                                    <!-- <th>POPULARITY</th>
                                    <th>ORDER STATUS</th>
                                    <th>PRICE</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            

                              
                                <tr v-for="results in result">
                                    <td>
                                    <div class="custom-control custom-checkbox">
                                                        
                                                        <input type="checkbox" class="custom-control-input course_selection my_select" :value="results.course_id" name="customCheck" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1"></label>

                                                       
                                                    </div>
                                    </td>
                                    <td class="product-name">@{{results.course_name}}</td>
                                    <!-- <td class="product-category">
                                    <ul>
                                    <li></li>
                                    </ul>
                                    </td> -->
                                    <!-- <td>
                                        <div class="progress progress-bar-success">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:97%"></div>
                                        </div>
                                    </td> -->
                                    <!-- <td>
                                        <div class="chip chip-warning">
                                            <div class="chip-body">
                                                <div class="chip-text">on hold</div>
                                            </div>
                                        </div>
                                    </td> -->
                                
                                </tr>
                               
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
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endrole
  @push('js')
  <script>
new Vue({
  el: '#app',
  data: {
	  form:{
		name:null,
	  },
    result:[],
  },
  methods:{
    onChange($event)
	  {
		
		  axios.get('/search-course',this.form)
		  .then(response=>console.log(response.data))
	  }
  },
  created() {
      
    axios.get('/search-course')
      .then(response=>this.result=response.data)
  },
  
})
</script>
  <script>
        $('.my_select').val(function(){

return $(this).data('value');

});
  $(document).on('click','.course_selection',function(){
      id=this.value;
          $.post('{{route("StudentCourse.store")}}' , {_token: '{{ csrf_token() }}' , id: id} , function(data){


response = $.parseJSON(data);
if(response.feedback == 'true')
{
 
 
    toastr.success('You have Enrolled SucessFully' , 'Success');
              setTimeout(function(){
                window.location.href = "{{ route('StudentCourse.index') }}";
              }, 1000);
}
else
{
  toastr.error('Something went Wrong' , 'Error');
}
});

  });

  </script>
  @jquery
  @toastr_js
  @toastr_render
  @endpush
@endsection

