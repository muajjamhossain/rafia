@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Page Content</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Page</a></li>
            <li class="active">Content</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> All Page Content</h3>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{url('dashboard/page')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Page</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-7"></div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="alltableinfo" class="table table-bordered custom_table mb-0">
                                <thead>
                                    <tr>
                                        <th>Page Name</th>
                                        <th>Title</th>
                                        <th>Photo</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all as $data)
                                    <tr>
                                        <td>{{$data->page->page_name}}</td>
                                        <td>{{$data->pc_title}}</td>
                                        <td>
                                            @if($data->pc_photo!='')
                                                <img class="table_image_ban" src="{{asset('uploads/page-content/'.$data->pc_photo)}}" alt="photo"/>
                                            @else
                                                <img class="table_image_ban" src="{{asset('uploads')}}/no-image-big.jpg" alt="photo"/>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('dashboard/page/content/edit/'.$data->pc_slug)}}" title="edit"><i class="fa fa-pencil-square fa-lg edit_icon"></i></a>
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
@endsection
