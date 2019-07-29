<?php

namespace App\Http\Controllers;

use App\Http\Resources\Categories\Category as CategoryResources;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	protected $cat;

	public function __construct(CategoryRepositoryInterface $cat)
	{
		$this->cat = $cat;
	}

	public function getAll()
	{
		$cats = $this->cat->getAll();
		return CategoryResources::collection($cats);
	}

	public function getById($id)
	{
		$cat = $this->cat->getById($id);
		return new CategoryResources($cat);
	}

	public function createCat(Request $attributes)
	{
		$cat = $this->cat->createCat($attributes);
		return new CategoryResources($cat);
	}

	public function updateCat(Request $attributes, $id)
	{
		$cat = $this->cat->updateCat($attributes, $id);
		// dd($cat);
		return new CategoryResources($cat);
	}

	public function deleteById($id)
	{
		return $this->cat->deleteById($id);
	}

}
