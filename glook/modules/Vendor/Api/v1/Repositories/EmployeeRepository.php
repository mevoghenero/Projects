<?php


namespace Glook\Modules\Vendor\Api\v1\Repositories;


use Glook\Modules\Vendor\Api\v1\Transformers\EmployeeTransformer;
use Glook\Modules\Vendor\Models\Employee;
use Glook\Modules\BaseRepository;

class EmployeeRepository extends BaseRepository{
  
     /**
     * @var Employee
     */
    private  $employee;

    /**
     * employeeRepository constructor.
     * @param Employee $employee
     */
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    } 
    
    public function index(){
        return $this->employee->all();
   }

        /**
     * Handles creating employees
     * @param array $employeesData
     * @return bool|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function create(array $employeeData){
        $data = (object)$employeeData;
        
         $employee = Employee::create([
              "id"=>$this->generateUuid(),
              "status" => $data->status,
              "user_id"=> $data->user_id,
              "role_id"=> $data->role_id,
              "outlet_id"=>$data->outlet_id

         ]);
         if($employee){
          return $employee;
         } 
      }
      
      public function getById($id){

        $employee = $this->employee->findorfail($id);
        return $employee;
      }

      public function update(array $request, $id){
         $data = (object)$request;

     
         $employee = $this->employee->findorfail($id)->first();
         $employee->update([
          "status" => $data->status,
          "user_id"=> $data->user_id,
          "role_id"=> $data->role_id,
          "outlet_id"=>$data->outlet_id
         ]);

         if($employee){
          return $employee;
         } 
      } 


      public function delete( $id){

      return   $this->employee->where('id', $id)->delete();

     
     }






}