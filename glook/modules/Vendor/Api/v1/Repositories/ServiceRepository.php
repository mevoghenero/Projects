<?php


namespace Glook\Modules\Vendor\Api\v1\Repositories;


use Glook\Modules\Vendor\Api\v1\Transformers\ServiceTransformer;
use Glook\Modules\Vendor\Models\Service;
use Glook\Modules\BaseRepository;

class ServiceRepository extends BaseRepository{

 /**
     * @var service
     */
    private  $service;

    /**
     * serviceRepository constructor.
     * @param service $service
     */
    public function __construct(service $service)
    {
        $this->service = $service;
    } 
    
    public function index(){
        return $this->service->all();
   }

        /**
     * Handles creating services
     * @param array $serviceData
     * @return bool|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function create(array $serviceData){
        $data = (object)$serviceData;
        
         $service = Service::create([
              "id"=>$this->generateUuid(),
              "name" => $data->name,
              "description"=> $data->description,
              "price"=> $data->price,
              "outlet_id" =>$data->outlet_id,

         ]);
         if($service){
          return $service;
         } 
      }
      
      public function getById($id){

        $service = $this->service->findorfail($id);
        return $service;
      }

      public function update(array $request, $id){
         $data = (object)$request;

     
         $service = $this->service->findorfail($id)->first();
         $service->update([
              "name" => $data->name,
              "description"=> $data->description,
              "price"=> $data->price,
              "outlet_id" =>$data->outlet_id,
         ]);

         if($service){
          return $service;
         } 
      } 


      public function delete( $id){

      return   $this->service->where('id', $id)->delete();

     
     }





}