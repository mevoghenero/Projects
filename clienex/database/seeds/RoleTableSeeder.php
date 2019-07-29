<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

           Role::create([
            '_id'  => '517c43667db388101e00000f',
            'name' => 'Superadmin',
            'description' => 'Manager', 
            'user_ids'  => ['517c43667db388101e00000f']
        ]);


      
   }
}
