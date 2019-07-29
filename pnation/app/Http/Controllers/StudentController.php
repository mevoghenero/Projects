<?php

namespace App\Http\Controllers;

use App\Http\Resources\Student\Student as StudentResource;
use App\Http\Resources\StudentLogin;
use App\Repositories\Authentication\UserAuthenticationInterface;
use App\Repositories\Student\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
	protected $student;
	protected $auth;

	public function __construct(StudentRepositoryInterface $student, UserAuthenticationInterface $auth)
	{
		$this->student = $student;
		$this->auth = $auth;
	}

	public function index()
	{
		$students = $this->student->getAll();
		return StudentResource::collection($students);
	}

	public function getById($id)
	{
		$students = $this->student->getById($id);
		return new StudentResource($students);
	}

	public function getAuthUser()
	{
		$authUser = $this->auth->getAuthenticatedUser();
		return $authUser;
	}

	public function login(Request $request)
	{
		$student = $this->auth->login($request);
		return $student;
	}

	public function store(Request $request)
	{
		$student = $this->student->studentCreate($request);
		return new StudentResource($student);
	}

	public function show($id)
	{
		$student = $this->student->getById($id);
		return StudentResource::collection($student);	
	}
}
