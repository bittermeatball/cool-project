<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shards Dashboard Pro - Premium Bootstrap 4 Admin Dashboard Template Pack</title>
    <meta name="description" content="A premium collection of beautiful hand-crafted Bootstrap 4 admin dashboard templates and dozens of custom components built for data-driven applications.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('library/bootstrap/css/bootstrap.min.css')}}">
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
                <span class="text-uppercase page-subtitle">Post editor</span>
                <h3 class="page-title">Add New Post</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
              <form action="{{route('post.store')}}" method="POST" style="display: flex">           
                {{ csrf_field() }}   
                <div class="col-lg-9 col-md-12">
                <!-- Add New Post Form -->
                  <div class="card card-small mb-3">
                    <div class="card-body">
                      <div class="add-new-post">
                          <input name="post-title" class="form-control form-control-lg mb-3" type="text" placeholder="Your Post Title">
                          <input name="post-description" class="form-control form-control-lg mb-3" type="text" placeholder="Your Post Description">
                          <input name="post-thumbnail" class="form-control form-control-lg mb-3" type="text" placeholder="Your Post Thumgnail Picture's url">
                          <div class="form-group col-md-12 p-0">
                              <textarea name="post-content" class="form-control add-new-post__editor mb-1" id="editor1"></textarea>
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
                          <span class="d-flex mb-2"><i class="material-icons mr-1">flag</i><strong class="mr-1">Status:</strong> Draft <a class="ml-auto" href="#">Edit</a></span>
                          <span class="d-flex mb-2"><i class="material-icons mr-1">visibility</i><strong class="mr-1">Visibility:</strong> <strong class="text-success">Public</strong> <a class="ml-auto" href="#">Edit</a></span>
                          <span class="d-flex mb-2"><i class="material-icons mr-1">calendar_today</i><strong class="mr-1">Schedule:</strong> Now <a class="ml-auto" href="#">Edit</a></span>
                          <span class="d-flex"><i class="material-icons mr-1">score</i><strong class="mr-1">Readability:</strong> <strong class="text-warning">Ok</strong></span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                          <button class="btn btn-sm btn-outline-accent"><i class="material-icons">save</i> Save Draft</button>
                          <button type="submit" class="btn btn-sm btn-accent ml-auto"><i class="material-icons">file_copy</i> Publish</button>
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
      </div>
    </div>
    <script src="{{asset('library/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('library/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('library/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="{{asset('library/jquery/jquery.sharrre.min.js')}}"></script>
    <script src="{{asset('scripts/shards-dashboards.1.2.0.min.js')}}"></script>
    <script src="{{asset('scripts/app/app-blog-new-post.1.2.0.min.js')}}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckeditor/ckfinder/ckfinder.js') }}"></script>
    <script>
      var editor = CKEDITOR.replace( 'editor1' );
      CKFinder.setupCKEditor( editor );
    </script>
  </body>
</html>