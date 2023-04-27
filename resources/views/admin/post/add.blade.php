@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Blog Category</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Category</a></li>
            <li class="active">Add</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="post" action="{{url('dashboard/blog/post/submit')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Add Blog Post</h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{url('dashboard/blog/post')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Blog Post</a>
                      </div>
                      <div class="clearfix"></div>
                  </div>
              </div>
              <div class="card-body card_form">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        @if(Session::has('success'))
                          <div class="alert alert-success alertsuccess" role="alert">
                             <strong>Successfully!</strong> upload blog post.
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
                <div class="form-group row custom_form_group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Post Title:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="title" value="{{old('title')}}">
                      @if ($errors->has('title'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('title') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('details') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Post Details:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <textarea class="summernote" name="details">{{old('details')}}</textarea>
                      @if ($errors->has('details'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('details') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('category') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Post Category:<span class="req_star">*</span></label>
                    <div class="col-sm-4">
                      @php
                          $allCate=App\Models\BlogCategory::where('bcate_status',1)->orderBy('bcate_name','ASC')->get();
                      @endphp
                      <div id="cateOutput"></div>
                      <select multiple data-placeholder="Choose Post Category ..." name="cate[]" class="chosen-select form-control">
                        @foreach($allCate as $cate)
                          <option value="{{$cate->bcate_id}}">{{$cate->bcate_name}}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('details'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('details') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('details') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Post Tag:<span class="req_star">*</span></label>
                    <div class="col-sm-4">
                        @php
                            $allTag=App\Models\Tag::where('tag_status',1)->get();
                        @endphp
                        <div id="tagOutput"></div>
                        <select multiple data-placeholder="Choose Tag ..." name="tag[]" class="chosen-select form-control">
                          @foreach($allTag as $tag)
                            <option value="{{$tag->tag_id}}">{{$tag->tag_name}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('pic') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Feature Image:<span class="req_star">*</span></label>
                    <div class="col-sm-4">
                      <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file btnu_browse">
                                  Browse… <input type="file" name="pic" id="imgInp">
                              </span>
                          </span>
                          <input type="text" class="form-control" readonly>
                      </div>
                      @if ($errors->has('pic'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('pic') }}</strong>
                          </span>
                      @endif
                      <img id='img-upload'/>
                    </div>
                </div>
              </div>
              <div class="card-footer card_footer_button text-center">
                  <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
              </div>
          </div>
        </form>
    </div>
</div>
@endsection
