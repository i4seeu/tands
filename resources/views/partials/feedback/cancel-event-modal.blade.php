<div class="modal fade" role="dialog" id="cancelEventModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cancel Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">Are you sure you want to cancel?</div>
      <div class="modal-footer">
          {!! Form::open(['method' => 'post', 'route' => ['event_application.cancel', $event->id], 'id' => 'cancelEventForm']) !!}
              {!! Form::submit('Proceed Cancel', ['class' => 'btn btn-danger', 'id' => 'cancel-btn']) !!}
          {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
