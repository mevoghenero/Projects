<?php 

namespace App\Repositories\Student;

interface StudentRepositoryInterface
{
	public function getAll();

	public function getById($id);

	public function studentCreate(array $attributes);

	public function studentUpdate($id, array $attributes);
	
	public function deleteById($id);


}