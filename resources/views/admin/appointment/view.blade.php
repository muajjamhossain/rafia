@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Appointment</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Appointment</a></li>
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
                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> View Appointment</h3>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{url('dashboard/appointment')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Appointment</a>
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
                                <td>Name</td>
                                <td>:</td>
                                <td>{{$data->name}}</td>
                            </tr>
                            <tr>
                                <td>Age</td>
                                <td>:</td>
                                <td>{{$data->age}}</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>:</td>
                                <td>{{$data->gender}}</td>
                            </tr>
                            <tr>
                                <th>patient Status</th>
                                <td>:</td>
                                <td>{{$data->patient_status}}</td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td>:</td>
                                <td>{{$data->schedule_date}}</td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>:</td>
                                <td>{{$data->schedule_time}}</td>
                            </tr>
                            <tr>
                                <td>Speciality</td>
                                <td>:</td>
                                <td>{{$data->SpecialityInfo->speciality_name}}</td>
                            </tr>
                            <tr>
                                <td>Doctor</td>
                                <td>:</td>
                                <td>{{$data->doctorInfo->name}}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>:</td>
                                <td>{{$data->description}}</td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>:</td>
                                <td>{{$data->created_at->format('d-m-Y | h:i:s a')}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="card-footer card_footer_expode">
                <a href="{{url('dashboard/appointment/print/'.$data->slug)}}" class="btn btn-secondary waves-effect btnPrint">PRINT</a>
            </div>
        </div>
    </div>
</div>
@endsection
