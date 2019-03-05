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
        $roleAdmin = new Role();
        $roleAdmin->name = 'admin';
        $roleAdmin->description = 'a superuser';
        $roleAdmin->save();

        $rolePM = new Role();
        $rolePM->name = 'pm';
        $rolePM->description = 'a project manager';
        $rolePM->save();

        $roleUser = new Role();
        $roleUser->name = 'user';
        $roleUser->description = 'a normal user';
        $roleUser->save();
    }
}
