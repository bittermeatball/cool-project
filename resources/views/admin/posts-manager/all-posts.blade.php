@extends('admin.layouts.app')

@section('main-content')
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
                                @if(Auth::user()->role == 'administrator' || Auth::user()->role == 'editor')
                                    <a href="{{route('post.create')}}">
                                        <button type="button" class="mb-2 btn btn-success mr-1">+ Add post</button>
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
                                        <th scope="col" class="border-0">Thumbnail</th>
                                        <th scope="col" class="border-0">Title</th>
                                        <th scope="col" class="border-0">Description</th>
                                        <th scope="col" class="border-0">Status</th>
                                        <th scope="col" class="border-0"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>
                                            <img src="{{$post->post_thumbnail}}" width="150" height="auto">
                                        </td>                                                    
                                        <td>{{$post->post_title}}</td>
                                        <td>{{$post->post_description}}</td>
                                        @if($post->status =='publish')
                                            <td style="color: #20df50">Published</td>
                                        @elseif($post->status =='draft')
                                            <td style="color: gray">Draft</td>
                                        @endif
                                        <td>
                                            <a href="{{ route('post.show',$post->id)}}" >
                                                <button type="button"class="mb-2 btn btn-info mr-1">Preview</button>
                                            </a>
                                        @if(Auth::user()->role == 'administrator' || Auth::user()->role == 'editor')
                                            <a href="{{ route('post.edit',$post->id)}}">
                                                <button type="button" class="mb-2 btn btn-warning mr-1">Edit</button>
                                            </a>
                                            <button type="button" class="mb-2 btn btn-danger mr-1" data-toggle="modal" data-target="#modalOf{{$post->id}}">
                                                Delete
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalOf{{$post->id}}" tabindex="-1" role="dialog" aria-labeledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete <b><em>"{{$post->post_title}}"</em></b> ?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <i class="fas fa-exclamation-triangle" style="font-size: 72px; color: red"></i>
                                                            <h3>Are your sure ? This action can't be undone !</h3>
                                                            <h4><small><em>"Post can be unpublished by saving into draft"</em></small></h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            @if($post->status =='publish')
                                                                {{-- Deactivate button --}}
                                                                <form method="POST" action="{{route('post.draft', $post->id)}}">
                                                                    {{ csrf_field() }}
                                                                    <button class="btn btn-alert" type="submit">Save draft</button>
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
                                            {{-- Activate button --}}
                                            @if($post->status =='draft')
                                                <form method="POST" action="{{route('post.publish', $post->id)}}">
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-success" type="submit">Publish</button>
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