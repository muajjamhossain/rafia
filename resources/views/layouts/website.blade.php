<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        $basic = App\Models\Basic::where('basic_status',1)->where('basic_id',1)->firstOrFail();
        $social = App\Models\SocialMedia::where('sm_status',1)->where('sm_id',1)->firstOrFail();
        $contact = App\Models\ContactInformation::where('cont_status',1)->where('cont_id',1)->firstOrFail();
        $copyright = App\Models\Copyright::where('copy_status',1)->where('copy_id',1)->firstOrFail();
    @endphp

    <title>{{ $basic->basic_title | $basic->basic_subtitle }}</title>
    <link rel="stylesheet" href="{{ asset('assets/website') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/website') }}/assets/css/slick.css">
    <link rel="stylesheet" href="{{ asset('assets/website') }}/assets/css/slick-theme.css">
    <link rel="stylesheet" href="{{ asset('assets/website') }}/assets/css/style.css">
</head>

<body>

    <header>
        <div class="top-bar">
            <div class="social-content">
                <a href="{{ $social->sm_facebook }}"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="{{ $social->sm_youtube }}"><i class="fa-brands fa-youtube"></i></a>
                <a href="{{ $social->sm_linkedin }}"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
            <div class="welcome-title">
                <p>{{ $basic->basic_subtitle }}</p>
            </div>
            <div class="complain-submit">
                <button data-bs-toggle="modal" data-bs-target="#complainModal">
                    <span>Complain Submission</span>
                    <img src="{{ asset('assets/website') }}/assets/img/icon/live_help.svg" alt="icon">
                </button>
            </div>
            <!-- Complain Submission -->
            @include('website.includes.complain-modal')

        </div>
        <div class="header-details">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-xl-5">
                        {{-- <div class="doctor-appointment d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#appointmentModal">
                            <i class="fa-solid fa-user-doctor"></i>
                            <span>Online Doctor <br> Appointment</span>
                        </div> --}}
                        <div class="doctor-appointment d-flex align-items-center" id="appointmentModalBtn">
                            <i class="fa-solid fa-user-doctor"></i>
                            <span>Online Doctor <br> Appointment</span>
                        </div>
                        <!-- Online Doctor Appointment -->
                        @include('website.includes.apoinment-modal')

                    </div>
                    <div class="col-lg-8 col-xl-7 ms-auto">
                        <div class="header-address-content">
                            <div class="header-address-item text-center wow fadeInUp" data-wow-delay=".2s">
                                <div class="h4">
                                    <img src="{{ asset('assets/website') }}/assets/img/icon/call-icon.svg"
                                        alt="call icon">
                                    Hot line no.
                                </div>
                                <p>
                                    <a href="tel:{{$contact->cont_phone1}}">{{$contact->cont_phone1}}</a>
                                    <br>
                                    <a href="tel:{{$contact->cont_phone2}}">{{$contact->cont_phone2}}</a>
                                </p>
                            </div>
                            <div class="header-address-item text-center wow fadeInUp" data-wow-delay=".3s">
                                <div class="h4">
                                    <img src="{{ asset('assets/website') }}/assets/img/icon/time-icon.svg"
                                        alt="call icon">
                                    Working Hour
                                </div>
                                <p>
                                    We are open for
                                    <br> 24/7
                                </p>
                            </div>
                            <div class="header-address-item text-center wow fadeInUp" data-wow-delay=".4s">
                                <div class="h4">
                                    <img src="{{ asset('assets/website') }}/assets/img/icon/email-icon.svg"
                                        alt="call icon">
                                    Email us
                                </div>
                                <p>
                                    <a href="mailto:{{$contact->cont_email1}}">{{$contact->cont_email1}}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg bg-white main-navbar" id="sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{ asset('assets/website') }}/assets/img/main-logo.svg" alt="logo">
                    {{-- basic_logo basic_favicon basic_flogo --}}
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                            <img src="{{ asset('assets/website') }}/assets/img/main-logo.svg" alt="logo" height="30">
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 ">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('website/gallery') }}">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('website/doctors') }}">Doctors</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}#services">Our Service</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('website/about') }}">About us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('website/contact') }}">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-7">
            @if(Session::has('successComplain'))
              <div class="alert alert-success alertsuccess" role="alert">
                 <strong>Successfully!</strong> store your complain information.
              </div>
            @endif
            @if(Session::has('successApoinment'))
              <div class="alert alert-success alertsuccess" role="alert">
                 <strong>Successfully!</strong> store your Apoinment information.
              </div>
            @endif
            @if(Session::has('error'))
              <div class="alert alert-warning alerterror" role="alert">
                 <strong>Opps!</strong> please try again.
              </div>
            @endif
        </div>
        <div class="col-md-2"></div>
    </div>

    @yield('content')

    <footer>
        <div class="footer-widget-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="footer-widget">
                            <div class="footer-widget-item">
                                <div class="h4 title">Contacts</div>
                                <address>
                                    {{$contact->cont_add1}} <br> {{$contact->cont_add2}}
                                    <br>
                                    <br>
                                    Phone:<a href="tel:{{$contact->cont_phone1}}"> {{$contact->cont_phone1}}</a>
                                    <br>
                                    <br>
                                    Email:<a href="mailto:{{$contact->cont_email1}}">
                                        {{$contact->cont_email1}}</a>
                                </address>
                                <div class="footer-social">
                                    <a href="{{ $social->sm_facebook }}"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="{{ $social->sm_youtube }}"><i class="fa-brands fa-youtube"></i></a>
                                    <a href="{{ $social->sm_linkedin }}"><i class="fa-brands fa-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="footer-widget-item">
                                <div class="h4 title">Important Links</div>
                                <ul>
                                    <li><a href="#">important links 1</a></li>
                                    <li><a href="#">important links 2</a></li>
                                    <li><a href="#">important links 3</a></li>
                                    <li><a href="#">important links 4</a></li>
                                </ul>
                            </div>
                            <div class="footer-widget-item">
                                <div class="h4 title">Quick Links</div>
                                <ul>
                                    <li><a href="#">Our Branches</a></li>
                                    <li><a href="#">Our Services</a></li>
                                    <li><a href="#">Call for Appointment</a></li>
                                    <li><a href="{{ url('website/doctors') }}">Find Doctors</a></li>
                                    <li><a href="{{ url('website/gallery') }}">Gallery</a></li>
                                    <li><a href="#">Site Maps</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 align-self-center">
                        <div class="footer-widget">
                            <img src="{{ asset('assets/website') }}/assets/img/fooger-logo.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-content">
                            <div class="copy-right">
                                <p> {{$copyright->copy_title}}</p>
                            </div>
                            <div class="condition">
                                <a href="#">Terms and Conditions</a>
                                <a href="#">Customer Support</a>
                                <a href="#">Privacy Policy</a>
                            </div>
                            <div class="views">
                                <p>14432360 Total Views</p>
                            </div>
                            <div class="views">
                                <p>Development .<a href="https://web.facebook.com/developer.imu" target="__blank"> Muajjam</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/website') }}/assets/js/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('assets/website') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/website') }}/assets/js/slick.min.js"></script>
    <script src="{{ asset('assets/website') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('assets/website') }}/assets/js/main.js"></script>


    <script>
        // main appoinetment modal
        $(document).on('click', '#appointmentModalBtn', function(e) {
            e.preventDefault();
            $('.data_preloader').show();
            // var url = $(this).attr('href');

            $.ajax({
                url: '/website/apoinment-modal',
                type: 'get',
                success: function(data) {
                    $('#appointmentModalBody').html(data);
                    get_speciality();
                    $('#appointmentModal').modal('show');
                    // console.log(data);
                },
                error: function(err){
                    if (err.status == 0) {
                        toastr.error('Net Connetion Error. Reload This Page.');
                    }else{
                        toastr.error('Server Error. Please contact to the support team.');
                    }
                }
            });
        });

        // doctor wise appoinetment modal

        $(document).on('click', '#drAppointmentModalBtn', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: '/website/apoinment-modal',
                type: 'get',
                success: function(data) {
                    $('#appointmentModalBody').html(data);
                    find_doctor(id);
                    $('#appointmentModal').modal('show');
                    // console.log(data);
                },
                error: function(err){
                    if (err.status == 0) {
                        toastr.error('Net Connetion Error. Reload This Page.');
                    }else{
                        toastr.error('Server Error. Please contact to the support team.');
                    }
                }
            });
        });


        function find_doctor(id){
            $.ajax({
                url: '/website/find-doctor/'+id,
                type: 'get',
                success: function(data) {
                    $('#speciality-text').append('<option value="'+data.speciality_id+'" selected>'+data.speciality_info.speciality_name+'</option>');
                    $('#doctors-text').append('<option value="'+data.id+'" selected>'+data.name+'</option>');
                },
                error: function(err){
                    if (err.status == 0) {
                        toastr.error('Net Connetion Error. Reload This Page.');
                    }else{
                        toastr.error('Server Error. Please contact to the support team.');
                    }
                }
            });
        }

        function get_speciality(){
            $.ajax({
                url: '/website/get-speciality',
                type: 'get',
                success: function(data) {

                    data.forEach((item, index)=>{
                        $('#speciality-text').append('<option value="'+item.speciality_id+'" >'+item.speciality_name+'</option>');
                    })

                },
                error: function(err){
                    if (err.status == 0) {
                        toastr.error('Net Connetion Error. Reload This Page.');
                    }else{
                        toastr.error('Server Error. Please contact to the support team.');
                    }
                }
            });
        }

        $(document).on('change', '#speciality-text', function(e){
            $.ajax({
                url: '/website/get-doctor/'+$(this).val(),
                type: 'get',
                success: function(data) {

                    $('#doctors-text').empty().append('<option selected disabled>Please Select</option>');
                    data.forEach((item, index)=>{
                        $('#doctors-text').append('<option value="'+item.id+'" >'+item.name+'</option>');
                    })

                },
                error: function(err){
                    if (err.status == 0) {
                        toastr.error('Net Connetion Error. Reload This Page.');
                    }else{
                        toastr.error('Server Error. Please contact to the support team.');
                    }
                }
            });
        });

    </script>


</body>

</html>
