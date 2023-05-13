@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Important</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Important</a></li>
            <li class="active">Notice</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="post" action="{{ @$data ? url('dashboard/notice/update/'.@$data->notice_id): url('dashboard/notice/submit')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Notice Information</h3>
                      </div>
                      <div class="text-right col-md-4">
                          <a href="{{url('dashboard/notice')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Notice</a>
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
                             <strong>Successfully!</strong> update Notice information.
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
                <div class="form-group row custom_form_group{{ $errors->has('ftitle') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Title (First):<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="ftitle" value="{{@$data? $data->notice_title_f_word : old('ftitle')}}">
                      @if ($errors->has('ftitle'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('ftitle') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('ltitle') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Title (First):<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="ltitle" value="{{@$data? $data->notice_title_l_word : old('ltitle')}}">
                      @if ($errors->has('ltitle'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('ltitle') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Subtitle:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="subtitle" value="{{@$data? $data->notice_subtitle : old('subtitle')}}">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Photo:</label>
                    <div class="col-sm-4">
                      <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file btnu_browse">
                                  Browse… <input type="file" name="pic" id="imgInp">
                              </span>
                          </span>
                          <input type="text" class="form-control" readonly>
                      </div>
                      <img id='img-upload'/>
                    </div>
                    <div class="col-sm-2">
                        <img class="img-thumbnail" src="{{ @$data? asset('uploads/notice/'.$data->notice_img) : "" }}"/>
                    </div>
                </div>

              </div>
              <div class="text-center card-footer card_footer_button">
                  <button type="submit" class="btn btn-primary waves-effect">{{ @$data? "UPDATE" : "INSERt" }}</button>
              </div>
          </div>
        </form>
    </div>
</div>
@endsection
