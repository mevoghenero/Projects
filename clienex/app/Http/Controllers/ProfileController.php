<?php

namespace App\Http\Controllers;

use  App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
        $profiles = Profile::all();
        return view('profileUsers/userProfile');

    }
    
    public function store(Request $request){

        if($request->hasFile('image_file')){  
            \Cloudder::upload($request->file('image_file'));
            $c=\Cloudder::getResult();             
            if($c){
            //    return back()->with('success','You have successfully upload images.') ->with('image',$c['url']);
            }
            
        }

        // dd($request->all());

        Validator::make($request->all(), [
			'firstName' 		=> 'required|string|max:255',
			'lastName'  		=> 'required|string', 'max:255',
			'phoneNo'   		=> 'required|max:15',
			'email' 	 		=> 'required|string|email|max:255|unique:user',
			'password' 	 		=> 'required|string|min:8',
            'confirmPassword'   => 'required|string|same:password',
        ])
        ->validate();

        // $request->validate([
        //     'firstName' 		=> 'required|string|max:255',
		// 	'lastName'  		=> 'required|string', 'max:255',
		// 	'phoneNo'   		=> 'required|max:15',
		// 	'email' 	 		=> 'required|string|email|max:255|unique:users',
		// 	'password' 	 		=> 'required|string|min:8',
        //     'confirmPassword'   => 'required|string|same:password',
        // ]);

       $profile = new Profile;
       $profile->file = $request->file;  
       $profile->firstName = $request->firstName;
       $profile->lastName = $request->lastName;
       $profile->email = $request->email;
       $profile->phoneNo = $request->phoneNo;
       $profile->password = $request->password;
       $profile->save();
       return view('profileUsers.userDetail',[
           'profile' => $profile 
       ])->with('status','Profile created successfully.');
    }
    public function update(){

        if($request->hasFile('image_file')){  
            \Cloudder::upload($request->file('image_file'));
            $c=\Cloudder::getResult();             
            if($c){
            //    return back()->with('success','You have successfully upload images.') ->with('image',$c['url']);
            }
            
        }

        // dd($request->all());

        Validator::make($request->all(), [
			'firstName' 		=> 'required|string|max:255',
			'lastName'  		=> 'required|string', 'max:255',
			'phoneNo'   		=> 'required|max:15',
			'email' 	 		=> 'required|string|email|max:255|unique:user',
			'password' 	 		=> 'required|string|min:8',
            'confirmPassword'   => 'required|string|same:password',
        ])
        ->validate();

       $profile = Profile::all($request);
       $profile->file = $request->file;  
       $profile->firstName = $request->firstName;
       $profile->lastName = $request->lastName;
       $profile->email = $request->email;
       $profile->phoneNo = $request->phoneNo;
       $profile->password = $request->password;
       $profile->save();
       return back()->with('success', 'Profile Has Been Updated Successfully!!');

    }
    public function delete(){
        Profile::find()->delete();
		return redirect()->route('profile.name');
    }
}
