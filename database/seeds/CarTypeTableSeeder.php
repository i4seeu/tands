<?php

use Illuminate\Database\Seeder;
use App\CarType;
class CarTypeTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
 public function run()
 {


   $type = new CarType();
   $type->name = 'Saloon';
   $type->save();

   $type2 = new CarType();
   $type2->name = 'Minibus';
   $type2->save();
 }
}
