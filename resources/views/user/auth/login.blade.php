<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <title>Login</title> 
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor_components/bootstrap/dist/css/bootstrap.css') }}">
    
    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-extend.css') }}">
    
    <!-- theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/master_style.css') }}">
    
    <!-- horizontal menu style -->
    <link rel="stylesheet" href="{{ asset('admin/css/horizontal_menu_style.css') }}">
    
    <!-- Fab Admin skins -->
    <link rel="stylesheet" href=" {{ asset('admin/css/skins/_all-skins.css') }}">
    
    <!-- Morris charts -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor_components/morris.js/morris.css') }}">
  
</head>
<style>
.card {
   
    border: 2px solid black;
}
</style>
<body class="hold-transition register-page">
    
    
<div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">
            <div class="col-lg-4 col-md-8 col-12">
                <div class="register-box">
                  <div class="register-box-body">
                    <div class="text-center">Joom</div>
                    <h3 class="text-center">Get started with Us</h3>
                    <p class="login-box-msg">Sign in to start your session</p>
                      @if($errors->any())
                        <h4 class="alert alert-danger">{{$errors->first()}}</h4>
                        @endif
                    <form method="POST" action="{{ route('dologin_user') }}">
                        @csrf
                      <div class="form-group has-feedback">
                          <!--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>-->
                          <input id="email" type="email" class="form-control rounded @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
@if($errors->has('email'))
                          
                          <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('email')}}</strong>
                          </span>
                          @endif
                          
                        <!--<input type="email" class="form-control rounded" placeholder="Email">-->
                        <span class="ion ion-email form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                          
                          <input placeholder="Password" id="password" type="password" class="form-control rounded @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                               @if($errors->has('password')) 
                                
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('password')}}</strong>
                                    </span>
                                @endif
                          
                        <span class="ion ion-locked form-control-feedback"></span>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <div class="checkbox">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                              <label for="remember">{{ __('Remember Me') }}</label>
                          </div>
                        </div>
                       
                        <div class="col-12 text-center">
                            
                          <button type="submit" class="btn btn-info btn-block margin-top-10">SIGN IN</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            
            </div>
        </div>
    </div>
    
</body>
</html>
