@extends('dashboard')
@section('title', 'Transport Requisition')
@section('content')
<!-- Page Inner -->
<div class="content">
  <div class="container-fluid">
    <div class="row">

    </div>
    <table id="table_id" class="display">
      <thead>
          <tr>
              <th>Requisition Number</th>
              <th>Employee</th>
              <th>Department</th>
              <th>Phone Number</th>
              <th>Description</th>
              <th>Car Type</th>
              <th>No of Passengers</th>
              <th>Date Required</th>
              <th>Return Date</th>
              <th></th>
          </tr>
      </thead>
      <tbody>
        @foreach($requisitions as $requisition)
          <tr>
              <td>{{$requisition->id }}</td>
              <td>{{$requisition->user->first_name }} {{$requisition->user->last_name }}</td>
              <td>{{$requisition->user->department->name }}</td>
              <td>{{$requisition->contact_no }}</td>
              <td>{{$requisition->description }}</td>
              <td>{{$requisition->carType->name }}</td>
              <td>{{$requisition->no_passengers }}</td>
              <td>{{$requisition->date_required }}</td>
              <td>{{$requisition->time_back }}</td>
              <td class="right">
                  <a href="#"><button class="btn btn-sm btn-just-icon btn-secondary" data-item="{{ route('requisitions.approve', $requisition->id) }}" data-toggle="modal" data-target="#approveModal"><i class="fa fa-check"></i></button></a>
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
@include('partials.feedback.approve-modal')
@endsection
