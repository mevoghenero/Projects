<?php


// use App\Admin;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

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
            'id' =>$this->generateUuid(),
            'first_name' => 'Glook',
            'last_name'  => 'app',
            'email' 	 => 'glook@gmail.com',
            'status' 	 => 1,
            'password' 	 => bcrypt('password'),
            'role_id'   => ['1a7899f3-46bf-4602-b590-2d7a586b8df1']

        ]);
    }
}