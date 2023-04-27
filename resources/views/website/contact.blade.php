@extends('layouts/website')

@section('content')
    <section class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-7">
                    @if(Session::has('successContact'))
                      <div class="alert alert-success alertsuccess" role="alert">
                         <strong>Successfully!</strong> store your Contact information.
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

            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-text">
                        <div class="h2">Get in <b>Touch</b></div>
                        <p>Rafia hospital Pvt Ltd. started its journey in June 1983 and within few days due to its accuracy of the reports and quality of the service, Popular became an unparallel symbol of reliability and trust from the end of respective doctors and the people of our country. To get any service and support from us, please contact us.</p>
                        <ul class="address-contact">
                            <li>
                                <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                                <p><b>Address:</b> Ati Bazar, Keraniganj Model, 
                                   <br> Dhaka-1312</p>
                            </li>
                            <li>
                                <div class="icon"><i class="fa-solid fa-phone"></i></div>
                                <p><b>Phone:</b> 01716-624854</p>
                            </li>
                            <li>
                                <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                                <p><b>Email:</b> rafia.hospital2017@gmail.com</p>
                            </li>
                        </ul>
                        <div class="business-time">
                            <div class="h3">Business <b>Hours</b></div>
                            <span><i class="fa-solid fa-clock"></i> 7 AM - 11 PM (Everyday)</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="contact-form">
                        <div class="h2"><b>Contact</b> Us</div>
                        <form action="{{ route('website.complain.store') }}" method="post">
                            @csrf
                            <div class="contact-box">
                                <label>Your name *</label>
                                <input type="text" name="name">
                            </div>
                            <div class="contact-box">
                                <label>Your Phone *</label>
                                <input type="number" name="phone">
                            </div>
                            <div class="contact-box">
                                <label>Your email address *</label>
                                <input type="email" name="email">
                                <input type="hidden" name="subject" value="Contact">
                            </div>
                            <div class="contact-box">
                                <label>Message *</label>
                                <textarea name="details"></textarea>
                            </div>
                            <div class="contact-box text-center">
                                <button type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection