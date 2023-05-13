@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Important Notice</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Notice</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> All Notice Information</h3>
                    </div>
                    <div class="text-right col-md-4">
                        <a href="{{url('dashboard/notice/add')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-plus-circle"></i> Add notice</a>
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
                                        <th>F-Title</th>
                                        <th>L-Title</th>
                                        <th>Sub-Title</th>
                                        <th>Photo</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all as $data)
                                    <tr>
                                        <td>{{$data->notice_title_f_word}}</td>
                                        <td>{{$data->notice_title_l_word}}</td>
                                        <td>{{$data->notice_subtitle}}</td>
                                        <td>
                                            @if($data->notice_img!='')
                                                <img class="table_image_40" src="{{asset('uploads/notice/'.$data->notice_img)}}" alt="user-photo"/>
                                            @else
                                                <img class="table_image_40" src="{{asset('uploads')}}/avatar-black.png" alt="user-photo"/>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- <a href="{{url('dashboard/notice/view/'.$data->username)}}" title="view"><i class="fa fa-plus-square fa-lg view_icon"></i></a> --}}
                                            <a href="{{url('dashboard/notice/edit/'.$data->notice_id)}}" title="edit"><i class="fa fa-pencil-square fa-lg edit_icon"></i></a>
                                            <a href="#" title="delete" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{$data->notice_id}}"><i class="fa fa-trash fa-lg delete_icon"></i></a>
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
<!--Delete Modal Information-->
<div id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog">
        <div class="p-0 modal-content b-0">
            <form method="post" action="{{url('dashboard/notice/softdelete')}}"/>
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
