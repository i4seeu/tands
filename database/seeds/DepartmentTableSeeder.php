<?php

use Illuminate\Database\Seeder;
use App\Department;
class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $department = new Department();
      $department->name = 'ICT';
      $department->save();
      $department = new Department();
      $department->name = 'Administration';
      $department->save();
      $department = new Department();
      $department->name = 'Finance';
      $department->save();
      $department = new Department();
      $department->name = 'Medicine';
      $department->save();
    }
}
