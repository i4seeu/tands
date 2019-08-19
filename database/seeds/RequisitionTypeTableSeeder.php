<?php

use Illuminate\Database\Seeder;
use App\RequisitionType;
class RequisitionTypeTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
 public function run()
 {


   $type = new RequisitionType();
   $type->name = 'Transport';
   $type->save();

   $type2 = new RequisitionType();
   $type2->name = 'Subsistence';
   $type2->save();
 }
}
