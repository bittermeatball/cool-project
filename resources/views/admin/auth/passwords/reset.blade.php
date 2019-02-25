@extends('admin.layouts.auth')

@section('main-content')
    <main class="main-content col">
        <div class="main-content-container container-fluid px-4 my-auto h-100">
            <div class="row no-gutters h-100">
            <div class="col-lg-3 col-md-5 auth-form mx-auto my-auto">
                <div class="card">
                <div class="card-body">
                    <img class="auth-form__logo d-table mx-auto mb-3" src="{{asset('/images/shards-dashboards-logo.svg')}}" alt="Shards Dashboards - Register Template">
                    <h5 class="auth-form__title text-center mb-4">Reset Password</h5>

                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group mb-4{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>Email address</label>
                            <input type="email" class="form-control" placeholder="Enter email"name="email" value="{{ old('email') }}" required>
                            
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif

                        </div>

                        <div class="form-group mb-4{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Enter password"name="password" value="{{ old('password') }}" required>
                            
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif

                        </div>

                        <div class="form-group mb-4{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Re-type password"name="password_confirmation"  required>
                            
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif

                        </div>
                        <button type="submit" class="btn btn-pill btn-accent d-table mx-auto">Reset Password</button>
                    </form>
                </div>
                </div>
                <div class="auth-form__meta d-flex mt-4">
                <a class="mx-auto" href="{{route('login')}}">Take me back to login.</a>
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