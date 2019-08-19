@extends('dashboard')
@section('title', 'Settings')
@section('content')
<div id="main-wrapper" class="content">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <button class="btn btn-secondary btn-sm"><a href="{{route('settings')}}"><i class="material-icons">arrow_back</i>Back</a></button>
                <h4 class="panel-title">Car Type</h4>
                <div class="pull-right">
                    <a href="{{ route('cartypes.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> New Car Type</a>
                </div>
            </div>
            <div class="panel-body">
               <div class="table-responsive">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($cartypes as $cartype)
                        <tr>
                            <td>{{ $cartype->name }}</td>
                              <td class="right">
                                <a href="{{ route('cartypes.edit', $cartype->id) }}"><button class="btn btn-secondary btn-sm btn-just-icon"><i class="fa fa-edit"></i></button></a>
                                @if(auth()->user()->id)
                                <button class="btn btn-secondary btn-sm btn-just-icon" data-item="{{ route('cartypes.destroy', $cartype->id) }}" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></button>
                                @endif
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                {{$cartypes->links()}}
                </div>
            </div>
        </div>
    </div>
</div><!-- Row -->
</div><!-- Main Wrapper -->
@include('partials.feedback.delete-modal')
@endsection
