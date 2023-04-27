@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Blog Post</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Post</a></li>
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
                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> View Blog Post</h3>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{url('dashboard/blog/post')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Blog Post</a>
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
                                <td>Post Title</td>
                                <td>:</td>
                                <td>{{$data->post_title}}</td>
                            </tr>
                            <tr>
                                <td>Blog Details</td>
                                <td>:</td>
                                <td>{{$data->post_details}}</td>
                            </tr>
                            <tr>
                                <td>Post Category</td>
                                <td>:</td>
                                <td>
                                  @php
                                      $cate=$data->post_category;
                                      $allBlogCate=explode(',',$cate);
                                  @endphp
                                  @foreach($allBlogCate as $pcate)
                                      @php
                                      $category=App\BlogCategory::where('bcate_status',1)->where('bcate_id',$pcate)->firstOrFail();
                                      @endphp
                                      {{$category->bcate_name}},
                                  @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>Blog Details</td>
                                <td>:</td>
                                <td>
                                    @if($data->post_photo!='')
                                        <img class="table_image_200" src="{{asset('uploads/post/'.$data->post_photo)}}" alt="post"/>
                                    @else
                                        <img class="table_image_200" src="{{asset('uploads')}}/no-image-big.jpg" alt="post"/>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Create Time</td>
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
