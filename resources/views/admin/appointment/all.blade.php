@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Appointment</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Appointment</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> All Appointment</h3>
                    </div>
                    <div class="text-right col-md-4">
                        <a href="{{url('dashboard/appointment')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> Demo</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        @if(Session::has('success_soft'))
                          <div class="alert alert-success alertsuccess" role="alert">
                             <strong>Successfully!</strong> delete Appointment information.
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
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="alltableinfo" class="table mb-0 table-bordered custom_table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>patient Status</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Speciality</th>
                                        <th>Doctor</th>
                                        <th>Description</th>
                                        <th>Create Time</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all as $data)
                                    <tr>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->age}}</td>
                                        <td>{{$data->gender}}</td>
                                        <td>{{$data->patient_status}}</td>
                                        <td>{{$data->schedule_date}}</td>
                                        <td>{{$data->schedule_time}}</td>
                                        <td>{{$data->speciality_info->speciality_name ?? ""}}</td>
                                        <td>{{$data->doctorInfo->name ?? ""}}</td>
                                        <td>{{Str::words($data->description,5)}}</td>
                                        <td>{{$data->created_at->format('d-m-Y | h:i:s a')}}</td>
                                        <td>
                                            <a href="{{url('dashboard/appointment/view/'.$data->slug)}}" title="view"><i class="fa fa-plus-square fa-lg view_icon"></i></a>
                                            <a href="#" title="delete" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{$data->id}}"><i class="fa fa-trash fa-lg delete_icon"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer card_footer_expode">
                <a href="{{url('dashboard/appointment/allprint')}}" class="btn btn-secondary waves-effect btnPrint">PRINT</a>
                <a href="{{url('dashboard/appointment/excel')}}" class="btn btn-warning waves-effect">EXCEL</a>
                <a href="{{url('dashboard/appointment/pdf')}}" class="btn btn-success waves-effect">PDF</a>
            </div>
        </div>
    </div>
</div>
<!--Delete Modal Information-->
<div id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog">
        <div class="p-0 modal-content b-0">
            <form method="post" action="{{url('dashboard/appointment/softdelete')}}">
              @csrf
              <div class="mb-0 card">
                <div class="card-header">
                    <h3 class="float-left card-title"><i class="fa fa-gg-circle"></i> Confirm Message</h3>
                </div>
                <div class="card-body modal_card">
                  Are you sure you want to delete?
                  <input type="hidden" id="modal_id" name="modal_id">
                </div>
                <div class="text-right card-footer">
                    <button type="submit" class="btn btn-sm btn-dark waves-effect">Confirm</button>
                    <button type="button" class="btn btn-sm btn-danger waves-effect" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection
