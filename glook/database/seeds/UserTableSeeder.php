<?php
// use Glook\Database\Seeds;
use Glook\Modules\Account\Models\User;

use Illuminate\Database\Seeder;
// use Illuminate\Support\Carbon;
use Glook\Modules\BaseRepository;


class UserTableSeeder extends Seeder 
{
    private $baseRepository;

   public function __construct(BaseRepository $baseRepository)
   {
        $this->baseRepository = $baseRepository;
   }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // $date = Carbon::now();

        User::create([
            // [ "id"=>$this->baseRepository->generateUuid(), 'name' => 'Super_admin', 'display_name' => 'Superadmin',  'created_at' =>$date, 'updated_at' =>$date],

            // [ "id"=>$this->baseRepository->generateUuid(), 'name' => 'Vendor', 'display_name' => 'Vendor',  'created_at' =>$date, 'updated_at' =>$date], 

            // [ "id"=>$this->baseRepository->generateUuid(), 'name' => 'Manager',  'display_name' => 'Manager',  'created_at' =>$date, 'updated_at' =>$date],

            // [ "id"=>$this->baseRepository->generateUuid(), 'name' => 'Employee', 'display_name' => 'Employee',  'created_at' =>$date, 'updated_at' =>$date], 

        "id"=>$this->baseRepository->generateUuid(), 'first_name' => 'Jotham',  'last_name' => 'Ntekim', 'phone' =>'09032738139', 'email' =>'jothamweb@gmail.com', 'password'=>'DONJEA7n', 'role_id'=>'b648d97c-fff5-4996-9e02-ef5dc5c2f2b4'         
        ]);
    }
}