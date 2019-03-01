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
                        <a href="{{route('category.create')}}">
                            <button type="button" class="mb-2 btn btn-success mr-1 animated bounceIn hvr-wobble-horizontal">+ Add category</button>
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
                                        <button class="btn btn-dark dropdown-toggle hvr-wobble-vertical animated bounceIn" type="button" id="filterCategories" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Custom filters
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="filterCategories">
                                            <a class="dropdown-item" href="{{route('category.index')}}">
                                                All categories
                                            </a>         
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{route('category.filter',[
                                                "property" => "status",
                                                "filter" => "deactivated"
                                            ])}}">
                                                Disabled
                                            </a>
                                            <a class="dropdown-item" href="{{route('category.filter',[
                                                "property" => "status",
                                                "filter" => "active"
                                            ])}}">
                                                Enabled
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{route('category.filter',[
                                                "property" => "parent_id",
                                                "filter" => "0"
                                            ])}}">
                                                Super parent
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
                                        <th scope="col" class="border-0">Category</th>
                                        <th scope="col" class="border-0">Parent</th>
                                        <th scope="col" class="border-0">Slug</th>
                                        <th scope="col" class="border-0">Status</th>
                                        <th scope="col" class="border-0"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    @if($category->$property == $filter)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->category_name}}</td>
                                            @if($category->parent_id == 0)
                                                <td>None</td>
                                            @else
                                                <?php 
                                                    $cate = DB::table('categories')
                                                        ->where('id',$category->parent_id)
                                                        ->first();
                                                    echo    "<td>- $cate->category_name</td>";    
                                                ?>
                                            @endif
                                            <td>{{$category->slug}}</td>
                                            @if($category->status =='active')
                                                <td style="color: #20df50">Enabled</td>
                                            @else
                                                <td style="color: #ed3034">Disabled</td>
                                            @endif
    
                                            <td class='text-center' style='width: 150px'>
                                                <span class="btn btn-group">
                                                    <a href="{{ route('category.show',$category->id)}}" class="mb-2 btn btn-sm btn-info mr-1 animated bounceIn">
                                                        <i class='fas fa-info-circle'></i>
                                                    </a>
                                                    <a href="{{ route('category.edit',$category->id)}}" class="mb-2 btn btn-sm btn-warning mr-1 animated bounceIn">
                                                        <i class='far fa-edit'></i>
                                                    </a>
                                                    @if($category->status =='deactivated')
                                                        <form method="POST" action="{{route('category.activate', $category->id)}}">
                                                            {{ csrf_field() }}
                                                            <button class="mb-2 mr-1 btn btn-sm btn-success animated bounceIn hvr-buzz-out rounded-0" type="submit"><i class='fas fa-undo-alt'></i></button>
                                                        </form>
                                                    @endif
                                                    <button type="button" class="mb-2 btn btn-sm btn-danger mr-1 hvr-buzz-out animated bounceIn" data-toggle="modal" data-target="#modalOf{{$category->id}}">
                                                        <i class='far fa-trash-alt'></i>
                                                    </button>
                                                </span>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modalOf{{$category->id}}" tabindex="-1" role="dialog" aria-labeledby="modalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalLabel">Delete category <b><em>{{$category->name}}</em></b></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true" class="hvr-rotate">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                    <i style="color: red; font-size: 72px " class="fas fa-exclamation-circle"></i>
                                                                    <h3>Are your sure ? This action can't be undone !</h3>
                                                                <h4><small><em>"Category can be kept but disabled"</em></small></h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary hvr-bounce-in" data-dismiss="modal">Cancel</button>
                                                                @if($category->status =='active')
                                                                    {{-- Deactivate button --}}
                                                                    <form method="POST" action="{{route('category.deactivate', $category->id)}}">
                                                                        {{ csrf_field() }}
                                                                        <button class="btn btn-warning  hvr-buzz-out" type="submit">Disable</button>
                                                                    </form>
                                                                @endif
                                                                {{-- Delete button --}}
                                                                <form method="POST" action="{{route('category.destroy', $category->id)}}">
                                                                    @method('delete')
                                                                    {{ csrf_field() }}
                                                                    <button class="btn btn-danger hvr-buzz" type="submit">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- End modal --}}
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