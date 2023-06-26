@push('myCustomStyle')
    <style>
        .customModalBtn{
            border: 0;
            background: none;
        }
    </style>
@endpush

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
                    <button data-bs-toggle="modal" data-bs-target="#IndoorModal" class="customModalBtn">
                       <div class="services-item wow fadeInUp" data-wow-delay=".2s">
                            <img src="{{ asset('assets/website') }}/assets/img/indoor-service.jpg" alt="services img">
                            <div class="services-text">
                                <div class="title">Indoor</div>
                            </div>
                        </div>
                    </button>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <button data-bs-toggle="modal" data-bs-target="#OutdoorModal" class="customModalBtn">
                        <div class="services-item wow fadeInUp" data-wow-delay=".3s">
                            <img src="{{ asset('assets/website') }}/assets/img/outdoor-service.jpg" alt="services img">
                            <div class="services-text">
                                <div class="title">Outdoor</div>
                            </div>
                        </div>
                    </button>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <button data-bs-toggle="modal" data-bs-target="#EmergencyModal" class="customModalBtn">
                        <div class="services-item wow fadeInUp" data-wow-delay=".4s">
                            <img src="{{ asset('assets/website') }}/assets/img/emergency-service.jpg" alt="services img">
                            <div class="services-text">
                                <div class="title">Emergency</div>
                            </div>
                        </div>
                    </button>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <button data-bs-toggle="modal" data-bs-target="#PathologyModal" class="customModalBtn">
                        <div class="services-item wow fadeInUp" data-wow-delay=".5s">
                            <img src="{{ asset('assets/website') }}/assets/img/pathology-service.jpg" alt="services img">
                            <div class="services-text">
                                <div class="title">Pathology and Imaging</div>
                            </div>
                        </div>
                    </button>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <button data-bs-toggle="modal" data-bs-target="#PhysiotherapyModal" class="customModalBtn">
                        <div class="services-item wow fadeInUp" data-wow-delay=".2s">
                            <img src="{{ asset('assets/website') }}/assets/img/physiotherapy-service.jpg"
                                alt="services img">
                            <div class="services-text">
                                <div class="title">Physiotherapy</div>
                            </div>
                        </div>
                    </button>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <button data-bs-toggle="modal" data-bs-target="#AmbulanceModal" class="customModalBtn">
                        <div class="services-item wow fadeInUp" data-wow-delay=".3s">
                            <img src="{{ asset('assets/website') }}/assets/img/ambulance-service.jpg" alt="services img">
                            <div class="services-text">
                                <div class="title">Ambulance</div>
                            </div>
                        </div>
                    </button>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <button data-bs-toggle="modal" data-bs-target="#PharmacyModal" class="customModalBtn">
                        <div class="services-item wow fadeInUp" data-wow-delay=".4s">
                            <img src="{{ asset('assets/website') }}/assets/img/pharmecy-service.jpg" alt="services img">
                            <div class="services-text">
                                <div class="title">Pharmacy</div>
                            </div>
                        </div>
                    </button>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <button data-bs-toggle="modal" data-bs-target="#OperationModal" class="customModalBtn">
                        <div class="services-item wow fadeInUp" data-wow-delay=".5s">
                            <img src="{{ asset('assets/website') }}/assets/img/operation-service.jpg" alt="services img">
                            <div class="services-text">
                                <div class="title">Operation Theater</div>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

@include('website.includes.modal.indoor-modal')
@include('website.includes.modal.outdoor-modal')
@include('website.includes.modal.emergency-modal')
@include('website.includes.modal.pathology-modal')
@include('website.includes.modal.physiotherapy-modal')
@include('website.includes.modal.ambulance-modal')
@include('website.includes.modal.pharmacy-modal')
@include('website.includes.modal.operation-modal')


@push('myCustomScripts')
    <script type="text/javascript">
        $(document).ready(function(){
            // alert("ookk");

        })
    </script>
@endpush
