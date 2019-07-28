@extends('dashboard')
@section('title', 'User Management')
@section('content')
<div class="content">
  <div class="container-fluid">
    @if ($errors->any())
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
        {{ $error }}</br>
      @endforeach
    </div>
    @endif

    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Add User</h4>
            <p class="card-category">Complete User's Details</p>
          </div>
          <div class="card-body">
            {!! Form::open(['route' => 'users.store', 'autocomplete' => 'off']) !!}
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('name', 'Username',['class' => 'bmd-label-floating']) !!}
                      {!! Form::text('name', null, ['class' => 'form-control','required' => 'required']) !!}
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('email', 'Email',['class' => 'bmd-label-floating']) !!}
                      {!! Form::email('email', null, ['class' => 'form-control','required' => 'required']) !!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('password', 'Password',['class' => 'bmd-label-floating']) !!}
                      {!! Form::password('password', ['class' => 'form-control','required' => 'required']) !!}
                  </div>

                </div>

                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('password', 'Confirm Password',['class' => 'bmd-label-floating']) !!}
                      {!! Form::password('password_confirmation', ['class' => 'form-control','required' => 'required']) !!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('first_name', 'First Name',['class' => 'bmd-label-floating']) !!}
                      {!! Form::text('first_name', null, ['class' => 'form-control','required' => 'required']) !!}
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('last_name', 'Last Name',['class' => 'bmd-label-floating']) !!}
                      {!! Form::text('last_name', null, ['class' => 'form-control','required' => 'required']) !!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('title', 'Title',['class' => 'bmd-label-floating']) !!}
                      {!! Form::select('title', ['Mr' => 'Mr', 'Mrs' => 'Mrs','Ms' => 'Ms', 'Dr' => 'Dr','Prof' => 'Prof', 'Other' => 'Other'], null, ['class'=>'form-control','required' => 'required', 'placeholder' => ' - Please select - ']) !!}
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('gender', 'Gender',['class' => 'bmd-label-floating']) !!}
                      {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, ['class'=>'form-control','required' => 'required', 'placeholder' => ' - Please select - ']) !!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('institution', 'Institution',['class' => 'bmd-label-floating']) !!}
                      {!! Form::text('institution', null, ['class' => 'form-control','required' => 'required']) !!}
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('position', 'Position',['class' => 'bmd-label-floating']) !!}
                      {!! Form::text('position', null, ['class' => 'form-control','required' => 'required']) !!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('speciality', 'Speciality',['class' => 'bmd-label-floating']) !!}
                      {!! Form::text('speciality', null, ['class' => 'form-control','required' => 'required']) !!}
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('phone_number', 'Phone Number',['class' => 'bmd-label-floating']) !!}
                      {!! Form::text('phone_number', null, ['class' => 'form-control','required' => 'required']) !!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      {!! Form::label('address', 'Address',['class' => 'bmd-label-floating']) !!}
                      {!! Form::text('address', null, ['class' => 'form-control','required' => 'required']) !!}
                  </div>
                </div>
              </div>
              <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('role_id', 'Role',['class' => 'bmd-label-floating']) !!}
                      {!! Form::select('role_id',$roles,null, ['class' => 'form-control','required' => 'required', 'placeholder' => ' - Please select - ']) !!}
                  </div>
                </div>
              </div>

              {!! Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) !!}
              <div class="clearfix"></div>
              {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
