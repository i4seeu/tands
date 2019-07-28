<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportRequisition extends Model
{
    protected $fillable = [
      'contact_no','description','car_type_id','no_passengers','date_required',
      'time_out','time_back','user_id',
    ];
}
