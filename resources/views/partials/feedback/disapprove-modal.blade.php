<div class="modal fade" role="dialog" id="disapproveModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">Are you sure you want to return the selected entry?</div>
      <div class="modal-footer">
          {!! Form::open(['method' => 'post', 'id' => 'disapproveForm']) !!}
              <div class="row">

                  <div class="form-group">
                      {!! Form::label('comment', 'Comment',['class' => 'bmd-label-floating']) !!}
                      {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
                  </div>

              </div>
              {!! Form::button('Cancel', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
              {!! Form::submit('Proceed', ['class' => 'btn btn-success', 'id' => 'disapprove-btn']) !!}
          {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
