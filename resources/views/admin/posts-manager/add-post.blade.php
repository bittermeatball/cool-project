@extends('admin.layouts.app')

@section('main-content')
  <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
      @component('admin.components.nav-bar')
      @endcomponent
    <div class="main-content-container container-fluid px-4">
      <!-- Page Header -->
      <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
          <span class="text-uppercase page-subtitle">Post editor</span>
          <h3 class="page-title">Add New Post</h3>
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
        <form action="{{route('post.store')}}" method="POST" class="d-lg-flex">           
          {{ csrf_field() }}   
          <div class="col-lg-9 col-md-12">
          <!-- Add New Post Form -->
            <div class="card card-small mb-3">
              <div class="card-body">
                <div class="add-new-post">
                    <input name="post_title" class="form-control form-control-lg mb-3" type="text" placeholder="Your Post Title" value="{{ old('post_title') }}">
                    <input name="post_description" class="form-control form-control-lg mb-3" type="text" placeholder="Your Post Description" value="{{ old('post_description') }}">
                    <input name="post_thumbnail" class="form-control form-control-lg mb-3" type="text" placeholder="Your Post Thumgnail Picture's url" value="{{ old('post_thumbnail') }}">
                    <div class="form-group col-md-12 p-0">
                        <textarea name="post_content" class="form-control add-new-post__editor mb-1" id="editor1">{{ old('post_content') }}</textarea>
                    </div>                         
                </div>
              </div>
            </div>
            <!-- / Add New Post Form -->
          </div>
          <div class="col-lg-3 col-md-12">
            <!-- Post Overview -->
            <div class='card card-small mb-3'>
              <div class="card-header border-bottom">
                <h6 class="m-0">Actions</h6>
              </div>
              <div class='card-body p-0'>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item p-3">
                    <span class="d-flex mb-2"><i class="material-icons mr-1">calendar_today</i><strong class="mr-1">Schedule:</strong> Now <a class="ml-auto" href="#">Edit</a></span>
                    <span class="d-flex"><i class="material-icons mr-1">score</i><strong class="mr-1">Readability:</strong> <strong class="text-warning">Ok</strong></span>
                  </li>
                  <li class="list-group-item d-flex px-3">
                    <button type="submit" class="btn btn-sm btn-outline-accent"><i class="material-icons">save</i> Save Draft</button>
                    <button type="submit" class="btn btn-sm btn-accent ml-auto"><i class="material-icons">file_copy</i> Publish</button>
                  </li>
                </ul>
              </div>
            </div>
            <!-- / Post Overview -->
            <!-- Post Overview -->
            <div class='card card-small mb-3'>
              <div class="card-header border-bottom">
                <h6 class="m-0">Classify post</h6>
              </div>
              <div class='card-body p-0'>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item px-3 pb-2">
                    <select name="category_id" class="form-control form-control-lg mb-3" >
                      <option value="1" class="bg-secondary text-white">- Uncategorized -</option>
                      <?php category_option($categories) ?>
                    </select>
                  </li>
                  
                    {{-- Store category from post --}}
                    {{ csrf_field() }}
                    <li class="list-group-item d-flex px-3">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="New category" aria-label="Add new category" aria-describedby="basic-addon2"
                        name="category_name">
                        <select name="parent_id" class="form-control" >
                          <option value="0" class="bg-secondary text-white">- No parent -</option>
                          <?php category_option($categories) ?>
                        </select>
                        <div class="input-group-append">
                          <button class="btn btn-white px-2" type="submit"><i class="material-icons">add</i></button>
                        </div>                      
                      </div>
                    </li>
                </ul>
              </div>
            </div>
            <!-- / Post Overview -->                
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
  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('ckeditor/ckfinder/ckfinder.js') }}"></script>
  <script>
    var editor = CKEDITOR.replace( 'editor1' );
    CKFinder.setupCKEditor( editor );
  </script>
@endsection