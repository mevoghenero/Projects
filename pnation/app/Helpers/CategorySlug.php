<?php 

namespace App\Helpers;

use App\Category;

class CategorySlug
{

	//For Generating Unique Slug Our Custom function
	public function createSlug($name, $id = 0)
	{
        // Normalize the name
		$slug = str_slug($name);	

		$allSlugs = $this->getRelatedSlugsCategory($slug, $id);

        // If we haven't used it before then we are all good.
		if (! $allSlugs->contains('slug', $slug)){
			return $slug;
		}
        // Just append numbers like a savage until we find not used.
		for ($i = 1; $i <= 10; $i++) {
			$newSlug = $slug.'-'.$i;
			if (! $allSlugs->contains('slug', $newSlug)) {
				return $newSlug;
			}
		}
		throw new \Exception('Can not create a unique slug');
	}

	protected function getRelatedSlugsCategory($slug, $id = 0)
	{
		return Category::select('slug')->where('slug', 'like', $slug.'%')
		->where('id', '<>', $id)
		->get();
		
	}
}