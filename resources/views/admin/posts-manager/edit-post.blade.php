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
          <h3 class="page-title">Edit Post</h3>
        </div>
      </div>
      <!-- End Page Header -->
      <div class="row">
        <form action="{{route('post.update',$post->id)}}" method="POST" class="d-lg-flex">           
          {{ csrf_field() }}   
          <div class="col-lg-9 col-md-12">
          <!-- Add New Post Form -->
            <div class="card card-small mb-3">
              <div class="card-body">
                <div class="add-new-post">
                    <input name="post_title" class="form-control form-control-lg mb-3" type="text" placeholder="Your Post Title" value="{{$post->post_title}}">
                    <input name="post_description" class="form-control form-control-lg mb-3" type="text" placeholder="Your Post Description" value="{{$post->post_description}}">
                    <input name="post_thumbnail" class="form-control form-control-lg mb-3" type="text" placeholder="Your Post Thumgnail Picture's url" value="{{$post->post_thumbnail}}">
                    <div class="form-group col-md-12 p-0">
                        <textarea name="post_content" class="form-control add-new-post__editor mb-1" id="editor1">{{$post->post_content}}</textarea>
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
                <h6 class="m-0">Post's status</h6>
              </div>
              <div class='card-body p-0'>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item p-3">
                    <span class="d-flex mb-2"><i class="material-icons mr-1">flag</i><strong class="mr-1">Status:</strong> 
                        @if($post->status=="draft")
                            Draft saved
                        @elseif($post->status=="publish")
                            Publish
                        @endif
                    </span>
                    <span class="d-flex mb-2"><i class="material-icons mr-1">visibility</i><strong class="mr-1">Visibility:</strong>
                        @if($post->status=="draft")
                        <strong class="text-secondary">Hidden</strong>
                        @elseif($post->status=="publish")
                        <strong class="text-success">Public</strong>
                        @endif
                       
                    </span>
                    <span class="d-flex mb-2"><i class="material-icons mr-1">calendar_today</i><strong class="mr-1">Updated at:</strong> 
                        {{$post->updated_at}}
                    </span>
                    <span class="d-flex"><i class="material-icons mr-1">score</i><strong class="mr-1">Readability:</strong>
                        <strong class="text-warning">Ok</strong>
                    </span>
                  </li>
                  <li class="list-group-item d-flex px-3">
                    @if($post->status == "publish")
                    <a href="{{route('post.draft',$post->id)}}">
                        <button class="btn btn-sm btn-outline-primary"><i class="material-icons">save</i> Unpublish</button>                        
                    </a>
                    @elseif($post->status == "draft")
                    <a href="{{route('post.publish',$post->id)}}">
                        <button class="btn btn-sm btn-outline-success"><i class="material-icons">save</i> Publish</button>                        
                    </a>
                    @endif
                    <button type="submit" class="btn btn-sm btn-accent ml-auto"><i class="material-icons">file_copy</i> Update</button>
                  </li>
                </ul>
              </div>
            </div>
            <!-- / Post Overview -->
            <!-- Post Overview -->
            <div class='card card-small mb-3'>
              <div class="card-header border-bottom">
                <h6 class="m-0">Categories</h6>
              </div>
              <div class='card-body p-0'>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item px-3 pb-2">
                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="category1" checked>
                      <label class="custom-control-label" for="category1">Uncategorized</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="category2" checked>
                      <label class="custom-control-label" for="category2">Design</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="category3">
                      <label class="custom-control-label" for="category3">Development</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="category4">
                      <label class="custom-control-label" for="category4">Writing</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="category5">
                      <label class="custom-control-label" for="category5">Books</label>
                    </div>
                  </li>
                  <li class="list-group-item d-flex px-3">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="New category" aria-label="Add new category" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-white px-2" type="button"><i class="material-icons">add</i></button>
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