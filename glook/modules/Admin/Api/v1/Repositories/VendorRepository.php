<?php


namespace Glook\Modules\Admin\Api\v1\Repositories;


use Glook\Modules\Admin\Api\v1\Transformers\VendorTransformer;
use Glook\Modules\Admin\Models\Vendor;
use Glook\Modules\BaseRepository;

class VendorRepository extends BaseRepository{

      /**
     * @var $vendor
     */
    private  $vendor;

    /**
     * vendorRepository constructor.
     * @param Vendor $vendor
     */
    public function __construct(Vendor $vendor)
    {
        $this->vendor = $vendor;
    } 
    
    public function index(){
        return $this->vendor->all();
   }

        /**
     * Handles creating vendors
     * @param array $vendorsData
     * @return bool|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function create(array $vendorData){
        $data = (object)$vendorData;
        
         $organisation = Vendor::create([
              "id"=>$this->generateUuid(),
              "name" =>$data->name,
              "email" =>$data->email,
              "address" =>$data->address,
              'phone' =>$data->phone,
              'website_link' =>$data->website_link,
              'payout_method' =>$data->payout_method,
              'commission_percent'=>$data->commission_percent,

         ]);
         if($vendor){
          return $vendor;
         } 
      }
      
      public function getById($id){

          $vendor = $this->vendor->findorfail($id);
        return $vendor;
      }

      public function update(array $request, $id){
         $data = (object)$request;

     
         $vendor = $this->vendor->findorfail($id)->first();
         $vendor->update([
          "name" =>$data->name,
          "email" =>$data->email,
          "address" =>$data->address,
          'phone' =>$data->phone,
          'website_link' =>$data->website_link,
          'payout_method' =>$data->payout_method,
          'commission_percent'=>$data->commission_percent,
         ]);

         if($vendor){
          return $vendor;
         } 
      } 


      public function delete( $id){

      return   $this->vendor->where('id', $id)->delete();
     }





}