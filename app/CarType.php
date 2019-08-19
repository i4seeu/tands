<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
    protected $guarded = ['id'];
   public function transportRequisition()
   {

       return $this->hasOne('App\TransportRequisition');
   }
}
