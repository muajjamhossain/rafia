@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Team</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Team</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Recycle All Team Member</h3>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{url('dashboard/team')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Team Member</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        @if(Session::has('restore'))
                          <div class="alert alert-success alertsuccess" role="alert">
                             <strong>Successfully!</strong> restore team member information.
                          </div>
                        @endif
                        @if(Session::has('delete'))
                          <div class="alert alert-success alertsuccess" role="alert">
                             <strong>Successfully!</strong> permanently delete team member information.
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
                            <table id="alltableinfo" class="table table-bordered custom_table mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Details</th>
                                        <th>Photo</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $all=App\Team::where('team_status',0)->orderBy('team_id','DESC')->get();
                                    @endphp
                                    @foreach($all as $data)
                                    <tr>
                                        <td>{{$data->team_name}}</td>
                                        <td>{{$data->team_designation}}</td>
                                        <td>{{Str::words($data->team_details,5)}}</td>
                                        <td>
                                            @if($data->team_photo!='')
                                                <img class="table_image_50bl" src="{{asset('uploads/team/'.$data->team_photo)}}" alt="photo"/>
                                            @else
                                                <img class="table_image_50bl" src="{{asset('uploads')}}/no-image-big.jpg" alt="photo"/>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" title="restore" id="restore" data-toggle="modal" data-target="#restoreModal" data-id="{{$data->team_id}}"><i class="fa fa-refresh fa-lg restore_icon"></i></a>
                                            <a href="#" title="delete" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{$data->team_id}}"><i class="fa fa-trash fa-lg delete_icon"></i></a>
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
                <a href="#" class="btn btn-secondary waves-effect">PRINT</a>
                <a href="#" class="btn btn-warning waves-effect">EXCEL</a>
                <a href="#" class="btn btn-success waves-effect">PDF</a>
            </div>
        </div>
    </div>
</div>
<!--Restore Modal Information-->
<div id="restoreModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content p-0 b-0">
            <form method="post" action="{{url('dashboard/team/restore')}}"/>
              @csrf
              <div class="card mb-0">
                <div class="card-header">
                    <h3 class="card-title float-left"><i class="fa fa-gg-circle"></i> Confirm Message</h3>
                </div>
                <div class="card-body modal_card">
                  Are you sure you want to restore?
                  <input type="hidden" id="modal_id" name="modal_id">
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-sm btn-dark waves-effect">Confirm</button>
                    <button type="button" class="btn btn-sm btn-danger waves-effect" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
<!--Delete Modal Information-->
<div id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content p-0 b-0">
            <form method="post" action="{{url('dashboard/team/delete')}}"/>
              @csrf
              <div class="card mb-0">
                <div class="card-header">
                    <h3 class="card-title float-left"><i class="fa fa-gg-circle"></i> Confirm Message</h3>
                </div>
                <div class="card-body modal_card">
                  Are you sure you want to permanently delete?
                  <input type="hidden" id="modal_id" name="modal_id">
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-sm btn-dark waves-effect">Confirm</button>
                    <button type="button" class="btn btn-sm btn-danger waves-effect" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection
