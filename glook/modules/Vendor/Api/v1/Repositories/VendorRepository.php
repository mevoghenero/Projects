<?php

namespace Glook\Modules\Vendor\Api\v1\Repositories;


use Glook\Modules\Vendor\Api\v1\Transformers\VendorTransformer;
use Glook\Modules\Vendor\Models\Vendor;
use Glook\Modules\BaseRepository;

class VendorRepository extends BaseRepository
{

     /**
      * @var Vendor
      */
     private  $Vendor;

     /**
      * VendorRepository constructor.
      * @param Vendor $Vendor
      */
     public function __construct(Vendor $Vendor)
     {
          $this->Vendor = $Vendor;
     }

     public function index()
     {
          return $this->Vendor->all();
     }

     /**
      * Handles creating Vendors or Buisness Account
      * @param array $VendorData
      * @return bool|\Illuminate\Http\JsonResponse
      * @throws \Exception
      */
     public function create(array $VendorData)
     {
          $data = (object) $VendorData;

          $Vendor = Vendor::create([
               "id" => $this->generateUuid(),
               "vendor_name" => $data->vendor_name,
               "email" => $data->email,
               "phone" => $data->phone,
               "address" => $data->address,

          ]);
          if ($Vendor) {
               return $Vendor;
          }
     }

     public function getById($id)
     {

          $Vendor = $this->Vendor->findorfail($id);
          return $Vendor;
     }
}
