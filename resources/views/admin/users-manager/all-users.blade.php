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
                </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
                <div class="col">
                    <div class="card card-small mb-4">
                        <div class="card-header border-bottom">
                            <form class="col-sm-12 col-md-6">
                                @if(Auth::user()->role == 'administrator')
                                    <a href="{{route('user.create')}}">
                                        <button type="button" class="mb-2 btn btn-success mr-1">+ Add user</button>
                                    </a>
                                @endif
                                <div class="form-group d-inline-block" style="width: 60%">
                                    <input type="text" class="form-control" id="searchInput" placeholder="Search">
                                </div>
                            </form>
                        </div>
                        <div class="card-body p-0 pb-3 text-center">
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
                                                <button type="button"class="mb-2 btn btn-outline-info mr-1">Details</button>
                                            </a>

                                        @if(Auth::user()->role == 'administrator')
                                            <a href="{{ route('user.edit',$user->id)}}">
                                                <button type="button" class="mb-2 btn btn-outline-warning mr-1">Edit</button>
                                            </a>
                                            <button type="button" class="mb-2 btn btn-outline-danger mr-1" data-toggle="modal" data-target="#modalOf{{$user->id}}">
                                                Delete
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalOf{{$user->id}}" tabindex="-1" role="dialog" aria-labeledby="modalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalLabel">Delete user <b><em>{{$user->name}}</em></b></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                                <i style="color: red; font-size: 72px " class="fas fa-exclamation-circle"></i>
                                                                <h3>Are your sure ? This action can't be undone !</h3>
                                                            <h4><small><em>"User can be kept but deactivate"</em></small></h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            @if($user->status =='active')
                                                                {{-- Deactivate button --}}
                                                                <form method="POST" action="{{route('user.deactivate', $user->id)}}">
                                                                    {{ csrf_field() }}
                                                                    <button class="btn btn-alert" type="submit">Deactivate</button>
                                                                </form>
                                                            @endif
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
                                            {{-- Activate button --}}
                                            @if($user->status =='deactivated')
                                                <form method="POST" action="{{route('user.activate', $user->id)}}">
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-outline-success" type="submit">Activate</button>
                                                </form>
                                            @endif
                                        @endif
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
@endsection
@section('main-script')
    <script src="{{asset('library/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('scripts/filter-box.js')}}"></script>
    <script src="{{asset('library/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('library/bootstrap/js/bootstrap.min.js')}}"></script>
@endsection 