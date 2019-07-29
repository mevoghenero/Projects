<?php 

namespace App\Repositories\Category;

use App\Category;
use App\Helpers\CategorySlug;
use Illuminate\Support\Facades\Validator;

class CategoryRepository implements CategoryRepositoryInterface
{
	protected $cat;
	protected $slug;

	public function __construct(Category $cat, CategorySlug $slug)
	{
		$this->cat = $cat;
		$this->slug = $slug;
	}

	public function getAll()
	{
		return $this->cat->all();
	}

	public function getById($slug)
	{
		return $this->cat->findOrFail($slug)->load('subject');
	}

	public function createCat($attributes)
	{
		Validator::make($attributes->all(), [
			'name' => 'required|string|max:255',
			'description' => 'required|string'
		]);

		$newCat = [
			'name' => $attributes['name'],
			'slug' => $this->slug->createSlug($attributes['name']),
			'description' => $attributes['description']
		];

		return $this->cat->create($newCat);
	}

	public function updateCat($attributes, $id, $data='id')
	{
		
		$cat = $this->cat->findOrFail($id);
		$cat->name = $attributes['name'];
		$cat->slug = $this->slug->createSlug($attributes['name']);
		$cat->description = $attributes['description'];	
		$cat->save();

		return $cat;
	}

	public function deleteById($id)
	{
		$delete = $this->cat->destroy($id);
		// $delete->delete();
		return $delete;
	}
}