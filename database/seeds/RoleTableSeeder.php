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
 }
}
