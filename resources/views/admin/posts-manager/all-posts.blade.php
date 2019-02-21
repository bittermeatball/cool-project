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
                                <h3 class="page-title">Posts overview</h3>
                            </div>
                        </div>
                        <!-- End Page Header -->
                        <!-- Default Light Table -->
                        <div class="row">
                            <div class="col">
                                <div class="card card-small mb-4">
                                    <div class="card-header border-bottom">
                                        <form class="col-sm-12 col-md-6">
                                            <a href="{{route('post.create')}}">
                                                <button type="button" class="mb-2 btn btn-success mr-1">+ Add post</button>
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
                                                    <th scope="col" class="border-0">Title</th>
                                                    <th scope="col" class="border-0">Description</th>
                                                    <th scope="col" class="border-0">Thumbnail</th>
                                                    <th scope="col" class="border-0">Action</th>
                                                    <th scope="col" class="border-0"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($posts as $post)
                                                <tr>
                                                    <td>{{$post->id}}</td>
                                                    <td>{{$post->post_title}}</td>
                                                    <td>{{$post->post_description}}</td>
                                                    <td>
                                                        <img src="{{$post->post_thumbnail}}">
                                                    </td>
                                                    @if($post->status =='active')
                                                        <td style="color: #20df50">Active</td>
                                                    @else
                                                        <td style="color: #ed3034">Banned</td>
                                                    @endif
                                                    <td>
                                                        <a href="{{ route('post.show',$post->id)}}" >
                                                            <button type="button"class="mb-2 btn btn-outline-info mr-1">Details</button>
                                                        </a>
                                                        <a href="{{ route('post.edit',$post->id)}}">
                                                            <button type="button" class="mb-2 btn btn-outline-warning mr-1">Edit</button>
                                                        </a>
                                                        {{-- Activate button --}}
                                                        @if($post->status =='deactivated')
                                                            <form method="POST" action="{{route('post.activate', $post->id)}}">
                                                                {{ csrf_field() }}
                                                                <button class="btn btn-outline-success" type="submit">Activate</button>
                                                            </form>
                                                        @endif
                                                        <button type="button" class="mb-2 btn btn-outline-danger mr-1" data-toggle="modal" data-target="#exampleModal">
                                                            Delete
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labeledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Delete post</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        <i class="fas fa-exclamation-triangle" style="font-size: 72px; color: red"></i>
                                                                        <h3>Are your sure ? This action can't be undone !</h3>
                                                                        <h4><small><em>"Post can be kept but deactivate"</em></small></h4>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                        @if($post->status =='active')
                                                                            {{-- Deactivate button --}}
                                                                            <form method="POST" action="{{route('post.deactivate', $post->id)}}">
                                                                                {{ csrf_field() }}
                                                                                <button class="btn btn-alert" type="submit">Deactivate</button>
                                                                            </form>
                                                                        @endif
                                                                        {{-- Delete button --}}
                                                                        <form method="POST" action="{{route('post.destroy', $post->id)}}">
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