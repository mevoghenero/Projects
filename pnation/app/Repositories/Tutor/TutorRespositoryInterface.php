<?php 

namespace App\Respositories\Tutor;

interface TutorRespositoryInterface
{
	public function tutorCreate(array $attributes);
	public function cvInfo($attributes);
	public function getAll();
	public function getById($id);
	public function updateTutor($id, array $attributes);
	public function deleteById($id);
}