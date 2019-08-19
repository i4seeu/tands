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

            <th></th>
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
              <td class="right">
                  <a href="#"><button class="btn btn-sm btn-just-icon btn-secondary" data-item="{{ route('subsistencerequisitions.approve', $requisition->id) }}" data-toggle="modal" data-target="#approveModal"><i class="fa fa-check"></i></button></a>
              </td>
              @if (Auth::user()->hasRole("Head of Department"))
                <td class="right">
                <a href="{{ route('subsistencerequisitions.edit', $requisition->id) }}"><button class="btn btn-sm btn-just-icon btn-secondary"><i class="fa fa-edit"></i></button></a>
                </td>
              @endif
              @if (!Auth::user()->hasRole("Head of Department"))
              <td class="right">
                  <a href="#"><button class="btn btn-sm btn-just-icon btn-secondary" data-item="{{ route('subsistencerequisitions.disapprove', $requisition->id) }}" data-toggle="modal" data-target="#disapproveModal"><i class="fa fa-close"></i></button></a>
              </td>
              @endif
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
@include('partials.feedback.approve-modal')
@include('partials.feedback.disapprove-modal')
@endsection
