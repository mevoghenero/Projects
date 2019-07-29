<?php


namespace Glook\Modules\Account\Api\v1\Repositories;



// use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Glook\Modules\Account\Api\v1\Transformers\UserTransformer;
use Glook\Modules\Account\Models\Profile;
use Glook\Modules\Account\Models\User;
use Glook\Modules\Admin\Models\Role;
use Glook\Modules\BaseRepository;

class UserRepository extends BaseRepository
{

    /**
     * @var User
     * @var Profile
     */
    private  $user;
    private $profile;


    /**
     * UserRepository constructor.
     * @param User $user
     */

    public function __construct(User $user, Profile $profile )
    {
        $this->user = $user;
        $this->profile = $profile;
        // $this->middleware('auth');
    }


    /**
     * Handles user registration
     * @param array $userData
     * @return bool|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function register(array $userData){
        $data = (object)$userData;

       $role  = Role::where('name', 'user')->first();
       $user  = User::create([
           "id"          =>$this->generateUuid(),
           "first_name"  =>$data->first_name,
           "last_name"   =>$data->last_name,
           "email"       =>$data->email,
           "phone"       =>$data->phone,
           "role_id"     =>$role->id,
           "password"    =>Hash::make($data->password)
       ]);


    if($user){ 
            $profile   = Profile::create([
            'id'       => $this->generateUuid(),  
            'user_id'  => $user->id,
            ]);
        }

        if($user && $profile){
            $this->sendWelcomeEmail($user);
            return $this->login($userData);
        }
        


    return false;

    }

    /**
     * Logs in a user
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */

    public function login(array $data){
        $credentials = collect($data)->only(['email','password']);
        // dd($data);
        if($token = auth()->attempt($credentials->toArray())){
            $user = auth()->user();
            $user = fractal($user, new UserTransformer())->serializeWith(new \Spatie\Fractalistic\ArraySerializer());
            return response()->json(["status"=>"success","token"=>$token,"user"=>$user]);
        }

        return response()->json(["status"=>"error","message"=>"Invalid email or password"], 404);

    }

    


    public function index(){
         return $this->user->all();
    }


    public function getById($id){

        $user = $this->user->findorfail($id);
        return $user;
      }

   public function update(array $request, $id){
       $data = (object)$request;

           $user = $this->user->findorfail($id);
           $user->update([
               "first_name" =>$data->first_name,
               "last_name"  =>$data->last_name,
               "phone"      =>$data->phone,
           ]);
        
           $profile = $this->profile->where('user_id', $id);
           $profile->update([
               "gender"     =>$data->gender,
               "address"    =>$data->address,
               "city"       =>$data->city,
               "state"      =>$data->state,
               "image"      =>$data->image,
           ]);


     if($user && $profile)
       return $request;

       return false;
   }


    public function delete( $id){

        return   $this->user->where('id', $id)->delete();
  
       
    }


    private function sendWelcomeEmail(User $user){
        // $data = array('name' => $user->user->name, 'email' => $user->user->email, 'body' => 'Welcome to our website. Hope you will enjoy our articles');
 
        // Mail::send('emails.mail', $data, function($message) use ($data) {
        //     $message->to($data['email'])
        //             ->subject('Welcome to our Website');
        //     $message->from('noreply@artisansweb.net');
        // });


        // $message->from('testmail@gg.lv');
        // $message->subject('welcome');
        // $message->to('pokkers.karlis@gmail.com');
    }


}
