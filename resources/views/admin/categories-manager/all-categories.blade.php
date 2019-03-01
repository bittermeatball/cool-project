@extends('admin.layouts.app')

@section('main-content')
    <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        @component('admin.components.nav-bar')
        @endcomponent
        <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
                <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                    <h3 class="page-title">Categories overview</h3>
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
                        <div class="card-body p-0 pb-3 " style="overflow-x: scroll">
                            <table class="table table-hover mb-0" id="dataTable">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col" class="border-0">ID</th>
                                        <th scope="col" class="border-0">Category</th>
                                        <th scope="col" class="border-0">Parent</th>
                                        <th scope="col" class="border-0">Slug</th>
                                        <th scope="col" class="border-0">Status</th>
                                        <th scope="col" class="border-0"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php category_table($categories) ?>
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

