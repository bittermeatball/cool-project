<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('library/fontawesome/css/all.min.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('library/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.2.0" href="{{asset('/styles/style.min.css')}}">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</head>
<body>
    <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 mx-auto">
        <div class="error">
            <div class="error__content">
                <h2>403</h2>
                <h3>Now hold on a minute!</h3>
                <p>Your account has been banned due to inappropriate activities !</p>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <button type="button" class="btn btn-primary btn-pill">&larr; Back to login</button> 
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </a>
            </div> <!-- / .error_content -->
        </div> <!-- / .error -->
    </main>
    <script src="{{asset('library/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('library/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>