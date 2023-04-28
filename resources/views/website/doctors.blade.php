@extends('layouts/website')

@section('content')

    <section class="doctors-area">
        <div class="doctors-find">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto">
                        <div class="find-doctors">
                            <div class="h2 fw-bold">Find Our <span class="primary-color">DOCTORS</span></div>
                            <hr>
                            <form action="{{ url('website/doctors/search') }}" method="post" class="row justify-content-center">
                                @csrf
                                <div class="col-6">
                                    <input type="text" name="name" placeholder="Search by name">
                                </div>
                                <div class="col-6">
                                    <input type="text" name="specialty" placeholder="Search by specialty ">
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="doctors-content">
            <div class="container">
                <div class="row">

                    @foreach ($allDoctor as $key => $doctor)
                        @php
                            $auto = '';
                            if(($key + 1) % 2 ==0){
                                $auto = 'ms-auto';
                            }
                        @endphp

                        <div class="col-lg-5 {{ $auto }}">
                            <div class="doctors-item">
                                <div class="image">


                                    @if($doctor->photo!='')
                                        <img src="{{asset('uploads/doctors/'.$doctor->photo)}}" height="200" width="150" alt="doctors images">
                                    @else
                                        {{-- <img class="table_image_40" src="{{asset('uploads')}}/avatar-black.png" alt="user-photo"/> --}}
                                        <img src="{{ asset('assets/website') }}/assets/img/doctors-img-1.svg" alt="doctors images">
                                    @endif
                                </div>
                                <div class="text">
                                    <p>
                                        <b class="primary-color">{{ $doctor->name }}</b>
                                        <br>
                                        <b>Doctors Degree:</b> {{ $doctor->degree }}
                                        <br>
                                        <b>Specialties:</b> {{ $doctor->SpecialityInfo->speciality_name }}
                                        <br>
                                        <b>Branch:</b> {{ $doctor->branch }}
                                        <br>
                                        <b>Practice Days:</b> {{ $doctor->practice_days }}
                                    </p>
                                    <div class="get-btn">
                                        <a href="#">Get appointment</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="col-lg-12">
                        <hr>
                    </div> --}}
                </div>



                {{-- <div class="row">
                    <div class="col-lg-5">
                        <div class="doctors-item">
                            <div class="image">
                                <img src="{{ asset('assets/website') }}/assets/img/doctors-img-1.svg" alt="doctors images">
                            </div>
                            <div class="text">
                                <p>
                                    <b class="primary-color">Doctor Name</b>
                                    <br>
                                    <b>Doctors Degree:</b> MBBS, FCPS
                                    <br>
                                    <b>Specialties:</b> Neuro Surgery
                                    <br>
                                    <b>Branch:</b> Dhanmondi
                                    <br>
                                    <b>Practice Days:</b> Sunday, Monday, Tuesday, Wednesday, Saturday
                                </p>
                                <div class="get-btn">
                                    <a href="#">Get appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 ms-auto">
                        <div class="doctors-item">
                            <div class="image">
                                <img src="{{ asset('assets/website') }}/assets/img/doctors-img-1.svg" alt="doctors images">
                            </div>
                            <div class="text">
                                <p>
                                    <b class="primary-color">Doctor Name</b>
                                    <br>
                                    <b>Doctors Degree:</b> MBBS, FCPS
                                    <br>
                                    <b>Specialties:</b> Neuro Surgery
                                    <br>
                                    <b>Branch:</b> Dhanmondi
                                    <br>
                                    <b>Practice Days:</b> Sunday, Monday, Tuesday, Wednesday, Saturday
                                </p>
                                <div class="get-btn">
                                    <a href="#">Get appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="doctors-item">
                            <div class="image">
                                <img src="{{ asset('assets/website') }}/assets/img/doctors-img-1.svg" alt="doctors images">
                            </div>
                            <div class="text">
                                <p>
                                    <b class="primary-color">Doctor Name</b>
                                    <br>
                                    <b>Doctors Degree:</b> MBBS, FCPS
                                    <br>
                                    <b>Specialties:</b> Neuro Surgery
                                    <br>
                                    <b>Branch:</b> Dhanmondi
                                    <br>
                                    <b>Practice Days:</b> Sunday, Monday, Tuesday, Wednesday, Saturday
                                </p>
                                <div class="get-btn">
                                    <a href="#">Get appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 ms-auto">
                        <div class="doctors-item">
                            <div class="image">
                                <img src="{{ asset('assets/website') }}/assets/img/doctors-img-1.svg" alt="doctors images">
                            </div>
                            <div class="text">
                                <p>
                                    <b class="primary-color">Doctor Name</b>
                                    <br>
                                    <b>Doctors Degree:</b> MBBS, FCPS
                                    <br>
                                    <b>Specialties:</b> Neuro Surgery
                                    <br>
                                    <b>Branch:</b> Dhanmondi
                                    <br>
                                    <b>Practice Days:</b> Sunday, Monday, Tuesday, Wednesday, Saturday
                                </p>
                                <div class="get-btn">
                                    <a href="#">Get appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="doctors-item">
                            <div class="image">
                                <img src="{{ asset('assets/website') }}/assets/img/doctors-img-1.svg" alt="doctors images">
                            </div>
                            <div class="text">
                                <p>
                                    <b class="primary-color">Doctor Name</b>
                                    <br>
                                    <b>Doctors Degree:</b> MBBS, FCPS
                                    <br>
                                    <b>Specialties:</b> Neuro Surgery
                                    <br>
                                    <b>Branch:</b> Dhanmondi
                                    <br>
                                    <b>Practice Days:</b> Sunday, Monday, Tuesday, Wednesday, Saturday
                                </p>
                                <div class="get-btn">
                                    <a href="#">Get appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 ms-auto">
                        <div class="doctors-item">
                            <div class="image">
                                <img src="{{ asset('assets/website') }}/assets/img/doctors-img-1.svg" alt="doctors images">
                            </div>
                            <div class="text">
                                <p>
                                    <b class="primary-color">Doctor Name</b>
                                    <br>
                                    <b>Doctors Degree:</b> MBBS, FCPS
                                    <br>
                                    <b>Specialties:</b> Neuro Surgery
                                    <br>
                                    <b>Branch:</b> Dhanmondi
                                    <br>
                                    <b>Practice Days:</b> Sunday, Monday, Tuesday, Wednesday, Saturday
                                </p>
                                <div class="get-btn">
                                    <a href="#">Get appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}



            </div>
        </div>
    </section>
@endsection
