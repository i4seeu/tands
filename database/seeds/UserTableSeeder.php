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
      $admin->name = 'System Administrator';
      $admin->email = 'admin@rdc.mw';
      $admin->password = bcrypt('password');
      $admin->save();
      $admin->roles()->attach($role_admin);
      $guest = new User();
      $guest->name = 'Peter Tembo';
      $guest->email = 'member@rdc.mw';
      $guest->password = bcrypt('password');
      $guest->save();
      $guest->roles()->attach($role_guest);
    }
}
