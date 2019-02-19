<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>A very cool dashboard</title>
    <meta name="description" content="A premium collection of beautiful hand-crafted Bootstrap 4 admin dashboard templates and dozens of custom components built for data-driven applications.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.2.0" href="{{asset('styles/shards-dashboards.1.2.0.min.css')}}">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
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
          <div class="container-fluid px-0">
            {{-- Show errors --}}
            @if ($errors->any())
              <div>
                <ul style="padding-left: 0; list-style: none">
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
            {{-- Alert success message --}}
            @if(!empty($successMsg))
              <div>
                <ul style="padding-left: 0; list-style: none">
                  <li class="alert alert-success alert-dismissible fade show m-0" role="alert">
                      {{ $successMsg }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </li>                  
                </ul>
              </div>
            @endif

          </div>
          <div class="main-content-container container-fluid px-4">
            <div class="row">
              <div class="col-lg-8 mx-auto mt-4">
                <!-- Edit User Details Card -->
                <div class="card card-small edit-user-details mb-4">
                  <div class="card-header p-0">
                    <div class="edit-user-details__bg">
                      <img src="{{$user->bgimage}}" alt="User Details Background Image">
                      <label class="edit-user-details__change-background">
                        <i class="material-icons mr-1">&#xE439;</i> Change Background Photo <input class="d-none" type="file" />
                      </label>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    {{-- Tab navigator --}}
                    <div class="border-bottom clearfix d-flex">
                      <ul class="nav nav-tabs border-0 mt-auto mx-4 pt-2">
                        <li class="nav-item active">
                          <a class="nav-link active show" data-toggle="tab" href="#general-edit">General</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#social-edit">Social</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#password-change">Change password</a>
                        </li>
                      </ul>
                    </div>
                    {{-- Tab content --}}
                    <div class="tab-content">

                      {{-- General edit --}}
                      <div id="general-edit" class="tab-pane fade active show">
                        <form method="POST" action="{{route('user.update',$user->id)}}" class="py-4">
                          {{ csrf_field() }}
                          <div class="form-row mx-4">
                            <div class="col mb-3">
                              <h3 class="form-text m-0">General</h3>
                              <p class="form-text text-muted m-0"><em><small> Edit your profile.</small></em></p>
                            </div>
                          </div>
                          <div class="form-row mx-4">
                            <div class="col-lg-8">
                              <div class="form-row">
                                <div class="form-group col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                  <label for="name">Full Name</label>
                                  <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                                  
                                  @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                  @endif
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="role">Role</label>
                                  <select class="custom-select" name="role">
                                      <option value="subscriber">Subscriber</option>
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
                                    <input type="text" class="form-control" value="{{$user->address}}" name="address">
                                  </div>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="phone">Phone Number</label>
                                  <div class="input-group input-group-seamless">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">
                                        <i class="material-icons">&#xE0CD;</i>
                                      </div>
                                    </div>
                                    <input type="text" class="form-control" id="phone" value="{{$user->phone}}" name="phone">
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
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>

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
                                <img src="{{$user->avatar}}" alt="User Avatar">
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
                              <textarea style="min-height: 87px;" id="userBio" name="userBio" class="form-control" value="{{$user->bio}}" name="bio"></textarea>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="userTags">Tags</label>
                              <span><small> "Example : User Experience,UI Design, React JS,"</small></span>
                              <input id="userTags" name="userTags" value="{{ $user->userTags}}" class="d-none">
                            </div>
                          </div>
                          <hr>
                          {{-- Turn notification on/off --}}
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
                          <button type="submit" class="btn btn-sm btn-accent ml-auto d-table mr-3">Update</button>
                        </form>
                      </div>

                      {{-- Social edit --}}
                      <div id="social-edit" class="tab-pane fade ">
                        <form method="POST" action="{{route('user.update.social',$user->id)}}">
                          {{ csrf_field() }}
                          <div class="form-row mx-4">
                            <div class="col mb-3">
                              <br>
                              <h3 class="form-text m-0">Social</h3>
                              <p class="form-text text-muted m-0"><em><small> Your social media url.</small></em></p>
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
                                  <input type="text" class="form-control" id="socialFacebook" value="{{$user->facebook}}" name="facebook">
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
                                  <input type="text" class="form-control" id="socialTwitter" value="{{$user->twitter}}" name="twitter">
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
                                  <input type="text" class="form-control" id="socialGitHub" value="{{$user->github}}" name="github">
                                </div>
                              </div>
                            </div>
                            <div class="form-row mx-4">
                              <div class="form-group col-md-4">
                                <label for="socialInstagram">Instagram</label>
                                <div class="input-group input-group-seamless">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <i class="fab fa-instagram"></i>
                                    </div>
                                  </div>
                                  <input type="text" class="form-control" id="socialInstagram" value="{{ $user->instagram }}" name="instagram">
                                </div>
                              </div>
                              <div class="form-group col-md-4">
                                <label for="socialSnapchat">Snapchat</label>
                                <div class="input-group input-group-seamless">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <i class="fab fa-snapchat"></i>
                                    </div>
                                  </div>
                                  <input type="text" class="form-control" id="socialSnapchat" value="{{$user->snapchat}}" name="snapchat">
                                </div>
                              </div>
                              <div class="form-group col-md-4">
                                <label for="socialgooglePlus">Google Plus+</label>
                                <div class="input-group input-group-seamless">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <i class="fab fa-google-plus-g"></i>
                                    </div>
                                  </div>
                                  <input type="text" class="form-control" id="socialgooglePlus" value="{{$user->googlePlus}}" name="googlePlus">
                                </div>
                              </div>
                            </div>  
                          <hr>
                          <button type="submit" class="btn btn-sm btn-accent ml-auto d-table mr-3">Update</button>
                          <br>
                        </form>
                      </div>

                      {{-- Change password --}}
                      <div id="password-change" class="tab-pane fade">
                        <form method="POST" action="{{route('user.update.password',$user->id)}}">
                          {{ csrf_field() }}
                          <div class="form-row mx-4">
                            <div class="col mb-3">
                              <br>
                              <h3 class="form-text m-0">Change password</h3>
                              <p class="form-text text-muted m-0"><em><small>"Set a new password for user"</small></em></p>
                            </div>
                          </div>
                          <div class="form-row mx-4">
                            <div class="form-group col-md-4 {{ $errors->has('password') ? ' has-error' : '' }}">
                              <label for="lastName">New password</label>
                              <input type="password" class="form-control" id="lastName" placeholder="Password" name="password">
  
                              @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                              @endif
  
                            </div>
                            <div class="form-group col-md-4">
                              <label for="emailAddress">Repeat new password</label>
                              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                          </div>
                          <hr>
                          <button type="submit" class="btn btn-sm btn-accent ml-auto d-table mr-3">Update</button>
                          <br>
                        </form>
                      </div>
                      
                    </div>

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
      </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="{{asset('scripts/shards-dashboards.1.2.0.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script src="{{asset('scripts/app/app-edit-user-profile.1.2.0.min.js')}}"></script>
  </body>
</html>