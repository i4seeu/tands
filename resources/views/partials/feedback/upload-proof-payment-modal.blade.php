<div class="modal fade" role="dialog" id="UploadProofPaymentModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Upload your proof of payment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {!! Form::open(['method' => 'post', 'route' => ['event_application.upload_proof_payment', $event->id], 'id' => 'UploadProofPaymentForm', 'files'=>'true']) !!}
        <div class="modal-body">
          Select the file to upload<br/>

          <div class="row mt-3">
            <div class="col-12">
              <div class="input-group">
                {{-- Can not use form helper because style not applied --}}
                <input type="file" name="proof_of_payment" style="display: none;">
                <input type="text" name="selected_file" class="form-control" readonly placeholder="select file..." />

                <span class="input-group-btn">
                  <button type="button" class="btn btn-sm btn-info js-file-select">Browse</button>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            {!! Form::button('Cancel', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
            {!! Form::submit('Upload File', ['class' => 'btn btn-danger', 'id' => 'delete-btn']) !!}
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
