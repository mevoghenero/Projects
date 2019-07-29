<?php

namespace App\Http\Controllers;

use App\Http\Resources\Subject\Subject as SubjectResource;
use App\Repositories\Subject\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
	protected $subject;

	public function __construct(SubjectRepositoryInterface $subject)
	{
		$this->subject = $subject;
	}

	public function getAll()
	{
		$subject = $this->subject->getAll();
		return SubjectResource::collection($subject);
	}

	public function getById($slug)
	{
		$subject = $this->subject->getById($slug);
		return new SubjectResource($subject);
	}

	public function createSubject(Request $attributes)
	{
		$subject = $this->subject->createSubject($attributes);
		return new SubjectResource($subject);
	}

	public function updateSubject(Request $attributes, $id)
	{
		$subject = $this->subject->updateSubject($attributes, $id);
		return new SubjectResource($subject);
	}

	public function deleteById($id)
	{
		$this->subject->deleteById($id);
		return response()->json(['success' => 'Item has been deleted']);
	}
}
