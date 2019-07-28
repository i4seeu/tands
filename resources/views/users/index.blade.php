@extends('dashboard')
@section('title', 'User Management')
@section('content')
<!-- Page Inner -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
       <div class="col-md-12">
           <div class="pull-right">
              <a href="{{route('users.create')}}" class="btn btn-primary"> New User</a>
           </div>
       </div>
    </div>
    <table id="table_id" class="display">
      <thead>
          <tr>
              <th>Username</th>
              <th>Full Name</th>
              <th>Email Address</th>
              <th>Department</th>
              <th>Role</th>
              <th></th>
          </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
              <td>{{$user->name }}</td>
              <td>{{$user->first_name }} {{$user->last_name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->department->name }}</td>
              <td>{{ $user->roles->first->name->name }}</td>
              <td class="right">
                  <a href="{{ route('users.edit', $user->id) }}"><button class="btn btn-sm btn-just-icon btn-secondary"><i class="fa fa-edit"></i></button></a>
                  <a href="{{ route('users.show', $user->id) }}"><button class="btn btn-sm btn-just-icon btn-secondary"><i class="fa fa-eye"></i></button></a>
                  {{-- //TODO: hide
                  <a href="{{ route('users.change_password', $user->id) }}"><button class="btn btn-sm btn-just-icon btn-secondary"><i class="fa fa-key"></i></button></a>
                  --}}
                  @if(auth()->user()->id)
                  <button class="btn btn-sm btn-just-icon btn-secondary" data-item="{{ route('users.destroy', $user->id) }}" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></button>
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
