@extends('dashboard')
@section('title', 'User Profile')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="#pablo">
              <img class="img" src="{{asset('img/faces/marc.jpg')}}" />
            </a>
          </div>
          <div class="card-body">
            <a href="{{ route('users.edit', $user->id) }}"><button class="btn btn-secondary"><i class="fa fa-edit"></i></button></a>
            @if(auth()->user()->id)
            <button class="btn btn-secondary" data-item="{{ route('users.destroy', $user->id) }}" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></button>
            @endif
            <h6 class="card-category text-gray">{{$user->first_name}}  {{$user->last_name}}</h6>
            <p class="card-description">
              <b>Email :</b> {{$user->email}} |   <b>Department :</b> {{$user->department->name}}
            </p>
            <p class="card-description">
              <b>Role :</b> {{$user->roles->first->name->name}} 

            </p>
            <button class="btn btn-primary col-md-1" onclick = window.history.back();>Back</button>

          </div>

        </div>
      </div>
    </div>
  </div>
  @include('partials.feedback.delete-modal')
  @endsection
