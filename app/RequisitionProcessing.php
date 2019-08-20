<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequisitionProcessing extends Model
{
    protected $guarded = ['id'];
    public function subsistenceRequisition()
    {
      return $this->belongsTo('App\SubsistenceRequisition');
    }
    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
