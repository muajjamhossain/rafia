@extends('layouts/website')

@section('content')
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="hero-text">
                        <h1 class="wow fadeInUp" data-wow-delay=".2s">Healing starts with us,
                            Your trusted partner
                            in quality healthcare.</h1>
                        <div class="text-center wow fadeInUp" data-wow-delay=".3s">
                            <a href="#" class="btn-lg bg-primary-color">Learn more <i
                                    class="fa-solid fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="promo-area">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-12 col-xl-10">
                    <div class="promo-content">
                        <div class="promo-item wow fadeInLeft" data-wow-delay=".2s">
                            <img src="{{ asset('assets/website') }}/assets/img/icon/call.svg" alt="icon">
                            <p>Call for
                                <br> Appointment
                            </p>
                        </div>
                        <div class="promo-item wow fadeInLeft" data-wow-delay=".3s">
                            <img src="{{ asset('assets/website') }}/assets/img/icon/doctor.svg" alt="icon">
                            <p>Find Doctor</p>
                        </div>
                        <div class="promo-item wow fadeInLeft" data-wow-delay=".4s">
                            <img src="{{ asset('assets/website') }}/assets/img/icon/payments.svg" alt="icon">
                            <p>Test & Service
                                <br> Charges
                            </p>
                        </div>
                        {{-- <div class="promo-item wow fadeInLeft" data-wow-delay=".5s">
                            <img src="{{ asset('assets/website') }}/assets/img/icon/plus.svg" alt="icon">
                            <p>Call for
                                <br> Ambulance
                            </p>
                        </div> --}}

                        <a class="promo-item wow fadeInLeft" data-wow-delay=".2s" data-bs-toggle="modal"
                            data-bs-target="#callForAppointment">
                            <img src="{{ asset('assets/website') }}/assets/img/icon/plus.svg" alt="icon">
                            <p>Call for
                                <br> Appointment
                            </p>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our-services-area" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center section-title">
                        <div class="h2">Our <span class="primary-color">Services</span></div>
                        <br>
                        <p>Discover the difference in healthcare with our hospital's exceptional services,
                            from expert medical care to personalized attention and support throughout your journey to
                            wellness.</p>
                    </div>
                </div>
            </div>
            <div class="mx-lg-5">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="services-item wow fadeInUp" data-wow-delay=".2s">
                            <img src="{{ asset('assets/website') }}/assets/img/indoor-service.jpg" alt="services img">
                            <div class="services-text">
                                <div class="title">Indoor</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="services-item wow fadeInUp" data-wow-delay=".3s">
                            <img src="{{ asset('assets/website') }}/assets/img/outdoor-service.jpg" alt="services img">
                            <div class="services-text">
                                <div class="title">Outdoor</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="services-item wow fadeInUp" data-wow-delay=".4s">
                            <img src="{{ asset('assets/website') }}/assets/img/emergency-service.jpg" alt="services img">
                            <div class="services-text">
                                <div class="title">Emergency</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="services-item wow fadeInUp" data-wow-delay=".5s">
                            <img src="{{ asset('assets/website') }}/assets/img/pathology-service.jpg" alt="services img">
                            <div class="services-text">
                                <div class="title">Pathology and Imaging</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="services-item wow fadeInUp" data-wow-delay=".2s">
                            <img src="{{ asset('assets/website') }}/assets/img/physiotherapy-service.jpg"
                                alt="services img">
                            <div class="services-text">
                                <div class="title">Physiotherapy</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="services-item wow fadeInUp" data-wow-delay=".3s">
                            <img src="{{ asset('assets/website') }}/assets/img/ambulance-service.jpg" alt="services img">
                            <div class="services-text">
                                <div class="title">Ambulance</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="services-item wow fadeInUp" data-wow-delay=".4s">
                            <img src="{{ asset('assets/website') }}/assets/img/pharmecy-service.jpg" alt="services img">
                            <div class="services-text">
                                <div class="title">Pharmacy</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="services-item wow fadeInUp" data-wow-delay=".5s">
                            <img src="{{ asset('assets/website') }}/assets/img/operation-service.jpg" alt="services img">
                            <div class="services-text">
                                <div class="title">Operation Theater</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="text">
                        <p>{{ $basic->basic_details }}</p>
                    </div>
                </div>
                <div class="col-lg-3 align-self-center">
                    <div class="button">
                        <a href="{{ url('/website/about') }}" class="btn-lg">Know more details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="notices-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 align-self-center">
                    <div class="h2">
                        IMPORTANT <span class="primary-color fw-bold">Notices</span>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="notices-slid">

                        @foreach ($allNotice as $notice)
                            <div class="notices-content">
                                <img src="{{ asset('uploads/notice/'.$notice->notice_img) }}" alt="notices">
                                <div class="text">
                                    <div class="h5"><span class="primary-color">{{ $notice->notice_title_f_word }}</span> {{ $notice->notice_title_l_word }}</div>
                                    <p>{{ $notice->notice_subtitle }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our-doctors-area">
        <div class="container">
            <div class="row row-gap">
                <div class="col-lg-12 col-xl-6">
                    <div class="doctor-content">
                        <div class="doctor-item wow fadeInUp" data-wow-delay=".2s">
                            <img src="{{ asset('assets/website') }}/assets/img/doctors1.svg" alt="doctors">
                            <br>
                            <div class="name">Doctor name</div>
                        </div>
                        <div class="doctor-item wow fadeInUp" data-wow-delay=".3s">
                            <img src="{{ asset('assets/website') }}/assets/img/doctors2.svg" alt="doctors">
                            <br>
                            <div class="name">Doctor name</div>
                        </div>
                        <div class="doctor-item wow fadeInUp" data-wow-delay=".4s">
                            <img src="{{ asset('assets/website') }}/assets/img/doctors3.svg" alt="doctors">
                            <br>
                            <div class="name">Doctor name</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-6 ps-lg-5">
                    <div class="doctors-details">
                        <div class="h2 fw-bold wow fadeInUp" data-wow-delay=".2s">Meet Our <span
                                class="primary-color">Doctors</span></div>
                        <p class="wow fadeInUp" data-wow-delay=".3s">We have talent, experienced, reputed and dynamic
                            doctors in our team working in a growing practice.
                            All the doctors are whole heartedly waiting to help out
                            the patients with majestic treatments. Our doctors are
                            supported by practice nurses, management and clerical
                            staff all providing high quality care to our patients. </p>
                        <div class="button-groups wow fadeInUp" data-wow-delay=".4s">
                            <a href="{{ url('website/doctors') }}" class="btn-lg bg-primary-color">All Doctors</a>
                            <a href="{{ url('website/doctors') }}" class="btn-lg">Todays Doctors</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="technology-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="h2 section-head">OUR <span class="primary-color fw-bold">ENHANCHED</span> TECHNOLOGY
                    </div>
                </div>
            </div>
        </div>
        <div class="technology-slider">
            <div><img src="{{ asset('assets/website') }}/assets/img/technology1.svg" alt=""></div>
            <div><img src="{{ asset('assets/website') }}/assets/img/technology2.svg" alt=""></div>
            <div><img src="{{ asset('assets/website') }}/assets/img/technology3.svg" alt=""></div>
            <div><img src="{{ asset('assets/website') }}/assets/img/technology1.svg" alt=""></div>
            <div><img src="{{ asset('assets/website') }}/assets/img/technology2.svg" alt=""></div>
            <div><img src="{{ asset('assets/website') }}/assets/img/technology3.svg" alt=""></div>
        </div>
    </section>

    <section class="companies-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center h2 section-head fw-semibold">OUR <span class="primary-color">COMPANIES</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mx-auto col-lg-10">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay=".2s">
                            <a href="#" class="companies-logo"><img
                                    src="{{ asset('assets/website') }}/assets/img/logo1.svg" alt="logo"></a>
                        </div>
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                            <a href="#" class="companies-logo"><img
                                    src="{{ asset('assets/website') }}/assets/img/logo2.svg" alt="logo"></a>
                        </div>
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay=".4s">
                            <a href="#" class="companies-logo"><img
                                    src="{{ asset('assets/website') }}/assets/img/logo3.svg" alt="logo"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5 partners-area">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-10">
                    <hr>
                    <div class="text-center h2 section-head fw-semibold">CORPORATE <span
                            class="primary-color">PARTNERS</span></div>
                    <div class="wow fadeInUp" data-wow-delay=".2s">
                        <img src="{{ asset('assets/website') }}/assets/img/corporate.png" alt="corporate">
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="google-map-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center google-map">
                        <div class="h2">Google map location</div>
                        <div class="wow zoomIn" data-wow-delay=".2s">
                            <img src="{{ asset('assets/website') }}/assets/img/map.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
