@extends('layouts/website')

@section('content')

    <section class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="about-nav justify-content-center">

                        <li data-bs-toggle="modal" data-bs-target="#ChairmanModal"><span>Message </span> from Chairman
                        </li>
                        <li data-bs-toggle="modal" data-bs-target="#directorModal"><span>Message </span> from Managing
                            Director</li>

                    </ul>
                </div>
                <!-- Managing Director -->
               <div class="modal fade" id="directorModal" tabindex="-1" aria-labelledby="directorModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content p-md-4">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="modal-body">
                                <div class="d-md-flex d-grid align-items-center justify-content-center">
                                    <div class="text-center">
                                        <div class="text-center dd-img">
                                            <img src="{{ asset('assets/website') }}/assets/img/director.jpg" alt="" height="150">
                                        </div>
                                        <div class="text-center">
                                            <div class="text-danger h3 fw-bold">Mohammad Wahiduzzaman</div>
                                            <div class="text-primary h6 fw-semibold">Massage from Managing Director</div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <p>
                                    বাংলাদেশ একটি উন্নয়নশীল দেশ। আমাদের শিল্পে বিশেষ করে স্বাস্থ্য খাতে আমাদের প্রচুর
                                    সুযোগ এবং সম্ভাবনা রয়েছে। মূলত আমার বাবা ছিলেন কৃষি নির্ভর পরিবারের সন্তান। আমার
                                    পরিবারের কেউ চিকিৎসা সেবার সাথে নিয়োজিত ছিল না। আমার স্বপ্ন ছিল চিকিৎসা সেবার সাথে
                                    যুক্ত হওয়ার। সেই লক্ষ্য পূরনের প্রয়োজনীয়তা এবং পরিস্থিতি আমাকে সেবামূলক ব্যবসা
                                    শুরু করতে বাধ্য করে। চ্যালেঞ্জ ও সমস্যা অনেক, কিন্তু সমাধানের কৌশল খুব কম এবং
                                    সুনির্দিষ্ট। একজন ব্যবসায়ী হিসাবে আমাদের প্রতিশ্রুতি এবং গুণমান সম্পর্কে নিরলসভাবে
                                    উদ্বিগ্ন হওয়া উচিত।
                                    <br><br>
                                    রাফিয়া হাসপাতাল (প্রাঃ) লিঃ 2007 সালের নভেম্বর মাসে রাফিয়া হাসপাতাল দিয়ে সেবামূলক
                                    ব্যবসার যাত্রা শুরু করে এবং সাশ্রয়ী মূল্যে কেরাণীগঞ্জের সকল স্তরের মানুষকে সম্ভাব্য
                                    মানসম্পন্ন পরিষেবা প্রদানের প্রতিশ্রুতি দিয়ে যাচ্ছে। আমি যখন পড়াশুনা করি তখন দেখতাম
                                    আমাদের দেশের হাজার হাজার মানুষ প্রতি বছর শুধু চিকিৎসার জন্যই পৃথিবীর বিভিন্ন দেশে
                                    যাচ্ছে। আর দেশ হারাচ্ছিল কোটি কোটি টাকার বৈদেশিক মুদ্রা। সেই সময় আমার মনে হয়েছিল,
                                    একজন মানুষ হিসেবে আমাকে এ বিষয়ে কিছু করতে হবে। আমার প্রবল ইচ্ছা ছিল কিন্তু সম্পদ
                                    ছিল না. সেই অনুপ্রেরণা থেকেই আমি রাফিয়া হাসপাতালটি শুরু করি।
                                    <br><br>
                                    লক্ষ্য অর্জন এবং মানসম্পন্ন সেবা নিশ্চিত করার জন্য প্রয়োজনীয় ব্যবস্থা গ্রহন করে
                                    থাকি যেমন অসহায়, দুস্থ, এতিম ও মুক্তিযুদ্ধাদের জন্য ফ্রি চিকিৎসা সেবার ব্যবস্থা
                                    প্রদান করে আসছি। শুধু তাই নয় তাদের জন্য সকল প্যাথলজিক্যাল,ইমেজিং,ইনডোর-আইট ডোর সেবার
                                    উপর 50% পর্যন্ত ছাড়ের ব্যবস্থার মাধ্যমে নিরলসভাবে চিকিৎসা সেবার উচ্চ মান বজায় রেখে
                                    আসছি। একটি স্বাস্থ্য পরিষেবা প্রদানকারী সংস্থার একজন উদ্যোক্তা হওয়ার কারণে আমি
                                    সর্বদা সঠিক জায়গায় সঠিক চিকিৎসা সেবা নিশ্চিত করতে উদ্বিগ্ন। আমি বিশ্বাস করি যে
                                    একজন ব্যক্তি যদি ডাক্তার হোক বা না হোক কঠোর পরিশ্রমী, যোগ্যতা, ভাল আচরণ এবং সৎ থাকে
                                    তবে সে একজন সফল ব্যবসায়ী হবে। সাফল্য অর্জনের লক্ষ্য ছাড়া আর কিছুই নয়। প্রতিটি
                                    সাফল্যের ইতিবাচক উত্পাদনশীলতা রয়েছে, যা মানবজাতির কল্যাণের জন্য নিবেদিত।
                                    সর্বশক্তিমান ঈশ্বর, মাননীয় ডাক্তার এবং আমার প্রিয় সহকর্মীরা আমাকে সবসময় ভাল কাজ
                                    করতে এবং চ্যালেঞ্জ নিতে অনুপ্রাণিত করেন। আমার সব তাদের খুশি সামর্থ্য.
                                    <br><br><br>
                                    Bangladesh is a developing country. We have a lot of opportunities and potential in
                                    our industry, especially in the health sector. Originally my father was a child of
                                    an agricultural dependent family. None of my family was engaged in medical services.
                                    My dream was to get involved in medical services. The need and circumstances to meet
                                    that goal compelled me to start a service business. Lots of challenges and problems,
                                    but the solution strategy is very minimal and precise. As a trader we should be
                                    relentlessly concerned about commitment and quality.
                                    <br><br>
                                    Rafia Hospital (Pvt.) Ltd. started its service business journey with Rafia Hospital
                                    in November 2007 and has been promising to provide quality services to all the
                                    people of Keraniganj at affordable prices. When I was studying, I saw thousands of
                                    people in our country going to different countries of the world every year just for
                                    treatment. As a result the country was losing billions of rupees in foreign
                                    exchange. At that time I thought, as a human being I have to do something about it.
                                    I had such strong wish but not wealth. It was from that inspiration that I started
                                    Rafia Hospital.
                                    <br><br>
                                    We have taken necessary steps to achieve the goals and ensure quality services such
                                    as providing free medical services to the helpless, destitute, orphans and freedom
                                    fighters. Not only that, I have been relentlessly maintaining the high standard of
                                    medical care for all pathological, imaging, indoor and outdoor services with up to
                                    50% discount. As an entrepreneur of a health care provider I am always concerned to
                                    ensure the right treatment in the right place. I believe that a person will be a
                                    successful businessman if he is hardworking, qualified, well behaved and honest
                                    whether he is a doctor or not. Nothing but the goal of success. Every success has a
                                    positive productivity, dedicated to the welfare of mankind. Almighty God, the
                                    honorable doctor and my dear colleagues always inspire me to do well and take on
                                    challenges. I can afford to make them all happy.

                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Managing Chairman -->
                <div class="modal fade" id="ChairmanModal" tabindex="-1" aria-labelledby="ChairmanModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content p-md-4">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            <div class="modal-body">
                                <div class="d-md-flex d-grid align-items-center justify-content-center">
                                    <div class="text-center">
                                        <div class="dd-img text-center">
                                            <img src="{{ asset('assets/website') }}/assets/img/chairman.jpg" alt="" height="150">
                                        </div>
                                        <div class="text-center">
                                            <div class="text-danger h3 fw-bold">Dr. Helena Akter</div>
                                            <div class="text-primary h6 fw-semibold">Massage from Chairman </div>
                                        </div>
                                    </div>

                                </div>
                                <br><br>
                                <p>
                                    মধ্যম আয়ের বাংলাদেশের বিভিন্ন খাতে উন্নতির সাথে সাথে স্বাস্থ্যখাতেও বিশ্বের উন্নত দেশের সাথে তাল মিলিয়ে বাংলাদেশে ও উন্নত সেবার দ্বার প্রান্তে এসে পৌছে গেছে। একটা সময় গ্রামের মানুষ উন্নত চিকিৎসার জন্য ঢাকার কেন্দ্রস্থলে গিয়ে চিকিৎসা সুবিধা নিশ্চিত করত। দুর্ভাগ্যবশত, রোগের অসম্পূর্ণ নির্ণয় এবং উন্নত চিকিৎসার অভাবে সে সময় দেশের উল্লেখযোগ্য সংখ্যক মানুষ মারা যায়। দুর্ভোগ যখন সীমা ছাড়িয়ে গেল,  তখন আমরা ঢাকার কেরাণীগঞ্জের আটিবাজারে রাফিয়া হাসপাতাল (প্রাঃ) লি. প্রতিষ্ঠা করি।আমাদের লক্ষ্য ছিল দেশের গণমানুষের জন্য আধুনিক চিকিৎসা সুবিধা নিশ্চিত করা।
                                    <br><br>
                                    রাফিয়া হাসপাতাল (প্রাঃ) লি. 2007 সালের নভেম্বর মাসে তার যাত্রা শুরু করে এবং কিছু দিনের মধ্যে রিপোর্টের সঠিকতা এবং পরিসেবার গুণমানের কারণে রাফিয়া হাসপাতাল (প্রাঃ) লি.  সংশ্লিষ্ট ডাক্তার এবং আমাদের কেরাণীগঞ্জের মানুষের কাছে নির্ভরযোগ্যতা এবং আস্থার একটি প্রতীক হয়ে ওঠে।
                                    <br><br>
                                    সংশ্লিষ্ট ডাক্তারদের চাহিদা মেটাতে আমরা অত্যন্ত নির্ভুলতার সাথে রোগীদের সম্পূর্ণ রোগ নির্ণয়ের জন্য একের পর এক অত্যাধুনিক প্রযুক্তির মেশিনারির আধুনিক সেটআপ নিশ্চিত করার চেষ্টা করে যাচ্ছি।
                                    <br><br>
                                    রাফিয়া হাসপাতাল (প্রাঃ) লি. অল্প খরচে সু-চিকিৎসা প্রদানই আমাদের লক্ষ!
                                    <br><br><br>

                                    Along with the improvement in various sectors of a middle income country like Bangladesh, the health sector has also reached the doorstep of Bangladesh and advanced services in keeping pace with the developed countries of the world. There was a time, village used to go to the center of Dhaka for better treatment to ensure medical facilities. Unfortunately, a significant number of people in the country died at that time due to inaccurate diagnosis and lack of advanced treatment. When the misery crossed the line, we established Rafia Hospital (Pvt.) Ltd. in Ati Bazar, Keraniganj, Dhaka. Our goal was to ensure modern medical treatment and facilities for the people of the country.
                                    <br><br>
                                    Rafia Hospital (Pvt) Ltd. started its journey in November 2007 and within a few days due to the accurate report and the quality services, Rafia Hospital (Pvt.) Ltd. became a symbol of reliability and trust to the concerned doctors and the people of Keraniganj.
                                    <br><br>
                                    In order to meet the needs of the concerned doctors, we are trying to ensure a modern setup of state-of-the-art machinery for the complete and accurate diagnosis of patients with utmost precision.
                                    <br><br>
                                    Rafia Hospital (Pvt) Ltd. Our goal is to provide good treatment at low cost!

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-healthier">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="text">
                            <div class="h4 fw-semibold">Make your life more <span class="primary-color">Healthier</span>
                            </div>
                            <p>
                                Rafia Hospital Pvt. Limited is committed to render the possible standard service to the
                                people of the country at an affordable cost. This will definitely reduce the burden of
                                the government and will make the path of "Health for all".
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 ms-auto">
                        <div class="text-right">
                            <a href="{{ url('/') }}#services" class="btn-lg bg-primary-color">See our Service</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-us">
            <div class="container">
                <div class="row row-gap">
                    <div class="col-lg-12">
                        <div class="about-text">
                            <div class="h2">About <span class="primary-color">Us</span></div>
                            <br>
                            <p>
                                Rafia Hospital (Pvt.) Limited, registered by Ministry of Health, Govt. of Bangladesh,
                                License no. 5427 &amp; 2475, situated at Ati Bazar road, Keranigonj, Dhaka-1312. Rafia
                                Hospital (Pvt.) Limited (RHPL) is an integrated, efficient, high-quality health care
                                system where the patient service comes first priority. We are an organization of health
                                care service Provider who maintains high standard of quality, cost effective and patient
                                satisfaction. We seek to improve the health of the communities and workers. We serve by
                                delivering a board range of health service with sensitively to the individual needs of
                                our patient. Rafia Hospital (Pvt.) Limited is situated Ati Bazar road, Keranigonj,
                                Dhaka-1312 .The Institution has modern diagnostic equipments for all kinds of operation
                                including Laparoscopic operation like lap. Hysterectomy, Diagnostic therapeutic
                                Laparoscopy, Laparoscopic Cholecystectomy, Appendiccectomy, Tran’s urethral renal stone
                                removal, Normal delivery, Caesarean section etc. For your kind information I want to
                                mention that Medicine, Surgery and Gynae specialist doctor’s chamber are also available
                                here. Senior Emergency Medical Officer (MBBS) are available for 24 hours. The
                                institution (RHPL) has Digital X-ray, 4D color Dopplar Digital Ultrasonography (USG),
                                Auto analyzer Biochemistry machine, Echocardiography, ECG machine. Rafia Hospital (Pvt.)
                                Limited. Has modern equipment’s for emergency management like cut injury, head injury,
                                industrial injury, Burn injury and also all kinds of occupational Hazard.
                            </p>
                        </div>
                    </div>
                    <!--<div class="col-lg-5 ms-auto">
                        <div class="about-img">
                            <img src="{{ asset('assets/website') }}/assets/img/about1.svg" alt="about image">
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
        <div class="about-objectives">
            <div class="container">
                <div class="row row-gap">
                    <div class="col-lg-5">
                        <div class="about-objectives-img">
                            <img src="{{ asset('assets/website') }}/assets/img/about2.svg" alt="about image">
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1">
                        <div class="about-objectives-text">
                            <div class="title">
                                Our <span class="primary-color">Mission</span>
                            </div>
                            <div class="text">
                                <p>The hospital is started with the attainable mission of providing “better patient care
                                    to the needy and poor people at free of cost.” With the above said mission, the
                                    poor, sick and wounded persons of Guntur district and other neighboring districts
                                    will be very much benefited.</p>
                            </div>
                            <br>
                            <div class="title">
                                Our <span class="primary-color">History</span>
                            </div>
                            <div class="text">
                                <p>Founded in 2007, recognized the potential for.</p>
                                <p>Customer getting the safety service efficiently.</p>
                                <p>Right safety service done accurately and transparently.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-objectives">
            <div class="container">
                <div class="row row-gap">
                    <div class="col-lg-7">
                        <div class="about-objectives-text me-3 ms-5">
                            <div class="title">
                                Company's <span class="primary-color">Philosophy</span>
                            </div>
                            <div class="text">
                                <p>Rafia Hospital (Pvt.) Limited philosophy is an attempt to conceive and present
                                    medical and surgical, special specific departments towards client extended services.
                                </p>
                                <p>Inclusive and systematic view of the Universe and its main place in it. Client’s
                                    admission to till discharge care.</p>
                                <p>A philosophy for Rafia Hospital (Pvt.) Limited is department commitments or
                                    programmes which were rendered for individuals or particulars groups in the
                                    achievement of their purpose towards preventive, promotive, curative and
                                    rehabilitative.</p>
                                <p>Philosophy is science which is concerned with casualty because care and effect
                                    scientifically diagnosed for treatment purpose.</p>
                                <p>By this institution we believe that client care is a close relation between order of
                                    plan and order of action.</p>
                                <p>We believe that through this institution health education to the clients, in service
                                    education to the medical, nursing paramedical staff.</p>
                                <p>Acquire and acceptable philosophy of both education and life and research activities
                                    for existing health problems.</p>
                                <p>Institution believes that every client has been satisfied by service provided
                                    regarding Bio-psychological and Spiritual needs.</p>
                                <p>Medical services for individual who are in need, as the right to receive optimum are
                                    regardless of race, religion or social status.</p>
                                <p>We believe that administrative nursing, medical care are dynamic evolving from
                                    changing in health care and advice in medical science and technology.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="about-objectives-img">
                            <img src="{{ asset('assets/website') }}/assets/img/about2.svg" alt="about image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-objectives">
            <div class="container">
                <div class="row row-gap">
                    <div class="col-lg-5">
                        <div class="about-objectives-img">
                            <img src="{{ asset('assets/website') }}/assets/img/about2.svg" alt="about image">
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1">
                        <div class="about-objectives-text">
                            <div class="title">
                                Best <span class="primary-color">Value</span>
                            </div>
                            <div class="text">
                                <p>Up to 90% cheaper, still feasible during economic recession</p>
                                <p>Fastest Growing company</p>
                                <p>Over 75 (+) relation in National and Multinational Organization.</p>

                            </div>
                            <br>
                            <div class="title">
                                Serve Fast <span class="primary-color">Fill All</span>
                            </div>
                            <div class="text">
                                <p>We emphasize on Quality, Speed and Accuracy</p>
                                <p>Dedicated customer service support team – Corporate Care</p>
                                <p>Professional account management representatives</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
