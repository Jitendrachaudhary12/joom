@extends('admin.layouts.app')

@section('content')
@if(auth()->user()->user_role==1)
  <section>
	  <div class="row">
        <div class="col-xl-3 col-md-6 col-12 ">
            <a  href="{{ route('users') }}">
          	<div class="box bg-primary">
              <div class="box-body">
                <div class="flexbox">
                  <h5>Total User</h5>
                  
                </div>
                <?php 
                 $totalproject= DB::Table('users')->where('user_role','!=',1)->get()->count();
                ?>
                <div class="text-center my-2">
                  <div class="font-size-60 text-white">{{$totalproject}}</div>
                
                </div>
              </div>

              <div class="card-body bg-gray-light py-12">
              
              </div>

              <div class="progress progress-xxs mt-0 mb-0">
                <div class="progress-bar bg-info" role="progressbar" style="width: 65%; height: 3px;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            </a>
        </div>
      </div>	
	</section>
      @else
      <section>
	  <div class="row">
        <div class="col-xl-3 col-md-6 col-12 ">
        <a href="{{ url('user/tasks') }}">
          	<div class="box bg-primary">
              <div class="box-body">
                <div class="flexbox">
                  <h5>Total Tasks</h5>
                  
                </div>
                <?php 
                 $users_task= DB::Table('users_task')->where('user_id',auth()->user()->id)->get()->count();
                ?>
                <div class="text-center my-2">
                  <div class="font-size-60 text-white">{{$users_task}}</div>
                
                </div>
              </div>

              <div class="card-body bg-gray-light py-12">
              
              </div>

              <div class="progress progress-xxs mt-0 mb-0">
                <div class="progress-bar bg-info" role="progressbar" style="width: 65%; height: 3px;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            </a>
        </div>
      </div>	
	</section>
      @endif
@endsection
