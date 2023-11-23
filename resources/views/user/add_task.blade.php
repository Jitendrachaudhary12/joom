 @extends('admin.layouts.app')
@section('content')
  <div class="col-sm-12">
    <div class="row searchmain-row">
      <div class="col-sm-10 ">
        <form action="{{route('add_tasks')}}" method="post">
          @csrf
        <div class="row">
            <div class="form-group">
              <label>Start Time</label>
              <input type="datetime-local" name="start_time" class="form-control search_string" value="{{old('start_time')}}">
                 @if ($errors->has('start_time'))
                            <div class="help-block">
                                <strong>{{ $errors->first('start_time') }}</strong>
                            </div>
                            @endif
            </div>
            &nbsp; &nbsp; &nbsp;
            <div class="form-group">
              <label>Stop Time</label>
              <input type="datetime-local" name="stop_time" class="form-control search_string" value="{{old('stop_time')}}">
                 @if ($errors->has('stop_time'))
                            <div class="help-block">
                                <strong>{{ $errors->first('stop_time') }}</strong>
                            </div>
                            @endif
            </div>
            &nbsp; &nbsp; &nbsp;
            <div class="form-group">
              <label>Notes</label>
              <input type="text" name="notes" autocomplete="off" class="form-control search_string" placeholder="notes" value="{{old('notes')}}">
                 @if ($errors->has('notes'))
                            <div class="help-block">
                                <strong>{{ $errors->first('notes') }}</strong>
                            </div>
                            @endif
            </div>
            &nbsp; &nbsp; &nbsp;
            <div class="form-group">
              <label>Description</label>
             
              <textarea name="description" class="form-control"  autocomplete="off" placeholder="description">{{old('description')}}</textarea>
                 @if ($errors->has('description'))
                            <div class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </div>
                            @endif
          </div>
        </div>
        <div class="row">
          <input type="submit" value="Submit" class="btn btn-primary" name="">
        </div>
        </form>
      </div>
    </div>
  </div>
<script>

$("#remember").click(function(){
  if($(this).is(":checked"))
            {
              $.ajax({
               type: "GET",
                url: "{{route('autoGen')}}",
                cache: false,
                success: function(data)
                {
                  if (data.status){
                    $(".autogenerate_pass").val(data.data)

                  }

                }
  })
  }
})


</script>
  @endsection