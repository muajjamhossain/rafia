@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Testimonial</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Testimonial</a></li>
            <li class="active">View</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> View Testimonial Information</h3>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{url('dashboard/testimonial')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Testimonial</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <table class="table table-bordered table-striped table-hover custom_view_table">
                            <tr>
                                <td>Client Name</td>
                                <td>:</td>
                                <td>{{$data->tm_name}}</td>
                            </tr>
                            <tr>
                                <td>Designation</td>
                                <td>:</td>
                                <td>{{$data->tm_designation}}</td>
                            </tr>
                            <tr>
                                <td>Company</td>
                                <td>:</td>
                                <td>{{$data->tm_company}}</td>
                            </tr>
                            <tr>
                                <td>Client Review</td>
                                <td>:</td>
                                <td>{{$data->tm_review}}</td>
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td>:</td>
                                <td>
                                    @if($data->tm_image!='')
                                        <img class="table_image_ban_big" src="{{asset('uploads/testimonial/'.$data->tm_image)}}" alt="image"/>
                                    @else
                                        <img class="table_image_ban_big" src="{{asset('uploads')}}/no-image-big.jpg" alt="image"/>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Upload Time</td>
                                <td>:</td>
                                <td>{{$data->created_at->format('d-m-Y | h:i:s a')}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="card-footer card_footer_expode">
                <a href="#" class="btn btn-secondary waves-effect">PRINT</a>
                <a href="#" class="btn btn-warning waves-effect">EXCEL</a>
                <a href="#" class="btn btn-success waves-effect">PDF</a>
            </div>
        </div>
    </div>
</div>
@endsection
