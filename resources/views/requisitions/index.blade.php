@extends('dashboard')
@section('title', 'Transport Requisition')
@section('content')
<!-- Page Inner -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
       <div class="col-md-12">
           <div class="pull-right">
              <a href="{{route('requisitions.create')}}" class="btn btn-primary"> New Requisition</a>
           </div>
       </div>
    </div>
    <table id="table_id" class="display">
      <thead>
          <tr>
              <th>Phone Number</th>
              <th>Description</th>
              <th>Car Type</th>
              <th>No of Passengers</th>
              <th>Date Required</th>
              <th></th>
          </tr>
      </thead>
      <tbody>
        @foreach($requisitions as $requisition)
          <tr>
              <td>{{$requisition->contact_no }}</td>
              <td>{{$requisition->description }}</td>
              <td>{{$requisition->car_type_id }}</td>
              <td>{{$requisition->no_passengers }}</td>
              <td>{{$requisition->date_required }}</td>
              <td class="right">
                  <a href="#"><button class="btn btn-sm btn-just-icon btn-secondary"><i class="fa fa-edit"></i></button></a>
                  <a href="#"><button class="btn btn-sm btn-just-icon btn-secondary"><i class="fa fa-eye"></i></button></a>
                  {{-- //TODO: hide
                  <a href="#"><button class="btn btn-sm btn-just-icon btn-secondary"><i class="fa fa-key"></i></button></a>
                  --}}
                  @if(auth()->user()->id)
                  <button class="btn btn-sm btn-just-icon btn-secondary" data-item="#" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></button>
                  @endif
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
@include('partials.feedback.delete-modal')
@endsection
