@extends('dashboard')
@section('title', 'Settings')
@section('content')

<!-- Page Inner -->
<div id="main-wrapper" class="content">
    <div class="row">
        {!! Form::open(['route' => 'departments.store', 'autocomplete' => 'off']) !!}
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header card-header-primary">
                      <h4 class="card-title">Create a Department</h4>
                  </div>
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  {!! Form::label('name', 'Name  ') !!}
                                  {!! Form::text('name', null, ['class' => 'form-control','required' => 'required']) !!}
                              </div>
                            </div>
                          <div class="col-md-12">
                              <br>
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                {!! Form::submit('Cancel', ['class' => 'btn btn-secondary', 'onclick' => 'window.history.back(); return false']) !!}
                          </div>
                      </div>
                 </div>
             </div>
        </div>
        {!! Form::close() !!}
    </div><!-- Row -->
</div><!-- Main Wrapper -->
@endsection
