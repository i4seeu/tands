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
            <th>Description</th>
            <th>Allowance Scale</th>
            <th>No of Days</th>
            <th>From</th>
            <th>To</th>
            <th>Current Stage</th>
          </tr>
      </thead>
      <tbody>
        @foreach($requisitions as $requisition)
          <tr>
            <td>{{$requisition->id }}</td>
            <td>{{$requisition->user->first_name }} {{$requisition->user->last_name }}</td>
            <td>{{$requisition->user->department->name }}</td>
            <td>{{$requisition->description }}</td>
            <td>{{$requisition->allowance_scale }}</td>
            <td>{{$requisition->no_days }}</td>
            <td>{{$requisition->from_date }}</td>
            <td>{{$requisition->to_date }}</td>
            @if($requisition->current_stage ==1)
            <td>Head of Department</td>
            @endif
            @if($requisition->current_stage ==2)
            <td>HR Officer</td>
            @endif
            @if($requisition->current_stage ==3)
            <td>Finance Officer</td>
            @endif
            @if($requisition->current_stage ==4)
            <td>Processed</td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
@endsection
