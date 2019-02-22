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
          <div class="main-content-container container-fluid px-4">
            <div class="row mt-4">
              <div class="col-sm-12 col-lg-4">
                <!-- User Details Card -->
                <div class="card card-small user-details mb-4">
                  <div class="card-header p-0">
                    <div class="user-details__bg">
                      <img src="{{$user->bgimage}}" alt="User Details Background Image">
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="user-details__avatar mx-auto">
                      <img src="{{$user->avatar}}" alt="User Avatar">
                    </div>
                    <h4 class="text-center m-0 mt-2">{{$user->name}}</h4>
                    <p class="text-center text-light m-0 mb-2">I'm a design focused engineer.</p>
                    <ul class="user-details__social user-details__social--primary d-table mx-auto mb-4">
                      <li class="mx-1"><a href="{{$user->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                      <li class="mx-1"><a href="{{$user->twitter}}"><i class="fab fa-twitter"></i></a></li>
                      <li class="mx-1"><a href="{{$user->github}}"><i class="fab fa-github"></i></a></li>
                      <li class="mx-1"><a href="{{$user->googlePlus}}"><i class="fab fa-google-plus-g"></i></a></li>
                    </ul>
                    <div class="user-details__user-data border-top border-bottom p-4">
                      <div class="row mb-3">
                        <div class="col w-50">
                          <span>Email</span>
                          <span>{{$user->email}}</span>
                        </div>
                        <div class="col w-50">
                          <span>Location</span>
                          <span>{{$user->address}}</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col w-50">
                          <span>Phone</span>
                          <span>{{$user->phone}}</span>
                        </div>
                        <div class="col w-50">
                          <span>Account Number</span>
                          <span>{{$user->id}}</span>
                        </div>
                      </div>
                    </div>
                    <div class="user-details__tags p-4">
                      <?php
                      $userTags = preg_split ("/\,/", $user->userTags);  
                      ?>
                      @foreach($userTags as $Tag)
                        <span class="badge badge-pill badge-light text-light text-uppercase mb-2 border">{{$Tag}}</span>
                      @endforeach
                    </div>
                  </div>
                </div>
                <!-- End User Details Card -->
                <!-- Contact User -->
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Send Message</h6>
                    <div class="block-handle"></div>
                  </div>
                  <div class="card-body">
                    <form action="#">
                      <textarea name="" id="" cols="30" rows="6" class="form-control mb-3" style="min-height: 150px;"></textarea>
                      <button type="submit" class="btn btn-accent btn-sm">Send Message</button>
                    </form>
                  </div>
                </div>
                <!-- End Contact User -->
                <!-- User Teams -->
                <div class="card card-small user-teams mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Teams</h6>
                    <div class="block-handle"></div>
                  </div>
                  <div class="card-body p-0">
                    <div class="container-fluid">
                      <div class="row px-3">
                        <div class="user-teams__image col-2 col-sm-1 col-lg-2 p-0 my-auto">
                          <img class="rounded" src="images/user-profile/team-thumb-1.png">
                        </div>
                        <div class="col user-teams__info pl-3">
                          <h6 class="m-0">Team Edison</h6>
                          <span class="text-light">21 Members</span>
                        </div>
                      </div>
                      <div class="row px-3">
                        <div class="user-teams__image col-2 col-sm-1 col-lg-2 p-0 my-auto">
                          <img class="rounded" src="images/user-profile/team-thumb-2.png">
                        </div>
                        <div class="col user-teams__info pl-3">
                          <h6 class="m-0">Team Shelby</h6>
                          <span class="text-light">21 Members</span>
                        </div>
                      </div>
                      <div class="row px-3">
                        <div class="user-teams__image col-2 col-sm-1 col-lg-2 p-0 my-auto">
                          <img class="rounded" src="images/user-profile/team-thumb-3.png">
                        </div>
                        <div class="col user-teams__info pl-3">
                          <h6 class="m-0">Team Dante</h6>
                          <span class="text-light">21 Members</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End User Teams -->
              </div>
              <div class="col-lg-8">
                <!-- User Statistics -->
                <div class="card card-small user-stats mb-4">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6 col-sm-3 text-center">
                        <h4 class="m-0">1128</h4>
                        <span class="text-light text-uppercase">Tasks</span>
                      </div>
                      <div class="col-6 col-sm-3 text-center">
                        <h4 class="m-0">72.4%</h4>
                        <span class="text-light text-uppercase">Completed</span>
                      </div>
                      <div class="col-6 col-sm-3 text-center">
                        <h4 class="m-0">4</h4>
                        <span class="text-light text-uppercase">Projects</span>
                      </div>
                      <div class="col-6 col-sm-3 text-center">
                        <h4 class="m-0">3</h4>
                        <span class="text-light text-uppercase">Teams</span>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer py-0">
                    <div class="row">
                      <div class="col-12 col-sm-6 border-top pb-3 pt-2 border-right">
                        <div class="progress-wrapper">
                          <span class="progress-label">Workload</span>
                          <div class="progress progress-sm">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                              <span class="progress-value">80%</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6 border-top pb-3 pt-2">
                        <div class="progress-wrapper">
                          <span class="progress-label">Performance</span>
                          <div class="progress progress-sm">
                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100" style="width: 92%;">
                              <span class="progress-value">92%</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End User Statistics -->
                <!-- Weekly Performance -->
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Weekly Performance Report</h6>
                    <div class="block-handle"></div>
                  </div>
                  <div class="card-body pt-0">
                    <canvas height="130" class="user-profile-weekly-performance mt-3"></canvas>
                  </div>
                </div>
                <!-- End Weekly Performance -->
                <!-- User Activity -->
                <div class="card card-small user-activity mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">User Activity</h6>
                    <div class="block-handle"></div>
                  </div>
                  <div class="card-body p-0">
                    <div class="user-activity__item pr-3 py-3">
                      <div class="user-activity__item__icon">
                        <i class="material-icons">&#xE7FE;</i>
                      </div>
                      <div class="user-activity__item__content">
                        <span class="text-light">23 Minutes ago</span>
                        <p>Assigned himself to the <a href="#">Shards Dashboards</a> project.</p>
                      </div>
                      <div class="user-activity__item__action ml-auto">
                        <button class="ml-auto btn btn-sm btn-white">View Project</button>
                      </div>
                    </div>
                    <div class="user-activity__item pr-3 py-3">
                      <div class="user-activity__item__icon">
                        <i class="material-icons">&#xE5CA;</i>
                      </div>
                      <div class="user-activity__item__content">
                        <span class="text-light">2 Hours ago</span>
                        <p>Marked <a href="#">7 tasks</a> as <span class="badge badge-pill badge-outline-success">Complete</span> inside the <a href="#">DesignRevision</a> project.</p>
                      </div>
                    </div>
                    <div class="user-activity__item pr-3 py-3">
                      <div class="user-activity__item__icon">
                        <i class="material-icons">&#xE7FE;</i>
                      </div>
                      <div class="user-activity__item__content">
                        <span class="text-light">3 Hours and 10 minutes ago</span>
                        <p>Added <a href="#">Jack Nicholson</a> and <a href="#">3 others</a> to the <a href="#">DesignRevision</a> team.</p>
                      </div>
                      <div class="user-activity__item__action ml-auto">
                        <button class="ml-auto btn btn-sm btn-white">View Team</button>
                      </div>
                    </div>
                    <div class="user-activity__item pr-3 py-3">
                      <div class="user-activity__item__icon">
                        <i class="material-icons">&#xE868;</i>
                      </div>
                      <div class="user-activity__item__content">
                        <span class="text-light">2 Days ago</span>
                        <p>Opened <a href="#">3 issues</a> in <a href="#">2 projects</a>.</p>
                      </div>
                    </div>
                    <div class="user-activity__item pr-3 py-3">
                      <div class="user-activity__item__icon">
                        <i class="material-icons">&#xE065;</i>
                      </div>
                      <div class="user-activity__item__content">
                        <span class="text-light">2 Days ago</span>
                        <p>Added <a href="#">3 new tasks</a> to the <a href="#">DesignRevision</a> project:</p>
                        <ul class="user-activity__item__task-list mt-2">
                          <li>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="user-activity-task-1">
                              <label class="custom-control-label" for="user-activity-task-1">Fix blog pagination issue.</label>
                            </div>
                          </li>
                          <li>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="user-activity-task-2">
                              <label class="custom-control-label" for="user-activity-task-2">Remove extra padding from blog post container.</label>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="user-activity__item pr-3 py-3">
                      <div class="user-activity__item__icon">
                        <i class="material-icons">&#xE5CD;</i>
                      </div>
                      <div class="user-activity__item__content">
                        <span class="text-light">2 Days ago</span>
                        <p>Marked <a href="#">3 tasks</a> as <span class="badge badge-pill badge-outline-danger">Invalid</span> inside the <a href="#">Shards Dashboards</a> project.</p>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer border-top">
                    <button class="btn btn-sm btn-white d-table mx-auto">Load More</button>
                  </div>
                </div>
                <!-- End User Activity -->
              </div>
            </div>
          </div>
          <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
            </ul>
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2018 DesignRevision</span>
          </footer>
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
    <script src="{{asset('scripts/app/app-analytics-overview.1.2.0.min.js')}}"></script>
  </body>
</html>