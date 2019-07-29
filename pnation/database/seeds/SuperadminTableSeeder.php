<?php

use App\User;
use Illuminate\Database\Seeder;

class SuperadminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'first_name' => 'pnation',
            'last_name'  => 'app',
            'email' 	 => 'pnation@gmail.com',
            'phone'	     => '+2349032728139',
            'state' 	 => 'akwa ibom',
            'city'       => 'uyo',
            'address'    => 'ibb avenue',
            'password' 	 => bcrypt('password'),
            'role'      => 'admin',

        ]);

    }
}
