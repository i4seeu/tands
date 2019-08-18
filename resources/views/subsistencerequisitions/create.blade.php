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
            <h4 class="card-title">New Subsistence Requisition</h4>
            <p class="card-category">Complete Requisition Details</p>
          </div>
          <div class="card-body">
            {!! Form::open(['route' => 'subsistencerequisitions.store', 'autocomplete' => 'off']) !!}
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      {!! Form::label('description', 'Description',['class' => 'bmd-label-floating']) !!}
                      {!! Form::textarea('description', null, ['class' => 'form-control','required' => 'required']) !!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('no_days', 'Number of Days',['class' => 'bmd-label-floating']) !!}
                      {!! Form::text('no_days', null, ['class' => 'form-control','required' => 'required']) !!}
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('allowance_scale', 'Allowance Scale',['class' => 'bmd-label-floating']) !!}
                      {!! Form::text('allowance_scale', null, ['class' => 'form-control','required' => 'required']) !!}
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('from_date', 'From',['class' => 'bmd-label-floating']) !!}
                      {!! Form::date('from_date', null, ['class' => 'form-control','required' => 'required']) !!}
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('to_date', 'To',['class' => 'bmd-label-floating']) !!}
                      {!! Form::date('to_date', null, ['class' => 'form-control','required' => 'required']) !!}
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
