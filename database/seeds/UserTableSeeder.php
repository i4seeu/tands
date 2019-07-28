<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin = Role::where('name', 'System Administrator')->first();
      $role_guest  = Role::where('name', 'Member')->first();

      $admin = new User();
      $admin->name = 'sysadmin';
      $admin->first_name ='System';
      $admin->last_name = 'Administrator';
      $admin->email = 'admin@tands.mw';
      $admin->password = bcrypt('password');
      $admin->department_id = '1';
      $admin->save();
      $admin->roles()->attach($role_admin);

      $guest = new User();
      $guest->name = 'ptembo';
      $guest->first_name ='Peter';
      $guest->last_name = 'Tembo';
      $guest->email = 'member@tands.mw';
      $guest->password = bcrypt('password');
      $guest->department_id = '4';
      $guest->save();
      $guest->roles()->attach($role_guest);
    }
}
