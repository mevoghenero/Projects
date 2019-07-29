<?php 

namespace App\Respositories\Tutor;

use App\Http\Resources\Tutor\Tutor as TutorResource;
use App\Tutor;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\JWTAuth;

class TutorRespository implements TutorRespositoryInterface
{
	protected $tutor;

	public function __construct(Tutor $tutor)
	{
		$this->tutor = $tutor;
	}

	public function tutorCreate($attributes)
	{

		Validator::make($attributes->all(), [
			'nin' 		=> 'required',
			'attach_cv' => 'required',
			'course' 	=> 'required|string',
			'gender' 	=> 'required|string',
			'facebook' 	=> 'required|string',
			'first_name'=> 'required|max:50',
			'last_name' => 'required|max:50',
			'phone' 	=> 'required|max:12',
			'address' 	=> 'required|max:60',
			'city' 		=> 'required|max:30',
			'state' 	=> 'required|max:30',
			'about_me' 	=> 'required|max:25',
			'referral' 	=> 'required|max:50',
			'password' 	=> 'required|string|min:6',
			'email' 	=> 'required|string|email|unique:tutors',
			'role'		=> 'required|in:admin,tutor,student'
		]);

		$defualtPassword = "pN@$%*1076~#&";
		
		$tutor = User::create([
			'first_name' => $attributes['first_name'],
			'last_name'  => $attributes['last_name'],
			'email' 	 => $attributes['email'],
			'phone' 	 => $attributes['phone'],
			'address' 	 => $attributes['address'],
			'city' 		 => $attributes['city'],
			'state' 	 => $attributes['state'],
			'role' 	  	 => 'tutor',
			'password' 	 => Hash::make($defualtPassword)
		]);

		if ($tutor) {
			// dd($tutor);
			$tutorData = [
				'nin' 		=> $attributes['nin'],
				'course' 	=> $attributes['course'],
				'gender' 	=> $attributes['gender'],
				'facebook'  => $attributes['facebook'],
				'about_me' 	=> $attributes['about'],
				'attach_cv' => $this->cvInfo($attributes),
				'referral' 	=> $attributes['referral'],
				'user_id'	=> $tutor->id
			];
			// dd($studentData);
			$this->tutor->create($tutorData);
			$token = \JWTAuth::fromUser($tutor);
			return $tutor;
		}
		
	}

	public function cvInfo($attributes)
	{

		Validator::make($attributes->all(), [
			'cv' => 'required|mimes:pdf,zip,doc,docx,tar|max:90000'
		]);
		$attach = $attributes->file('cv');
		$extension = $attach->getClientOriginalExtension();
		Storage::disk('public')->put($attach->getFilename().'.'.$extension,  File::get($attach));

		$store = $attach->getFilename().'.'.$extension;
		return $store;
	}

	public function getAll()
    {
        $tutors = $this->tutor->where('role', 'tutor')->get();
		// dd($students);
		return $tutors; 
	}

	public function getById($id)
	{
		return User::findOrFail($id);
	}
	
	public function updateTutor($id, array $attributes){
		$tutor = $this->tutor->findOrFail($id);
		$tutor->update($attributes);
		return $tutor;
	}

	public function deleteById($id)
	{
		return $this->tutor->destroy($id);
	}
}