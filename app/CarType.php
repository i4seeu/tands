<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
    //
   public function transportRequisition()
   {
      
       return $this->hasOne('App\TransportRequisition');
   }
}
