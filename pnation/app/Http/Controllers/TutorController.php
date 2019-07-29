<?php

namespace App\Http\Controllers;

use App\Http\Resources\Tutor\Tutor as TutorResource;
use App\Respositories\Tutor\TutorRespositoryInterface;
use Illuminate\Http\Request;

class TutorController extends Controller
{
	protected $tutorInterface;

	public function __construct(TutorRespositoryInterface $tutorInterface)
	{
		$this->tutorInterface = $tutorInterface;
	}

    public function tutorCreate(Request $attributes)
    {
        // dd($file);
    	$tutorData = $this->tutorInterface->tutorCreate($attributes);
    	$file = $this->tutorInterface->cvInfo($attributes);
    	return new TutorResource($tutorData);
	}
	
	public function getAll()
	{
		$tutor = $this->tutor->getAll();
		return TutorResource::collection($tutor);
	}

	public function getById($id)
	{
		$tutor = $this->tutor->getById($slug);
		return new TutorResource($tutor);
	}

	public function updateTutor(Request $attributes, $id)
	{
		$tutor = $this->tutor->updateTutor($attributes, $id);
		return new TutorResource($tutor);
	}

	public function deleteById($id)
	{
		$this->tutor->deleteById($id);
		return response()->json(['success' => 'Item has been deleted']);
	}
}
