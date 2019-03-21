@extends('admin.layouts.app')

@section('main-content')
    <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        @component('admin.components.nav-bar')
        @endcomponent
        <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
                <div class="col-12 text-center text-sm-left mb-0">
                    <h3 class="page-title mb-3">Tags overview</h3>
                    @if ($errors->any())
                        <div>
                            <ul class="px-0">
                                @foreach ($errors->all() as $error)
                                <li class="alert alert-danger alert-dismissible fade show m-0" role="alert">
                                    {{ $error }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session()->has('message'))
                        <ul style="padding-left: 0; list-style: none">
                            <li class="alert alert-success alert-dismissible fade show m-0" role="alert">
                                {{ session('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </li>                  
                        </ul>
                    @endif
                    <button type="button" class="mb-2 btn btn-success mr-1 animated bounceIn hvr-wobble-horizontal" data-toggle="modal" data-target="#addTag">
                        + Add tag
                    </button>
                    <div class="modal fade" id="addTag" tabindex="-1" role="dialog" aria-labelledby="addTag" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create a new tag</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('tag.store')}}" method="POST" class="col-12">
                                        {{ csrf_field() }}   
                                        <div>
                                            <input name="tag_name" class="form-control form-control-lg mb-3" type="text" placeholder="Your Tag's name" value="">
                                            <input name="keywords" id="tagsInput" class="form-control form-control-lg mb-3" type="text" value="Good post,">
                                            <input name="description" class="form-control form-control-lg my-3" type="text" placeholder="Your Tag's description" value="">
                                        </div>
                                        <button type="submit" class="btn btn-accent ml-auto"><b>+ Add tag</b></button> 
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <button class="btn btn-dark dropdown-toggle hvr-wobble-vertical animated bounceIn" type="button" id="filterTags" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Custom filters
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="filterTags">
                                            <a class="dropdown-item" href="{{route('tag.filter',[
                                                "property" => "status",
                                                "filter" => "deactivated"
                                            ])}}">
                                                Disabled
                                            </a>
                                            <a class="dropdown-item" href="{{route('tag.filter',[
                                                "property" => "status",
                                                "filter" => "active"
                                            ])}}">
                                                Enabled
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body p-0 pb-3 " style="overflow-x: scroll">
                            <table class="table table-hover mb-0" id="dataTable">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col" class="border-0">ID</th>
                                        <th scope="col" class="border-0">Tag</th>
                                        <th scope="col" class="border-0">Parent</th>
                                        <th scope="col" class="border-0">Description</th>
                                        <th scope="col" class="border-0">Status</th>
                                        <th scope="col" class="border-0"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tags as $tag)
                                    <tr>
                                        <td>{{$tag->id}}</td>
                                        <td>#{{$tag->tag_name}}</td>
                                        <td>{{$tag->status}}</td>
                                        <td>{{$tag->description}}</td>
                                        @if($tag->status =='active')
                                            <td style="color: #20df50">Active</td>
                                        @else
                                            <td style="color: #ed3034">Deactivated</td>
                                        @endif
                                        <td class='text-center' style='width: 150px'>
                                            <span class='btn btn-group'>
                                                <button type="button" class="mb-2 btn btn-sm btn-info mr-1 animated bounceIn" title='Details' data-toggle="modal" data-target="#detailsOf{{$tag->id}}">
                                                    <i class='fas fa-info-circle'></i>
                                                </button>
                                                {{-- Details --}}
                                                <div class="modal fade" id="detailsOf{{$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="detailsOf{{$tag->id}}Title" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="detailsOf{{$tag->id}}Title">Tag's details</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <ul class="list-group list-group-flush text-left">
                                                                    <li class="list-group-item"><b>Status :</b> {{$tag->status}}</li>
                                                                    <li class="list-group-item"><b>ID :</b> {{$tag->id}}</li>
                                                                    <li class="list-group-item"><b>Tag's name :</b> #{{$tag->tag_name}}</li>
                                                                    <li class="list-group-item"><b>Keywords :</b>
                                                                        <?php
                                                                        $keywords = preg_split ("/\,/", $tag->keywords);  
                                                                        ?>
                                                                        @foreach($keywords as $keyword)
                                                                          <span class="badge badge-pill badge-light text-dark text-uppercase mb-2 border">{{$keyword}}</span>
                                                                        @endforeach
                                                                    </li>
                                                                    <li class="list-group-item"><b>Description :</b> {{$tag->description}}</li>
                                                                </ul>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-warning" data-dismiss="modal" title='Edit' data-toggle="modal" data-target="#editTag{{$tag->id}}">Edit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($tag->status =='deactivated')
                                                    <form method="POST" action="{{route('tag.activate', $tag->id)}}">
                                                        {{ csrf_field() }}
                                                        <button type='submit' class='mb-2 mr-1 btn btn-sm btn-success animated bounceIn hvr-buzz-out rounded-0' title='Activate'><i class='fas fa-undo-alt'></i></button>
                                                    </form>
                                                @endif
                                                {{-- Edit --}}
                                                <button type="button"  class='mb-2 btn btn-sm btn-warning mr-1 animated bounceIn' title='Edit' data-toggle="modal" data-target="#editTag{{$tag->id}}">
                                                    <i class='far fa-edit'></i>
                                                </button>
                                                <div class="modal fade" id="editTag{{$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="editTag{{$tag->id}}Label" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form method="POST" action="{{route('tag.update',$tag->id)}}" class="col-12">
                                                                {{ method_field('PUT') }}
                                                                {{ csrf_field() }}
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editTag{{$tag->id}}Label">Edit tag</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group text-left text-lg">
                                                                        <label for="tag_name">Tag's name :</label>
                                                                        <input name="tag_name" id="tag_name" class="form-control form-control-lg mb-3" type="text" placeholder="Your Tag's name" value="{{$tag->tag_name}}">
                                                                        <label for="tagsInput">Keywords <small>(seperated by comma ",")</small> :</label>
                                                                        <input type="text" name="keywords" id="tagsInput" class="form-control form-control-lg mb-3" value="{{$tag->keywords}}">
                                                                        <label for="description">Description :</label>
                                                                        <input name="description" id="description" class="form-control form-control-lg mb-3" type="text" value="{{$tag->description}}">
                                                                        <label for="status">Status :</label>
                                                                        <select name="status" id="status" class="form-control form-control-lg my-3">
                                                                            <option value="active">Active</option>
                                                                            <option value="deactivated">Deactivated</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-accent ml-auto">Save</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Delete --}}
                                                <button type="button" class="mb-2 btn btn-sm btn-danger mr-1 hvr-buzz-out animated bounceIn" data-toggle="modal" data-target="#modalOf{{$tag->id}}">
                                                    <i class='far fa-trash-alt'></i>
                                                </button>
                                                <div class="modal fade" id="modalOf{{$tag->id}}" tabindex="-1" role="dialog" aria-labeledby="modalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalLabel">Delete tag <b><em>{{$tag->tag_name}}</em></b></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true" class="hvr-rotate">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                    <i style="color: red; font-size: 72px " class="fas fa-exclamation-circle"></i>
                                                                    <h3>Are your sure ? <br> This action can't be undone !</h3>
                                                                <h4><small><em>"Tag can be kept but disabled"</em></small></h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary hvr-bounce-in" data-dismiss="modal">Cancel</button>
                                                                @if($tag->status =='active')
                                                                    {{-- Deactivate button --}}
                                                                    <form method="POST" action="{{route('tag.deactivate', $tag->id)}}">
                                                                        {{ csrf_field() }}
                                                                        <button class="btn btn-warning  hvr-buzz-out" type="submit">Deactivate</button>
                                                                    </form>
                                                                @endif
                                                                {{-- Delete button --}}
                                                                <form method="POST" action="{{route('tag.destroy', $tag->id)}}">
                                                                    @method('delete')
                                                                    {{ csrf_field() }}
                                                                    <button class="btn btn-danger hvr-buzz" type="submit">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
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
    <script src="{{asset('library/bootstrap/js/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('scripts/app/app-tagsinput-pill.min.js')}}"></script>
@endsection 

