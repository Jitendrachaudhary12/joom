@extends('admin.layouts.app')
@section('content')
<div class="">
    
  <!-- <div class="allbutntbl">
    <a href="" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add City</a>
  
  </div> -->
  <div class="col-sm-12">
    <div class="row searchmain-row">
    
      <div class="col-sm-9  col-md-4">
        <form action="" method="GET">
        <div class="row">
        
          <div class="col-md-12 col-xs-12">
            <div class="searchmain">
              <input type="text" name="str" class="form-control search_string" placeholder="Search By Name" value="{{(@$parameters != '')?@$parameters:''}}">
              <button type="submit" class="btn btn-primary searchButton">Search</button>
              
            </div>
          </div>
        </div>
        </form>

      </div>
      <div class="col-sm-1  col-md-1">
        <a href="{{route('users')}}" class="btn btn-default reset" >Reset</a>
      </div>
      <div class="allbutntbl">
            <a href="{{route('add_users')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add User </a>
    
      
      </div>
    </div>
  </div>
</div>
<div class="col-sm-12">
<form role="form" class="form-element multi_delete_form mt15" action="" method="post">
  @csrf
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Sr.No.</th>
              <!-- <th>City Id</th> -->
              <th>Name</th>
              <th>Email</th>
                <!-- <th>Action</th> -->

            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <?php $i=1; ?>
                 <tr>
                  <td>{{$i}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                 </tr>
                 <?php $i++;?>
            @endforeach
         
          </tbody>
          
          </table>
        </div>
         </form>
</div>
@endsection
