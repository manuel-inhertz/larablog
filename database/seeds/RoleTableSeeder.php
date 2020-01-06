<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
  public function run()
  {
    $role_admin = new Role();
    $role_admin->name = 'admin';
    $role_admin->description = 'Admin Role';
    $role_admin->save();    
    
    $role_user = new Role();
    $role_user->name = 'User';
    $role_user->description = 'User Role';
    $role_user->save();
  }
}