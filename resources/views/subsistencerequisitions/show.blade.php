@extends('dashboard')
@section('title', 'User Profile')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-profile">
          <div class="">
            <a href="#pablo">
               <h3>Requisition Approval Trail</h3>
            </a>
          </div>
          <div class="card-body">
                @foreach($requisition->requisitionProcessings as $process)
                   <div class="row">

                      <div class="col-md-12">
                          {{$process->user->roles->first()->name}} <br>
                          <b>{{$process->user->first_name}} {{$process->user->last_name}}</b><br>
                          <em>{{$process->action}}</em><br>
                          {{$process->created_at}} <br>
                          " {{$process->comment}} " <br>
                          &darr;
                          <hr>
                      </div>
                      
                   </div>
                @endforeach
          </div>

        </div>
      </div>
    </div>
  </div>
  @include('partials.feedback.delete-modal')
  @endsection
