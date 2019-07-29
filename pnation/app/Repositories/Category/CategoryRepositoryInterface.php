<?php 

namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{
	public function getAll();

	public function getById($id);

	public function createCat($attributes);

	public function updateCat(array $attributes, $id);

	public function deleteById($id);
}