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
              <th>Current Stage</th>
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
              @if($requisition->current_stage ==1)
              <td>Head of Department</td>
              @endif
              @if($requisition->current_stage ==2)
              <td>Transport Officer</td>
              @endif
              @if($requisition->current_stage ==3)
              <td>Processed</td>
              @endif
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
@endsection
