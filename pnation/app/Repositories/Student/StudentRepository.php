<?php 

namespace App\Repositories\Student;

use App\Http\Resources\Student\Student as StudentResource;
use App\Student;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\JWTAuth;


class StudentRepository implements StudentRepositoryInterface
{
	protected $student;
	protected $user;

	public function __construct(Student $student, User $user)
	{
		$this->student = $student;
		$this->user = $user;
	}

	public function getAll()
	{
		$students = $this->user->where('role', 'student')->get();
		// dd($students);
		return $students;
	}

	public function getById($id)
	{
		return User::findOrFail($id);
	}

	public function studentCreate($attributes)
	{
		Validator::make($attributes->all(), [
			'time' 		=> 'required',
			'hours' 	=> 'required',
			'weeks' 	=> 'required',
			'student' 	=> 'required',
			'duration' 	=> 'required',
			'password' 	=> 'required|string|min:6',
			'first_name'=> 'required|max:50',
			'last_name' => 'required|max:50',
			'phone' 	=> 'required|max:12',
			'address' 	=> 'required|max:60',
			'city' 		=> 'required|max:30',
			'state' 	=> 'required|max:30',
			'start' 	=> 'required|max:25',
			'level' 	=> 'required|max:50',
			'email' 	=> 'required|string|email|unique:students',
			'role'		=> 'required|in:admin,tutor,student'
		]);
		
		$user = User::create([
			'first_name' => $attributes['first_name'],
			'last_name'  => $attributes['last_name'],
			'email' 	 => $attributes['email'],
			'phone' 	 => $attributes['phone'],
			'address' 	 => $attributes['address'],
			'city' 		 => $attributes['city'],
			'state' 	 => $attributes['state'],
			'role' 	  	 => 'student',
			'subject_id' => $attributes['subject'],
			'password' 	 => Hash::make($attributes['password'])
		]);
		// $user->subject()->sync($attributes->subject_id);

		if ($user) {
			// dd($user->id);
			$studentData = [
				'start_when' => $attributes['start'],
				'no_student' => $attributes['student'],
				'weeks' 	 => $attributes['weeks'],
				'duration' 	 => $attributes['duration'],
				'hours'  	 => $attributes['hours'],
				'time' 		 => $attributes['time'],
				'level' 	 => $attributes['level'],
				'referral' 	 => $attributes['referral'],
				'user_id'	 => $user->id
			];
			// dd($studentData);
			$this->student->create($studentData);
			$token = \JWTAuth::fromUser($user);
			return new StudentResource($user, $token);
		}
		
	}

	public function studentUpdate($id, array $attributes)
	{
		$student = $this->student->findOrFail($id);
		$student->update($attributes);
		return $student;
	}

	public function deleteById($id)
	{
		return $this->student->destroy($id);
	}
}
