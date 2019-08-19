@extends('dashboard')
@section('title', 'Settings')
@section('content')
<!-- Page Inner -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Speakers -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <a href="{{route('departments.index')}}">
                    <div class="card card-stats" style="width:100%;">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">people_outline</i>
                            </div>
                            <h4 class="card-title">Departments</h4>
                        </div>
                        <div class="card-footer">
                            <i class="material-icons">people_outline</i>Create, View and Edit
                        </div>
                    </div>
                </a>
            </div>
            <!-- Venues -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <a href="{{route('cartypes.index')}}">
                    <div class="card card-stats" style=";">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">directions_car</i>
                            </div>
                            <h4 class="card-title">Car Types</h4>
                        </div>
                        <div class="card-footer">
                            <i class="material-icons">directions_car
                            </i> Create, View and Edit
                        </div>
                    </div>
                </a>
            </div>

        </div> <!-- row -->
    </div>
</div><!-- Main Wrapper -->
@endsection
