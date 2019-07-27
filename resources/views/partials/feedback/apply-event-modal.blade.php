<div class="modal fade" role="dialog" id="applyEventModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Event Register Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {!! Form::open(['method' => 'post', 'route' => ['event_application.attend', $event->id], 'id' => 'applyEventForm']) !!}
        <div class="modal-body">
          Are you sure you want to register this event?<br/>
          <strong class="text-danger js-present">Please submit an abstract after registration.</strong>

          <div class="row mt-3">
            <div class="col-md-12">
              <div class="form-group">
                  {!! Form::label('participant_category_id', 'Select your category', ['class' => 'bmd-label-floating']) !!}
                  {!! Form::select('participant_category_id', $categories, (empty($applicant) ? null : $applicant->participant_category_id), ['class' => 'form-control','required' => 'required', 'placeholder' => ' - Please select - ']) !!}
              </div>
            </div>
          </div>

          @if( difference_dates($event->start_date, $event->end_date) > 0)
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                  {!! Form::label('number_of_days', 'Days of attending the event  ') !!}
                  {!! Form::select('number_of_days', $select_number_of_days, null, ['class'=>'form-control', 'required' => 'required', 'placeholder' => ' - Please select - ']) !!}
              </div>
            </div>
          </div>
          @else
            {!! Form::hidden('number_of_days', 1) !!}
          @endif
          {!! Form::hidden('register_type', '') !!}
          
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                  {!! Form::label('science_cafe', 'Are you attending the science cafe?', ['class' => 'bmd-label-floating']) !!}
                  {!! Form::select('science_cafe', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control','required' => 'required', 'placeholder' => ' - Please select - ']) !!}
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
            {!! Form::button('Cancel', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
            {!! Form::submit('Proceed Register', ['class' => 'btn btn-danger', 'id' => 'delete-btn']) !!}
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
