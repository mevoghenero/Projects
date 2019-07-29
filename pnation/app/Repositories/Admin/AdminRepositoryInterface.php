<?php 

namespace App\Repositories\Admin;

interface AdminRepositoryInterface
{
    public function getAll();
    
    public function getById($id);

    // public function listAdmin(array $attributes);

	public function createAdmin(array $attributes);

    public function updateAdmin(array $attributes, $id);
    
    public function deleteAdmin($id);


}