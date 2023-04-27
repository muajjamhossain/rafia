<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta content="" name="description" />
      <meta content="Uzzal" name="author" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Dashboard</title>

      {{ asset('assets/website') }}/
      <link rel="shortcut icon" href="{{asset('assets/admin')}}/assets/images/favicon_1.ico">
      <link href="{{asset('assets/admin')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/admin')}}/assets/css/datatables.min.css" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/admin')}}/assets/css/icons.css" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/admin')}}/plugins/summernote/summernote-bs4.css" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/admin')}}/assets/css/moltran.css" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/admin')}}/assets/css/chosen.css" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/admin')}}/assets/css/style.css" rel="stylesheet" type="text/css" />
      <script src="{{asset('assets/admin')}}/assets/js/modernizr.min.js"></script>
  </head>
  <body class="fixed-left">
      <div id="wrapper">
          <div class="topbar">
              <div class="topbar-left">
                  <div class="text-center">
                      <a href="{{url('dashboard')}}" class="logo"><i class="md md-terrain"></i> <span>Creative</span></a>
                  </div>
              </div>
              <nav class="navbar navbar-default">
                  <div class="container-fluid">
                      <ul class="list-inline menu-left mb-0">
                          <li class="float-left">
                              <a href="#" class="button-menu-mobile open-left">
                                  <i class="fa fa-bars"></i>
                              </a>
                          </li>
                          <li class="hide-phone float-left">
                              <form role="search" class="navbar-form">
                                  <input type="text" placeholder="Type here for search..." class="form-control search-bar">
                                  <a href="#" class="btn btn-search"><i class="fa fa-search"></i></a>
                              </form>
                          </li>
                      </ul>

                      <ul class="nav navbar-right float-right list-inline">
                          <li class="d-none d-sm-block">
                              <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                          </li>
                          <li class="dropdown d-none d-sm-block">
                              <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                  <i class="md md-notifications"></i> <span class="badge badge-pill badge-xs badge-danger">1</span>
                              </a>
                              <ul class="dropdown-menu dropdown-menu-lg">
                                  <li class="text-center notifi-title">Notification</li>
                                  <li class="list-group">
                                     <!-- list item-->
                                     <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                           <div class="media-left pr-2">
                                              <em class="fa fa-user-plus fa-2x text-info"></em>
                                           </div>
                                           <div class="media-body clearfix">
                                              <div class="media-heading">New user registered</div>
                                              <p class="m-0">
                                                 <small>You have 10 unread messages</small>
                                              </p>
                                           </div>
                                        </div>
                                     </a>
                                    <a href="javascript:void(0);" class="list-group-item">
                                      <small>See all notifications</small>
                                    </a>
                                  </li>
                              </ul>
                          </li>
                          <li class="dropdown open">
                              <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{asset('assets/admin')}}/assets/images/users/avatar-1.jpg" alt="user-img" class="rounded-circle"> </a>
                              <ul class="dropdown-menu">
                                  <li><a href="{{url('dashboard/profile')}}" class="dropdown-item"><i class="md md-face-unlock mr-2"></i> Profile</a></li>
                                  <li><a href="javascript:void(0)" class="dropdown-item"><i class="md md-settings mr-2"></i> Settings</a></li>
                                  <li><a href="javascript:void(0)" class="dropdown-item"><i class="md md-lock mr-2"></i> Lock screen</a></li>
                                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item"><i class="md md-settings-power mr-2"></i> Logout</a></li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </nav>
          </div>
          <div class="left side-menu">
              <div class="sidebar-inner slimscrollleft">
                  <div class="user-details">
                      <div class="pull-left">
                          <img src="{{asset('assets/admin')}}/assets/images/users/avatar-1.jpg" alt="" class="thumb-md rounded-circle">
                      </div>
                      <div class="user-info">
                          <div class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  {{Auth::user()->name}}
                              </a>
                              <ul class="dropdown-menu">
                                  <li><a href="{{url('dashboard/profile')}}" class="dropdown-item"><i class="md md-face-unlock mr-2"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                  <li><a href="javascript:void(0)" class="dropdown-item"><i class="md md-settings mr-2"></i> Settings</a></li>
                                  <li><a href="javascript:void(0)" class="dropdown-item"><i class="md md-lock mr-2"></i> Lock screen</a></li>
                                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item"><i class="md md-settings-power mr-2"></i> Logout</a></li>
                              </ul>
                          </div>
                          <p class="text-muted m-0">{{'@'.Auth::user()->username}}</p>
                      </div>
                  </div>
                  <div id="sidebar-menu">
                      <ul>
                          <li><a href="{{url('dashboard')}}" class="waves-effect"><i class="md md-home"></i><span>Dashboard </span></a></li>
                         
                          <li><a href="{{url('dashboard/user')}}" class="waves-effect"><i class="md md-account-circle"></i><span>Users </span></a></li>
                          
                         
                          {{-- <li><a href="#" class="waves-effect"><i class="md md-view-list"></i><span>Menu </span></a></li>
                          
                         
                          <li><a href="{{url('dashboard/banner')}}" class="waves-effect"><i class="md md-panorama"></i><span>Banner </span></a></li>
                          
                         
                          <li class="has_sub">
                              <a href="#" class="waves-effect"><i class="md md-settings"></i><span>Manage Website</span><span class="pull-right"><i class="md md-add"></i></span></a>
                              <ul class="list-unstyled">
                                  <li><a href="{{url('dashboard/manage/basic')}}">Basic Information</a></li>
                                  <li><a href="{{url('dashboard/manage/social')}}">Social Media</a></li>
                                  <li><a href="{{url('dashboard/page/content')}}">All Page Content</a></li>
                                  <li><a href="{{url('dashboard/manage/contact')}}">Contact Information</a></li>
                                  <li><a href="{{url('dashboard/manage/copyright')}}">Copyright</a></li>
                              </ul>
                          </li> --}}
                          
                         
                          <li class="has_sub">
                              <a href="#" class="waves-effect"><i class="md md-photo-library"></i><span>Gallery </span><span class="pull-right"><i class="md md-add"></i></span></a>
                              <ul class="list-unstyled">
                                  <li><a href="{{url('dashboard/gallery/add')}}">Upload Gallery Photo</a></li>
                                  <li><a href="{{url('dashboard/gallery')}}">All Gallery Photo</a></li>
                                  <li><a href="{{url('dashboard/gallery/category')}}">Gallery Category</a></li>
                              </ul>
                          </li>
                          <li class="has_sub">
                              <a href="#" class="waves-effect"><i class="md md-local-hospital"></i><span>Doctors </span><span class="pull-right"><i class="md md-add"></i></span></a>
                              <ul class="list-unstyled">
                                  <li><a href="{{url('dashboard/doctor/add')}}">Doctors Add</a></li>
                                  <li><a href="{{url('dashboard/doctor')}}">All Doctors</a></li>
                                  <li><a href="{{url('dashboard/speciality')}}">Speciality</a></li>
                              </ul>
                          </li>
                          <li><a href="{{url('dashboard/appointment')}}" class="waves-effect"><i class="md md-hotel"></i><span>Appointment</span></a></li>
                          <li><a href="{{url('dashboard/complain')}}" class="waves-effect"><i class="md md-mail"></i><span>Complain</span></a></li>
                          <li><a href="{{url('dashboard/contactus')}}" class="waves-effect"><i class="md md-contacts"></i><span>Contact Message </span></a></li>
                          
                         
                          {{-- <li class="has_sub">
                              <a href="#" class="waves-effect"><i class="md md-view-quilt"></i><span>Blog </span><span class="pull-right"><i class="md md-add"></i></span></a>
                              <ul class="list-unstyled">
                                  <li><a href="{{url('dashboard/blog/post/add')}}">Add Post</a></li>
                                  <li><a href="{{url('dashboard/blog/post')}}">All Post</a></li>
                                  <li><a href="{{url('dashboard/blog/category')}}">All Category</a></li>
                                  <li><a href="{{url('dashboard/blog/tag')}}">All Tag</a></li>
                              </ul>
                          </li>
                          
                         
                          <li class="has_sub">
                              <a href="#" class="waves-effect"><i class="md md-storage"></i><span>Visitor Information </span><span class="pull-right"><i class="md md-add"></i></span></a>
                              <ul class="list-unstyled">
                                  <li><a href="{{url('dashboard/newsletter/subscribe')}}">Newsletter Subscribe</a></li>
                              </ul>
                          </li>
                          
                         
                          <li><a href="{{url('dashboard/service')}}" class="waves-effect"><i class="md md-local-attraction"></i><span>Our Services </span></a></li>
                          
                         
                          <li><a href="{{url('dashboard/video')}}" class="waves-effect"><i class="md md-play-circle-fill"></i><span>Videos </span></a></li>
                          
                         
                          <li><a href="{{url('dashboard/event')}}" class="waves-effect"><i class="md md-pages"></i><span>Events </span></a></li>
                          
                         
                          <li><a href="{{url('dashboard/team')}}" class="waves-effect"><i class="md md-account-box"></i><span>Our Team </span></a></li>
                          
                         
                          <li><a href="{{url('dashboard/partner')}}" class="waves-effect"><i class="md md-view-carousel"></i><span>Our Partners </span></a></li>
                          
                         
                          <li><a href="{{url('dashboard/client')}}" class="waves-effect"><i class="md md-stars"></i><span>Our Client </span></a></li>
                          
                         
                          <li><a href="{{url('dashboard/testimonial')}}" class="waves-effect"><i class="md md-local-library"></i><span>Client Testimonial </span></a></li>
                          
                         
                          <li><a href="{{url('dashboard/faq')}}" class="waves-effect"><i class="md md-receipt"></i><span>FAQ </span></a></li>
                         
                          <li><a href="{{url('dashboard/recycle')}}" class="waves-effect"><i class="md md-delete"></i><span>Recycle Bin </span></a></li> --}}
                          
                          <li><a href="{{url('/')}}" class="waves-effect" target="_blank"><i class="md md-public"></i><span>Live Site </span></a></li>
                          <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="waves-effect"><i class="md md-settings-power"></i><span>Logout</span></a></li>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </ul>
                      <div class="clearfix"></div>
                  </div>
                  <div class="clearfix"></div>
              </div>
          </div>
          <div class="content-page">
              <div class="content">
                  <div class="container-fluid">
                      @yield('content')
                  </div>
              </div>
              <footer class="footer">
                  Copyright © 2019 Dashboard | Development by Muajjam Hossain.
              </footer>
          </div>
      </div>
      <script>
          var resizefunc = [];
      </script>
      <script src="{{asset('assets/admin')}}/assets/js/jquery.min.js"></script>
      <script src="{{asset('assets/admin')}}/assets/js/bootstrap.bundle.min.js"></script>
      <script src="{{asset('assets/admin')}}/assets/js/datatables.min.js"></script>
      <script src="{{asset('assets/admin')}}/assets/js/detect.js"></script>
      <script src="{{asset('assets/admin')}}/assets/js/fastclick.js"></script>
      <script src="{{asset('assets/admin')}}/assets/js/jquery.slimscroll.js"></script>
      <script src="{{asset('assets/admin')}}/assets/js/jquery.blockUI.js"></script>
      <script src="{{asset('assets/admin')}}/assets/js/waves.js"></script>
      <script src="{{asset('assets/admin')}}/assets/js/wow.min.js"></script>
      <script src="{{asset('assets/admin')}}/assets/js/jquery.nicescroll.js"></script>
      <script src="{{asset('assets/admin')}}/assets/js/jquery.scrollTo.min.js"></script>
      <script src="{{asset('assets/admin')}}/plugins/moment/moment.min.js"></script>
      <script src="{{asset('assets/admin')}}/plugins/waypoints/lib/jquery.waypoints.js"></script>
      <script src="{{asset('assets/admin')}}/plugins/counterup/jquery.counterup.min.js"></script>
      <script src="{{asset('assets/admin')}}/plugins/flot-chart/jquery.flot.min.js"></script>
      <script src="{{asset('assets/admin')}}/plugins/flot-chart/jquery.flot.time.js"></script>
      <script src="{{asset('assets/admin')}}/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
      <script src="{{asset('assets/admin')}}/plugins/flot-chart/jquery.flot.resize.js"></script>
      <script src="{{asset('assets/admin')}}/plugins/flot-chart/jquery.flot.pie.js"></script>
      <script src="{{asset('assets/admin')}}/plugins/flot-chart/jquery.flot.selection.js"></script>
      <script src="{{asset('assets/admin')}}/plugins/flot-chart/jquery.flot.stack.js"></script>
      <script src="{{asset('assets/admin')}}/plugins/flot-chart/jquery.flot.crosshair.js"></script>
      <script src="{{asset('assets/admin')}}/assets/pages/jquery.todo.js"></script>
      <script src="{{asset('assets/admin')}}/assets/pages/jquery.dashboard.js"></script>
      <script src="{{asset('assets/admin')}}/assets/js/jquery.app.js"></script>
      <script src="{{asset('assets/admin')}}/plugins/summernote/summernote-bs4.js"></script>
      <script src="{{asset('assets/admin')}}/assets/js/chosen.jquery.js"></script>
      <script src="{{asset('assets/admin')}}/assets/js/jquery.printPage.js"></script>
      <script src="{{asset('assets/admin')}}/assets/js/custom.js"></script>
  </body>
</html>
