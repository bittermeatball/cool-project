@extends('admin.layouts.app')

@section('main-content')
    <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        @component('admin.components.nav-bar')
        @endcomponent
        <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
                <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                    <h3 class="page-title">Users overview</h3>
                    <br>
                    @if(Auth::user()->role == 'administrator')
                        <a href="{{route('user.create')}}">
                            <button type="button" class="mb-2 btn btn-success mr-1 animated bounceIn hvr-wobble-horizontal">+ Add user</button>
                        </a>
                    @endif
                </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
                <div class="col">
                    <div class="card card-small mb-4">
                        <div class="card-header border-bottom">
                            <form class="col-12 d-flex">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="searchInput" placeholder="Search">
                                </div>
                                <div class="form-group col-md-6 text-right">
                                    <div class="dropdown">
                                        <button class="btn btn-dark dropdown-toggle hvr-wobble-vertical animated bounceIn" type="button" id="filterUsers" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Custom filters
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="filterUsers">
                                            <a class="dropdown-item" href="{{route('users.filter',[
                                                "property" => "status",
                                                "filter" => "deactivated"
                                            ])}}">
                                                Banned users
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{route('users.filter',[
                                                "property" => "role",
                                                "filter" => "administrator"
                                            ])}}">
                                                Administrators
                                            </a>
                                            <a class="dropdown-item" href="{{route('users.filter',[
                                                "property" => "role",
                                                "filter" => "editor"
                                            ])}}">
                                                Editors
                                            </a>
                                            <a class="dropdown-item" href="{{route('users.filter',[
                                                "property" => "role",
                                                "filter" => "subscriber"
                                            ])}}">
                                                Subscribers
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body p-0 pb-3 text-center" style="overflow-x: scroll">
                            <table class="table table-hover mb-0" id="dataTable">
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
                                    @if($user->$property == $filter)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role}}</td>

                                        @if($user->status =='active')
                                            <td style="color: #20df50">Active</td>
                                        @else
                                            <td style="color: #ed3034">Banned</td>
                                        @endif

                                        <td>
                                            <a href="{{ route('user.show',$user->id)}}" >
                                                <button type="button"class="mb-2 btn btn-info mr-1 hvr-wobble-horizontal animated bounceIn">Details</button>
                                            </a>

                                        @if(Auth::user()->role == 'administrator')
                                            <a href="{{ route('user.edit',$user->id)}}">
                                                <button type="button" class="mb-2 btn btn-warning mr-1 hvr-wobble-skew animated bounceIn">Edit</button>
                                            </a>
                                            <button type="button" class="mb-2 btn btn-danger mr-1 hvr-buzz-out animated bounceIn" data-toggle="modal" data-target="#modalOf{{$user->id}}">
                                                Delete
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalOf{{$user->id}}" tabindex="-1" role="dialog" aria-labeledby="modalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalLabel">Delete user <b><em>{{$user->name}}</em></b></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true" class="hvr-rotate">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                                <i style="color: red; font-size: 72px " class="fas fa-exclamation-circle"></i>
                                                                <h3>Are your sure ? This action can't be undone !</h3>
                                                            <h4><small><em>"User can be kept but deactivate"</em></small></h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary hvr-bounce-in" data-dismiss="modal">Cancel</button>
                                                            @if($user->status =='active')
                                                                {{-- Deactivate button --}}
                                                                <form method="POST" action="{{route('user.deactivate', $user->id)}}">
                                                                    {{ csrf_field() }}
                                                                    <button class="btn btn-warning  hvr-buzz-out" type="submit">Deactivate</button>
                                                                </form>
                                                            @endif
                                                            {{-- Delete button --}}
                                                            <form method="POST" action="{{route('user.destroy', $user->id)}}">
                                                                @method('delete')
                                                                {{ csrf_field() }}
                                                                <button class="btn btn-danger hvr-buzz" type="submit">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End modal --}}
                                            {{-- Activate button --}}
                                            @if($user->status =='deactivated')
                                                <form method="POST" action="{{route('user.activate', $user->id)}}">
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-success animated bounceIn hvr-buzz-out" type="submit">Activate</button>
                                                </form>
                                            @endif
                                        @endif
                                        </td>
                                    </tr>
                                    @endif
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
@endsection
@section('main-script')
    <script src="{{asset('library/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('scripts/filter-box.js')}}"></script>
    <script src="{{asset('library/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('library/bootstrap/js/bootstrap.min.js')}}"></script>
@endsection 