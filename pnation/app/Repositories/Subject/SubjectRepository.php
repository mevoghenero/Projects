<?php 

namespace App\Repositories\Subject;

use App\Helpers\SubjectSlug;
use App\Subject;
use Illuminate\Support\Facades\Validator;

class SubjectRepository implements SubjectRepositoryInterface
{
	protected $subject;
	protected $slug;

	public function __construct(Subject $subject, SubjectSlug $slug)
	{
		$this->subject = $subject;
		$this->slug = $slug;
	}

	public function getAll()
	{
		return $this->subject->all();
	}

	public function getById($slug)
	{
		return $this->subject->findOrFail($slug);
	}

	public function createSubject($attributes)
	{
		Validator::make($attributes->all(), [
			'name' => 'required|string|max:150',
			'description' => 'string'
		]);

		$data = [
			'name' => $attributes['name'],
			'slug' => $this->slug->createSlug($attributes['name']),
			'description' => $attributes['description'],
			'cat_id' => $attributes['cat_id']
		];

		return $this->subject->create($data);
	}

	public function updateSubject($attributes, $id, $data = 'id')
	{
		$subject = $this->subject->where($data, $id)->first();
		$subject->name = $attributes->name;
		$subject->slug = $this->slug->createSlug($attributes->name);
		$subject->description = $attributes->decription;
		$subject->save();

		return $subject;
		
	}

	public function deleteById($id)
	{
		return $this->subject->destroy($id);
	}
}