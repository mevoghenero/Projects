<?php


namespace Glook\Modules\Account\Api\v1\Repositories;


use Glook\Modules\Account\Api\v1\Transformers\ProfileTransformer;
use Glook\Modules\Account\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Glook\Modules\Account\Models\User;
use Glook\Modules\BaseRepository;

class ProfileRepository extends BaseRepository{

     /**
     * @var Profile
     */
    private  $profile;

    /**
     * profileRepository constructor.
     * @param Profile $profile
     */
    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    } 
    
    public function index()
    {
        return $this->profile->all();
    }



      public function getById($id)
      {
         $profile = $this->profile->findorfail($id);
         return $profile;
       }


    //   public function update(array $request, $id){
    //     $data = (object)$request;
        
    //     $profile = Profile::findorfail($id);
    //     // dd($profile);
    //     $profile->update([
    //           "gender"   => $data->gender,
    //           "address"  => $data->address,
    //           "city"     => $data->city,
    //           "state"    => $data->state,
    //           "image"    => $data->image
    //     ]);

    //     if($profile){
    //      return $profile;
    //     } 
    //  } 
      
      public function delete( $id)
      {
        return   $this->profile->where('id', $id)->delete();
       }
}