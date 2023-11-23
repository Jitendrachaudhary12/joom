 @extends('admin.layouts.app')
@section('content')
  <div class="col-sm-12">
    <div class="row searchmain-row">
      <div class="col-sm-10 ">
        <form action="{{route('add_users')}}" method="post">
          @csrf
        <div class="row">
            <div class="form-group">
              <label>First Name</label>
              <input type="text" name="name" class="form-control search_string" placeholder="type first Name" value="{{old('name')}}">
                 @if ($errors->has('name'))
                            <div class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                            @endif
            </div>
            &nbsp; &nbsp; &nbsp;
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" name="last_name" class="form-control search_string" placeholder="type last Name" value="{{old('last_name')}}">
                 @if ($errors->has('last_name'))
                            <div class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </div>
                            @endif
            </div>
            &nbsp; &nbsp; &nbsp;
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control search_string" placeholder="type email" value="{{old('email')}}">
                 @if ($errors->has('email'))
                            <div class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                            @endif
            </div>
            &nbsp; &nbsp; &nbsp;
            <div class="form-group">
              <label>Phone</label>
              <input type="text" name="phone" class="form-control search_string" placeholder="type phone" value="{{old('phone')}}">
                 @if ($errors->has('phone'))
                            <div class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </div>
                            @endif
          </div>
          &nbsp; &nbsp; &nbsp;
          <div class="form-group">
              <label>Password</label>
              <input type="text" name="password" class="form-control search_string autogenerate_pass" placeholder="type password" value="{{old('password')}}">
                 @if ($errors->has('password'))
                            <div class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                            @endif
              <br>
              <div class="checkbox">
              <input class="form-check-input " type="checkbox"  name="autogenerate" id="remember" class="form-control">
              <label for="remember">Auto generate</label>
            </div>
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