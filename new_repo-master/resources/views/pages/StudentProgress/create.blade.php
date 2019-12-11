@extends('layouts.app')
@push('css')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@endpush
@section('content')
<div class="card" id="app">
        <div class="card-header">
            <h4 class="mb-0">Student Progress</h4>

        </div>
        <form class="form form-vertical" method="POST" action="{{ route('StudentProgress.store') }}">
            @csrf
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
                
                                <select required v-model="form.student" name="student"  @change="studentonChange($event)"
                                        class="form-control input-sm select2-hidden-accessible"  id="crud-contratto mul-2">
                              @foreach(student() as $stu)
                            <option value="{{$stu->id}}">{{$stu->name}}</option>
                                             @endforeach           
                           
                                </select>
                            </div>
                        </div>    
                    <hr>
                    <!-- <div class="form-group row">
                            <label class="control-label col-sm-4 text-right font-weight-bold"
                                   for="crud-contratto">Exam</label>
                            <div class="col-sm-8 dropdown-mul-2" id="wrap-contratto">
                
                                <select required data-select-2="" name="exam"
                                        class="form-control input-sm select2-hidden-accessible"  id="crud-contratto mul-2">
                              
                            <option value="Exam 1">Exam 1</option>
                            <option value="Exam 2">Exam 2</option>
                            <option value="Exam 3">Exam 3</option>
                            <option value="Exam 4">Exam 4</option>
                            <option value="Exam 5">Exam 5</option>


                                </select>
                            </div>
                        </div>    
                        <hr> -->
                        <div class="form-group row">
                            <label class="control-label col-sm-4 text-right font-weight-bold"
                                   for="crud-contratto">Progress</label>
                            <div class="col-sm-8 dropdown-mul-2" id="wrap-contratto">
                
                                <select required data-select-2="" name="progress"
                                        class="form-control input-sm select2-hidden-accessible"  id="crud-contratto mul-2">
                              
                            <option value="on going">on going</option>
                            <option value="completed">completed</option>
                            <option value="Start">Start</option>



                                </select>
                            </div>
                        </div>    
                        <hr> 
                        <div class="form-group row">
                            <label class="control-label col-sm-4 text-right font-weight-bold"
                                   for="crud-contratto">Grade</label>
                            <div class="col-sm-8 dropdown-mul-2" id="wrap-contratto">
                
                                <select required="" data-select-2="" name="grade"
                                        class="form-control input-sm select2-hidden-accessible"  id="crud-contratto mul-2">
                              

                            <option value="Pass">Pass</option>
                            <option value="Fail">Fail</option> 
                           
                                       
                                   
                                   
                                   
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



@push('js')

<script>
new Vue({
  el: '#app',
  data: {
	  form:{
		student:null,
	  },
    progress:[],
  },
  methods:{
	  studentonChange($event)
	  {
          
		axios.post('/api/StudentRecord',this.form)
        .then(response=>this.progress=response.data)
		
	  }
  }
})
</script>



@endpush








@endsection