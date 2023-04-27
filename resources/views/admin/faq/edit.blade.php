@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">FAQ</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">FAQ</a></li>
            <li class="active">Edit</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="post" action="{{url('dashboard/faq/update')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Update FAQ Information</h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{url('dashboard/faq')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All FAQ</a>
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
                             <strong>Successfully!</strong> update faq information.
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
                <div class="form-group row custom_form_group{{ $errors->has('question') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Question:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="question" value="{{$data->faq_question}}">
                      <input type="hidden" name="id" value="{{$data->faq_id}}"/>
                      <input type="hidden" name="slug" value="{{$data->faq_slug}}"/>
                      @if ($errors->has('question'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('question') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Answer:</label>
                    <div class="col-sm-7">
                      <textarea class="form-control" name="answer" rows="3">{{$data->faq_answer}}</textarea>
                      @if ($errors->has('answer'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('answer') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
              </div>
              <div class="card-footer card_footer_button text-center">
                  <button type="submit" class="btn btn-primary waves-effect">UPDATE</button>
              </div>
          </div>
        </form>
    </div>
</div>
@endsection
