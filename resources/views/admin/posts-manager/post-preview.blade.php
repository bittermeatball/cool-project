@extends('admin.layouts.app')

@section('main-content')
  <div class="col-12 py-1" style="background-color: #e6e6e6">
      <a href="{{route('post.index')}}">
          <button type="button" class="btn btn-primary btn-pill" style="border-radius: 30px">&larr; Go Back</button>
      </a>
  </div>
  <main>
    <div>{{$post->post_title}}</div>
    <div>{{$post->post_description}}</div>
    <div>{{$post->post_content}}</div>
    <div>{{$post->post_author}}</div>
  </main>
@endsection
@section('main-script')
  <script src="{{asset('library/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('library/bootstrap/js/popper.min.js')}}"></script>
  <script src="{{asset('library/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('scripts/shards.min.js')}}"></script>
  <script src="{{asset('library/jquery/jquery.sharrre.min.js')}}"></script>
  <script src="{{asset('scripts/shards-dashboards.1.2.0.min.js')}}"></script>
@endsection 