@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Doctors</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Home</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> All Doctor Information</h3>
                    </div>
                    <div class="text-right col-md-4">
                        <a href="{{url('dashboard/doctor/add')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-plus-circle"></i> Add Doctor</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="alltableinfo" class="table mb-0 table-bordered custom_table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Degree</th>
                                        <th>specialties</th>
                                        <th>branch</th>
                                        <th>Photo</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all as $data)
                                    <tr>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->phone}}</td>
                                        <td>{{$data->username}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->degree}}</td>
                                        <td>{{$data->speciality_info->speciality_name}}</td>
                                        <td>{{$data->branch}}</td>
                                        <td>
                                            @if($data->photo!='')
                                                <img class="table_image_40" src="{{asset('uploads/doctors/'.$data->photo)}}" alt="user-photo"/>
                                            @else
                                                <img class="table_image_40" src="{{asset('uploads')}}/avatar-black.png" alt="user-photo"/>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('dashboard/doctor/view/'.$data->username)}}" title="view"><i class="fa fa-plus-square fa-lg view_icon"></i></a>
                                            <a href="{{url('dashboard/doctor/edit/'.$data->username)}}" title="edit"><i class="fa fa-pencil-square fa-lg edit_icon"></i></a>
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
                <a href="{{url('dashboard/doctor/allprint')}}" class="btn btn-secondary waves-effect btnPrint">PRINT</a>
                <a href="{{url('dashboard/doctor/excel')}}" class="btn btn-warning waves-effect">EXCEL</a>
                <a href="{{url('dashboard/doctor/pdf')}}" class="btn btn-success waves-effect">PDF</a>
            </div>
        </div>
    </div>
</div>
<!--Delete Modal Information-->
<div id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog">
        <div class="p-0 modal-content b-0">
            <form method="post" action="{{url('dashboard/doctor/softdelete')}}"/>
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
