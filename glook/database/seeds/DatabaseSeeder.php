<?php
// use Glook\Database\Seeds;  

// use Glook\Database\Seeds\RoleTableSeeder;
// use Glook\Database\Seeds\DatabaseSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        // $this->call(UserTableSeeder::class);
    }
}
