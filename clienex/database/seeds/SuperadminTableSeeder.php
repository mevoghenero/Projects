<?php


use App\Admin;
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
            '_id'        => '517c43667db388101e00000f',
            'first_name' => 'clienex',
            'last_name'  => 'app',
            'email' 	 => 'clienex@gmail.com',
            'phone_no'	 => '+2348100062631',
            'status' 	 => 1,
            'password' 	 => bcrypt('password'),
            'role_ids'   => ['517c43667db388101e00000f']

        ]);
    }
}
