@extends('admin.layouts.auth')

@section('main-content')
  <main class="main-content col">
    <div class="main-content-container container-fluid px-4 my-auto h-100">
      <div class="row no-gutters h-100">
        <div class="col-lg-3 col-md-5 auth-form mx-auto my-auto">
          <div class="card">
            <div class="card-body">
              <img class="auth-form__logo d-table mx-auto mb-3" src="{{asset('/images/shards-dashboards-logo.svg')}}" alt="Shards Dashboards - Register Template">
              <h5 class="auth-form__title text-center mb-4">Access Your Account</h5>
              <form action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  <label>Email address</label>
                  <input type="email" class="form-control" name="email"  value="{{ old('email') }}" required autofocus placeholder="Enter email">
                  
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                  
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Password" name="password" required>

                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif

                </div>
                <div class="form-group mb-3 d-table mx-auto">
                  <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label">Remember me for 30 days.</label>
                  </div>
                </div>
                <button type="submit" class="btn btn-pill btn-accent d-table mx-auto">Access Account</button>
              </form>
            </div>
            <div class="card-footer border-top">
              <ul class="auth-form__social-icons d-table mx-auto">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-github"></i></a></li>
                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="auth-form__meta d-flex mt-4">
            <a href="{{route('password.request')}}">Forgot your password?</a>
            <a class="ml-auto" href="{{route('register')}}">Create new account?</a>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
@section('main-script')
<script src="{{asset('library/jquery/jquery.min.js')}}"></script>
<script src="{{asset('library/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('library/bootstrap/js/bootstrap.min.js')}}"></script>
@endsection