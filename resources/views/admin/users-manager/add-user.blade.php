@extends('admin.layouts.app')

@section('main-content')
  <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
      @component('admin.components.nav-bar')
      @endcomponent
    <div class="container-fluid px-0">
      @if ($errors->any())
        <div>
          <ul>
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
    </div>
    <div class="main-content-container container-fluid px-4">
      <div class="row">
        <div class="col-lg-8 mx-auto mt-4">
          <!-- Edit User Details Card -->
          <div class="card card-small edit-user-details mb-4">
            <div class="card-header p-0">
              <div class="edit-user-details__bg">
                <img src="{{asset('images/user-profile/up-user-details-background.jpg')}}" alt="User Details Background Image">
                <label class="edit-user-details__change-background">
                  <i class="material-icons mr-1">&#xE439;</i> Change Background Photo <input class="d-none" type="file" />
                </label>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="border-bottom clearfix d-flex">
                <ul class="nav nav-tabs border-0 mt-auto mx-4 pt-2">
                  <li class="nav-item">
                    <a class="nav-link active" href="#">General</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Projects</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Collaboration</a>
                  </li>
                </ul>
              </div>
              <form method="POST" action="{{route('user.store')}}" class="py-4">
                {{ csrf_field() }}
                <div class="form-row mx-4">
                  <div class="col mb-3">
                    <h6 class="form-text m-0">General</h6>
                    <p class="form-text text-muted m-0">Setup general profile details.</p>
                  </div>
                </div>
                <div class="form-row mx-4">
                  <div class="col-lg-8">
                    <div class="form-row">
                      <div class="form-group col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        
                        @if ($errors->has('name'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                        @endif
                      </div>
                      <div class="form-group col-md-6">
                        <label for="role">Role</label>
                        <select class="custom-select" name="role">
                            <option value="subscriber" selected>Subscriber</option>
                            <option value="editor">Editor</option>
                            <option value="administrator">Administrator</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="userLocation">Location</label>
                        <div class="input-group input-group-seamless">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="material-icons">&#xE0C8;</i>
                            </div>
                          </div>
                          <input type="text" class="form-control" value="">
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="phoneNumber">Phone Number</label>
                        <div class="input-group input-group-seamless">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="material-icons">&#xE0CD;</i>
                            </div>
                          </div>
                          <input type="text" class="form-control" id="phoneNumber" value="">
                        </div>
                      </div>
                      <div class="form-group col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="emailAddress">Email</label>
                        <div class="input-group input-group-seamless">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="material-icons">&#xE0BE;</i>
                            </div>
                          </div>
                          <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>

                          @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                          @endif

                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="displayEmail">Display Email Publicly</label>
                        <select class="custom-select">
                          <option value="1" selected>Yes, display my email</option>
                          <option value="2">No, do not display my email.</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <label for="userProfilePicture" class="text-center w-100 mb-4">Profile Picture</label>
                    <div class="edit-user-details__avatar m-auto">
                      <img src="{{asset('images/avatars/0.jpg')}}" alt="User Avatar">
                      <label class="edit-user-details__avatar__change">
                        <i class="material-icons mr-1">&#xE439;</i>
                        <input type="file" id="userProfilePicture" class="d-none">
                      </label>
                    </div>
                    <button class="btn btn-sm btn-white d-table mx-auto mt-4"><i class="material-icons">&#xE2C3;</i> Upload Image</button>
                  </div>
                </div>
                <div class="form-row mx-4">
                  <div class="form-group col-md-6">
                    <label for="userBio">Bio</label>
                    <textarea style="min-height: 87px;" id="userBio" name="userBio" class="form-control"></textarea>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="tagsInput">Tags</label>
                    <input id="tagsInput" name="userTags" value="User Experience,UI Design, React JS, HTML & CSS, JavaScript, Bootstrap 4" class="d-none">
                  </div>
                </div>
                <hr>
                <div class="form-row mx-4">
                  <div class="col mb-3">
                    <h6 class="form-text m-0">Social</h6>
                    <p class="form-text text-muted m-0">Setup your social profiles info.</p>
                  </div>
                </div>
                <div class="form-row mx-4">
                  <div class="form-group col-md-4">
                    <label for="socialFacebook">Facebook</label>
                    <div class="input-group input-group-seamless">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fab fa-facebook-f"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" id="socialFacebook">
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="socialTwitter">Twitter</label>
                    <div class="input-group input-group-seamless">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fab fa-twitter"></i>
                        </div>
                      </div>
                      <input type="email" class="form-control" id="socialTwitter">
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="socialGitHub">GitHub</label>
                    <div class="input-group input-group-seamless">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fab fa-github"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" id="socialGitHub">
                    </div>
                  </div>
                </div>
                <div class="form-row mx-4">
                  <div class="form-group col-md-4">
                    <label for="socialSlack">Slack</label>
                    <div class="input-group input-group-seamless">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fab fa-slack"></i>
                        </div>
                      </div>
                      <input type="email" class="form-control" id="socialSlack">
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="socialDribbble">Dribbble</label>
                    <div class="input-group input-group-seamless">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fab fa-dribbble"></i>
                        </div>
                      </div>
                      <input type="email" class="form-control" id="socialDribbble">
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="socialGoogle">Google Plus+</label>
                    <div class="input-group input-group-seamless">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fab fa-google-plus-g"></i>
                        </div>
                      </div>
                      <input type="email" class="form-control" id="socialGoogle">
                    </div>
                  </div>
                </div>
                <hr>
                <div class="form-row mx-4">
                  <div class="col mb-3">
                    <h6 class="form-text m-0">Notifications</h6>
                    <p class="form-text text-muted m-0">Setup which notifications would you like to receive.</p>
                  </div>
                </div>
                <div class="form-row mx-4">
                  <label for="conversationsEmailsToggle" class="col col-form-label"> Conversations <small class="form-text text-muted"> Sends notification emails with updates for the conversations you are participating in or if someone mentions you. </small>
                  </label>
                  <div class="col d-flex">
                    <div class="custom-control custom-toggle ml-auto my-auto">
                      <input type="checkbox" id="conversationsEmailsToggle" class="custom-control-input" checked>
                      <label class="custom-control-label" for="conversationsEmailsToggle"></label>
                    </div>
                  </div>
                </div>
                <div class="form-row mx-4">
                  <label for="newProjectsEmailsToggle" class="col col-form-label"> New Projects <small class="form-text text-muted"> Sends notification emails when you are invited to a new project. </small>
                  </label>
                  <div class="col d-flex">
                    <div class="custom-control custom-toggle ml-auto my-auto">
                      <input type="checkbox" id="newProjectsEmailsToggle" class="custom-control-input">
                      <label class="custom-control-label" for="newProjectsEmailsToggle"></label>
                    </div>
                  </div>
                </div>
                <div class="form-row mx-4">
                  <label for="vulnerabilitiesEmailsToggle" class="col col-form-label"> Vulnerability Alerts <small class="form-text text-muted"> Sends notification emails when everything goes down and there's no hope left whatsoever. </small>
                  </label>
                  <div class="col d-flex">
                    <div class="custom-control custom-toggle ml-auto my-auto">
                      <input type="checkbox" id="vulnerabilitiesEmailsToggle" class="custom-control-input" checked>
                      <label class="custom-control-label" for="vulnerabilitiesEmailsToggle"></label>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="form-row mx-4">
                  <div class="col mb-3">
                    <h6 class="form-text m-0">Set password for user</h6>
                  </div>
                </div>
                <div class="form-row mx-4">
                  <div class="form-group col-md-4 {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="lastName">Password</label>
                    <input type="password" class="form-control" id="lastName" placeholder="Password" name="password" required>

                    @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif

                  </div>
                  <div class="form-group col-md-4">
                    <label for="emailAddress">Repeat Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                  </div>
                </div>
                <button type="submit" class="btn btn-sm btn-accent ml-auto d-table mr-3">Add user</button>
              </form>
            </div>
            <div class="card-footer border-top">
              <p><em><small>* You can edit users's profile later, but the required fields have to be filled</small></em></p>
            </div>
          </div>
          <!-- End Edit User Details Card -->
        </div>
      </div>
    </div>
  </main>
@endsection
@section('main-script')
  <script src="{{asset('scripts/loader.js')}}"></script>
  <script src="{{asset('library/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('library/bootstrap/js/popper.min.js')}}"></script>
  <script src="{{asset('library/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('scripts/Chart.min.js')}}"></script>
  <script src="{{asset('scripts/shards.min.js')}}"></script>
  <script src="{{asset('library/jquery/jquery.sharrre.min.js')}}"></script>
  <script src="{{asset('scripts/shards-dashboards.1.2.0.min.js')}}"></script>
  <script src="{{asset('library/bootstrap/js/bootstrap-tagsinput.min.js')}}"></script>
  <script src="{{asset('scripts/app/app-tagsinput-pill.min.js')}}"></script>
@endsection 