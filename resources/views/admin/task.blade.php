@extends('admin.layouts.app')
@section('content')


 <div class="allbutntbl">
            <a href="{{route('export_task')}}" class="btn btn-primary"> Export </a>
      </div>
<h2>Task List</h2>


<div class="col-sm-12">
<form role="form" class="form-element multi_delete_form mt15" action="" method="post">
  @csrf
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Sr.No.</th>
              <th>Start Time</th>
              <th>Stop Time</th>
              <th>Notes</th>
              <th>Description</th>
            </tr>
          </thead>
          <tbody>

              <?php  $i=1; ?>
            @foreach($tasks as $task)
              
             <tr>
                <td>{{$i}}</td>
                <td>{{$task->start_time}}</td>
                <td>{{$task->stop_time}}</td>
                <td>{{$task->notes}}</td>
                <td>{{$task->description}}</td>
             </tr>
  <?php  $i++; ?>
            @endforeach
         
          </tbody>
          
          </table>
        </div>
         </form>
</div>
@endsection
