@extends('layouts/website')

@section('content')
    <section class="gallery-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills gallery-nav" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-equipments-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-equipments" type="button" role="tab" aria-controls="pills-equipments"
                                aria-selected="true">EQUIPMENTS</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-support-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-support" type="button" role="tab" aria-controls="pills-support"
                                aria-selected="false">CUSTOMER SUPPORT</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-collection-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-collection" type="button" role="tab" aria-controls="pills-collection"
                                aria-selected="false">SAMPLE COLLECTION</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-team-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-team" type="button" role="tab" aria-controls="pills-team"
                                aria-selected="false">OUR TEAM</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-equipments" role="tabpanel" aria-labelledby="pills-equipments-tab">
                <div class="gallery-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="h2 ">Our Latest <span class="primary-color">Equipment's</span></div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($allGallery as $galleryItem)

                                @if($galleryItem->gcate_id == 1)
                                    <div class="col-lg-4 col-6">
                                        <div class="gallery-img">
                                            <img src="{{asset('uploads/gallery/'.$galleryItem->gallery_photo)}}" alt="gallery image">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-support" role="tabpanel" aria-labelledby="pills-support-tab">
                <div class="gallery-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="h2 ">CUSTOMER <span class="primary-color">SUPPORT</span></div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($allGallery as $galleryItem)

                                @if($galleryItem->gcate_id == 2)
                                    <div class="col-lg-4 col-6">
                                        <div class="gallery-img">
                                            <img src="{{asset('uploads/gallery/'.$galleryItem->gallery_photo)}}" alt="gallery image">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-collection" role="tabpanel" aria-labelledby="pills-collection-tab">
                <div class="gallery-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="h2 ">SAMPLE  <span class="primary-color">COLLECTION</span></div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($allGallery as $galleryItem)

                                @if($galleryItem->gcate_id == 3)
                                    <div class="col-lg-4 col-6">
                                        <div class="gallery-img">
                                            <img src="{{asset('uploads/gallery/'.$galleryItem->gallery_photo)}}" alt="gallery image">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-team" role="tabpanel" aria-labelledby="pills-team-tab">
                <div class="gallery-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="h2 ">OUR  <span class="primary-color">TEAM</span></div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($allGallery as $galleryItem)

                                @if($galleryItem->gcate_id == 4)
                                    <div class="col-lg-4 col-6">
                                        <div class="gallery-img">
                                            <img src="{{asset('uploads/gallery/'.$galleryItem->gallery_photo)}}" alt="gallery image">
                                            {{-- <img src="{{asset('uploads/gallery/'.$galleryItem->gallery_photo)}}" height="200" width="150" alt="doctors images"> --}}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
