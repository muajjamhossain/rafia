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
        <form class="form-horizontal" method="post" action="{{url('dashboard/doctor/update')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Update Doctor Information</h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{url('dashboard/doctor')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Doctor</a>
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
                             <strong>Success!</strong> Doctor information updated successfully.
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
                <div class="form-group row custom_form_group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Name:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="hidden" name="user" value="{{$data->username}}">
                      <input type="hidden" name="id" value="{{$data->id}}">
                      <input type="text" class="form-control" name="name" value="{{$data->name}}">
                      @if ($errors->has('name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Phone:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="phone" value="{{$data->phone}}">
                      @if ($errors->has('phone'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('phone') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Username:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="username" value="{{$data->username}}">
                      @if ($errors->has('username'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('username') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Email:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="email" class="form-control" name="email" value="{{$data->email}}">
                      @if ($errors->has('email'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('degree') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Degree:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="degree" value="{{$data->degree}}">
                      @if ($errors->has('degree'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('degree') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('specialties') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Specialties:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <select class="form-control" name="specialties">
                            <option value="">Select Specialties</option>
                            @foreach($allSpeciality as $Speciality)
                            <option value="{{$Speciality->speciality_id}}" @if($data->specialties==$Speciality->speciality_id) selected @endif  >{{$Speciality->speciality_name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('specialties'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('specialties') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('branch') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Branch:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="branch" value="{{$data->branch}}">
                      @if ($errors->has('branch'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('branch') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('practice_days') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Practice Days:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="practice_days" value="{{$data->practice_days}}">
                      @if ($errors->has('practice_days'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('practice_days') }}</strong>
                          </span>
                      @endif
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
                    <div class="col-md-2">
                        @if($data->photo!='')
                            <img class="table_image_100" src="{{asset('uploads/doctors/'.$data->photo)}}" alt="photo"/>
                        @else
                            <img class="table_image_100" src="{{asset('uploads')}}/avatar-black.png" alt="photo"/>
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
