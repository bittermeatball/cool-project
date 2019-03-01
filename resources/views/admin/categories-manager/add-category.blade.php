@extends('admin.layouts.app')

@section('main-content')
  <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
      @component('admin.components.nav-bar')
      @endcomponent
    <div class="main-content-container container-fluid px-4">
      <!-- Page Header -->
      <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
          <span class="text-uppercase page-subtitle">Category</span>
          <h3 class="page-title">Add category</h3>
        </div>
      </div>
      <!-- End Page Header -->
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
            <br/>
        @endif
      <div class="row">
        <form action="{{route('category.store')}}" method="POST" class="d-lg-flex col-12">           
          {{ csrf_field() }}   
          <div class="col-lg-9 col-md-12">
            <div class="card card-small mb-3">
              <div class="card-body">
                <div>
                    <input name="category_name" class="form-control form-control-lg mb-3" type="text" placeholder="Your Category's name" value="">
                    <select name="parent_id" class="form-control form-control-lg mb-3" >
                      <option value="0" class="bg-secondary text-white">- No parent -</option>
                      <?php category_option($categories) ?>
                    </select>
                    <input name="keywords" id="tagsInput" class="form-control form-control-lg mb-3" type="text" placeholder="Add Category's keywords ..." value="Good post,">
                    <input name="description" class="form-control form-control-lg mt-3" type="text" placeholder="Your Category's description" value="">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-12">
            <div class='card card-small mb-3'>
              <div class="card-header border-bottom">
                <h6 class="m-0">Category's status</h6>
              </div>
              <div class='card-body p-0'>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex px-3">
                    <button type="submit" class="btn btn-accent ml-auto"><b>+ Add category</b></button>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    @component('admin.components.footer')
    @endcomponent
  </main>
@endsection
@section('main-script')
  <script src="{{asset('library/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('library/bootstrap/js/popper.min.js')}}"></script>
  <script src="{{asset('library/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('scripts/Chart.min.js')}}"></script>
  <script src="{{asset('library/jquery/jquery.sharrre.min.js')}}"></script>
  <script src="{{asset('scripts/shards-dashboards.1.2.0.min.js')}}"></script>
  <script src="{{asset('library/bootstrap/js/bootstrap-tagsinput.min.js')}}"></script>
  <script src="{{asset('scripts/app/app-tagsinput-pill.min.js')}}"></script>
@endsection