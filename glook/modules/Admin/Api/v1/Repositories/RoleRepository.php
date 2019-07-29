<?php


namespace Glook\Modules\Admin\Api\v1\Repositories;


use Glook\Modules\Admin\Api\v1\Transformers\RoleTransformer;
use Glook\Modules\Admin\Models\Role;
use Glook\Modules\BaseRepository;

class RoleRepository extends BaseRepository{

     /**
     * @var Role
     */
    private  $role;

    /**
     * roleRepository constructor.
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    } 
    
    public function index(){
        return $this->role->all();
   }

        /**
     * Handles creating roles
     * @param array $rolesData
     * @return bool|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function create(array $roleData){
        $data = (object)$roleData;
        
         $role = Role::create([
              "id"=>$this->generateUuid(),
              "name" => $data->name,
              "display_name"=> $data->display_name,

         ]);
         if($role){
          return $role;
         } 
      }
      
      public function getById($id){

        $role = $this->role->findorfail($id);
        return $role;
      }

     //  public function update(array $request, $id){
     //     $data = (object)$request;

     
     //     $role = $this->role->findorfail($id)->first();
     //     $role->update([
     //          "name" => $data->name,
     //          "display_name"=> $data->display_name,
     //     ]);

     //     if($role){
     //      return $role;
     //     } 
     //  } 


      public function delete( $id){

      return   $this->role->where('id', $id)->delete();

     
     }

     public function assignRole($role)
    {
        return $this->roles()->sync(
            [Role::whereName($role)->firstOrFail()->id]
        );
    }
}