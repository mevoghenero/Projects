<?php


namespace Glook\Modules\Vendor\Api\v1\Repositories;


use Glook\Modules\Vendor\Api\v1\Transformers\OutletTransformer;
use Glook\Modules\Vendor\Models\Outlet;
use Glook\Modules\BaseRepository;

class OutletRepository extends BaseRepository
{

    /**
     * @var Outlet
     */
    private  $outlet;

    /**
     * outletRepository constructor.
     * @param Outlet $outlet
     */
    public function __construct(Outlet $outlet)
    {
        $this->outlet = $outlet;
    }

    public function index()
    {
        return $this->outlet->all();
    }

    /**
     * Handles creating outlets
     * @param array $outletsData
     * @return bool|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function create(array $outletData){
        $data = (object)$outletData;
        
         $outlet = Outlet::create([
              "id"=>$this->generateUuid(),
              "name" =>$data->name,
              "email" =>$data->email,
              "address" =>$data->address,
              "city" =>$data->city,
              "state" =>$data->state,
              "phone" =>$data->phone,
              "vendor_id" =>$data->vendor_id,

         ]);
         if($outlet){
          return $outlet;
         } 
      }
      
      public function getById($id){

        $outlet = $this->outlet->findorfail($id);
        return $outlet;
    }

    public function update(array $request, $id)
    {
        $data = (object) $request;


        $outlet = $this->outlet->findorfail($id)->first();
        $outlet->update([
            "name" => $data->name,
            "email" => $data->email,
            "address" => $data->address,
            "city" => $data->city,
            "state" => $data->state,
            "phone" => $data->phone,
            "vendor_id"=>$data->vendor_id,
        ]);

        if ($outlet) {
            return $outlet;
        }
    }


    public function delete($id)
    {

        return   $this->outlet->where('id', $id)->delete();
    }
    public function getVendorId($vendor_id)
    {
        $outlets = $this->outlet->where('vendor_id', $vendor_id)->get();
        return $outlets;
    }
}
