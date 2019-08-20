<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubsistenceRequisition extends Model
{
  protected $guarded = ['id'];
  public function user()
  {
    return $this->belongsTo('App\User');
  }
  public function requisitionProcessings()
  {

      return $this->hasMany('App\RequisitionProcessing','requisition_id');
  }
}
