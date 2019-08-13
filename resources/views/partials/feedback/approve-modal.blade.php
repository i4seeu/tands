<div class="modal fade" role="dialog" id="approveModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Approve Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">Are you sure you want to approve the selected entry?</div>
      <div class="modal-footer">
          {!! Form::open(['method' => 'post', 'id' => 'approveForm']) !!}
              {!! Form::button('Cancel', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
              {!! Form::submit('Proceed Approve', ['class' => 'btn btn-success', 'id' => 'approve-btn']) !!}
          {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
