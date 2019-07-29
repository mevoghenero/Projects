<?php

use Glook\Modules\Admin\Models\Role;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Glook\Modules\BaseRepository;


class RoleTableSeeder extends Seeder 
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
        $date = Carbon::now();

        Role::insert([
            [ "id"=>$this->baseRepository->generateUuid(), 'name' => 'Super_admin', 'display_name' => 'Superadmin',  'created_at' =>$date, 'updated_at' =>$date],

            [ "id"=>$this->baseRepository->generateUuid(), 'name' => 'Vendor', 'display_name' => 'Vendor',  'created_at' =>$date, 'updated_at' =>$date], 

            [ "id"=>$this->baseRepository->generateUuid(), 'name' => 'Manager',  'display_name' => 'Manager',  'created_at' =>$date, 'updated_at' =>$date],

            [ "id"=>$this->baseRepository->generateUuid(), 'name' => 'Employee', 'display_name' => 'Employee',  'created_at' =>$date, 'updated_at' =>$date], 

            [ "id"=>$this->baseRepository->generateUuid(), 'name' => 'User',  'display_name' => 'User', 'created_at' =>$date, 'updated_at' =>$date] 
        ]);
    }
}
