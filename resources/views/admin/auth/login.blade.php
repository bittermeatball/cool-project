<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>A very cool dashboard</title>
    <meta name="description" content="A premium collection of beautiful hand-crafted Bootstrap 4 admin dashboard templates and dozens of custom components built for data-driven applications.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.2.0" href="{{asset('styles/shards-dashboards.1.2.0.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/extras.1.2.0.min.css')}}">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </head>
  <body class="h-100">
    <div class="container-fluid icon-sidebar-nav h-100">
      <div class="row h-100">
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
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="{{asset('scripts/extras.1.2.0.min.js')}}"></script>
    <script src="{{asset('scripts/shards-dashboards.1.2.0.min.js')}}"></script>
  </body>
</html>