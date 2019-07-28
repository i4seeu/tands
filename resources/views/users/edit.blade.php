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
            <h4 class="card-title">Update User</h4>
            <p class="card-category">Complete User's Details</p>
          </div>
          <div class="card-body">

            {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id], 'autocomplete' => 'off']) !!}
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
                      {!! Form::label('department_id', 'Department',['class' => 'bmd-label-floating']) !!}
                      {!! Form::select('department_id',$departments,null, ['class' => 'form-control','required' => 'required', 'placeholder' => ' - Please select - ']) !!}
                  </div>
                </div>
              </div>
              <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('role_id', 'Role',['class' => 'bmd-label-floating']) !!}
                      {!! Form::select('role_id',$roles,$user->roles->first->name->id, ['class' => 'form-control','required' => 'required', 'placeholder' => ' - Please select - ']) !!}
                  </div>
                </div>
              </div>

              {!! Form::submit('Update', ['class' => 'btn btn-primary pull-right']) !!}
              {!! Form::submit('Cancel', ['class' => 'btn btn-secondary', 'onclick' => 'window.history.back(); return false']) !!}
              <div class="clearfix"></div>
              {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
