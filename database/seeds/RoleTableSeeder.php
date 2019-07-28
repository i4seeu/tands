<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
 public function run()
 {
   $role_admin = new Role();
   $role_admin->name = 'System Administrator';
   $role_admin->save();
   $role_member = new Role();
   $role_member->name = 'Member';
   $role_member->save();

   $hod = new Role();
   $hod->name = 'Head of Department';
   $hod->save();

   $role_fo = new Role();
   $role_fo->name = 'Finance Officer';
   $role_fo->save();

   $role_hr = new Role();
   $role_hr->name = 'HR Officer';
   $role_hr->save();

   $role_tp = new Role();
   $role_tp->name = 'Transport Officer';
   $role_tp->save();
 }
}
