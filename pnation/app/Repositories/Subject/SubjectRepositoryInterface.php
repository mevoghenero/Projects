<?php 

namespace App\Repositories\Subject;

interface SubjectRepositoryInterface
{
	public function getAll();

	public function getById($id);

	public function createSubject($attributes);

	public function updateSubject(array $attributes, $id);

	public function deleteById($id);
}