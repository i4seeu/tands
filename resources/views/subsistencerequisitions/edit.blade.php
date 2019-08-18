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
            <h4 class="card-title">Edit Requisition</h4>
            <p class="card-category">Complete Requisition Details</p>
          </div>
          <div class="card-body">
            {!! Form::model($requisition, ['method' => 'PATCH', 'action' => ['RequisitionController@update', $requisition->id], 'autocomplete' => 'off']) !!}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('contact_no', 'Phone Number',['class' => 'bmd-label-floating']) !!}
                    {!! Form::text('contact_no', null, ['class' => 'form-control','required' => 'required']) !!}
                </div>
              </div>
            </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      {!! Form::label('descriptio', 'Reason of travel',['class' => 'bmd-label-floating']) !!}
                      {!! Form::text('description', null, ['class' => 'form-control','required' => 'required']) !!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    {!! Form::label('car_type_id', 'Car Type',['class' => 'bmd-label-floating']) !!}
                    {!! Form::select('car_type_id',$car_types,null, ['class' => 'form-control','required' => 'required', 'placeholder' => ' - Please select - ']) !!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('no_passengers', 'Number of Passengers',['class' => 'bmd-label-floating']) !!}
                      {!! Form::text('no_passengers', null, ['class' => 'form-control','required' => 'required']) !!}
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('date_required', 'Date Required',['class' => 'bmd-label-floating']) !!}
                      {!! Form::date('date_required', null, ['class' => 'form-control','required' => 'required']) !!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('time_out', 'Time Out',['class' => 'bmd-label-floating']) !!}
                      {!! Form::time('time_out', null, ['class' => 'form-control','required' => 'required']) !!}
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      {!! Form::label('time_back', 'Time Back',['class' => 'bmd-label-floating']) !!}
                      {!! Form::date('time_back', null, ['class' => 'form-control','required' => 'required']) !!}
                  </div>
                </div>
              </div>
              {!! Form::submit('Update', ['class' => 'btn btn-primary pull-right']) !!}
              <div class="clearfix"></div>
              {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
