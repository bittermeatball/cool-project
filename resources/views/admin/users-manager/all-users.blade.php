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
        <script async defer src="https://buttons.github.io/buttons.js"></script>
    </head>
    <body class="h-100">
        <div class="container-fluid">
            <div class="row">
                <!-- Main Sidebar -->
                @component('admin.components.sidebar')
                @endcomponent
                <!-- End Main Sidebar -->
                <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                    @component('admin.components.nav-bar')
                    @endcomponent
                    <div class="main-content-container container-fluid px-4">
                        <!-- Page Header -->
                        <div class="page-header row no-gutters py-4">
                            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                                <h3 class="page-title">Users overview</h3>
                            </div>
                        </div>
                        <!-- End Page Header -->
                        <!-- Default Light Table -->
                        <div class="row">
                            <div class="col">
                                <div class="card card-small mb-4">
                                    <div class="card-header border-bottom">
                                        <form class="col-sm-12 col-md-6">
                                            <a href="add-user">
                                                <button type="button" class="mb-2 btn btn-success mr-1">+ Add user</button>
                                            </a>                                            
                                            <div class="form-group d-inline-block" style="width: 60%">
                                                <input type="text" class="form-control" id="" placeholder="Search">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-body p-0 pb-3 text-center">
                                        <table class="table table-hover mb-0">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th scope="col" class="border-0">#</th>
                                                    <th scope="col" class="border-0">Name</th>
                                                    <th scope="col" class="border-0">Email</th>
                                                    <th scope="col" class="border-0">Role</th>
                                                    <th scope="col" class="border-0">Status</th>
                                                    <th scope="col" class="border-0"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $user)
                                                <tr>
                                                    <td>{{$user->id}}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->role}}</td>
                                                    <td>Active</td>
                                                    <td>
                                                        <a href="{{ route('user.show',$user->id)}}" >
                                                            <button type="button"class="mb-2 btn btn-outline-info mr-1">Details</button>
                                                        </a>
                                                        <a href="{{ route('user.edit',$user->id)}}">
                                                            <button type="button" class="mb-2 btn btn-outline-warning mr-1">Edit</button>
                                                        </a>                                                        
                                                        <button type="button" class="mb-2 btn btn-outline-danger mr-1" data-toggle="modal" data-target="#exampleModal">
                                                            Delete
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labeledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Delete user</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        <i class="fas fa-exclamation-triangle" style="font-size: 72px; color: red"></i>
                                                                        <h3>Are your sure ? This action can't be undone !</h3>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        {{-- Delete button --}}

                                                                        <form method="POST" action="{{route('user.destroy', $user->id)}}">
                                                                            @method('delete')
                                                                            {{ csrf_field() }}
                                                                            <button class="btn btn-danger" type="submit">Delete</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- End modal --}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Default Light Table -->
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>