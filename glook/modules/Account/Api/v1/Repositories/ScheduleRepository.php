<?php


namespace Glook\Modules\Account\Api\v1\Repositories;


use Glook\Modules\Account\Api\v1\Transformers\ScheduleTransformer;
use Glook\Modules\Account\Models\Schedule;
use Glook\Modules\Account\Models\User;
use Glook\Modules\BaseRepository;

class ScheduleRepository extends BaseRepository{

      /**
     * @var Schedule
     */
    private  $schedule;

    /**
     * scheduleRepository constructor.
     * @param Schedule $schedule
     */
    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }


    public function index(){
        return $this->schedule->all();
   }



        /**
     * Handles creating schedules
     * @param array $scheduleData
     * @return bool|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function create(array $scheduleData){
      $data = (object)$scheduleData;
      

       $schedule = Schedule::create([
            "id"                =>$this->generateUuid(),
            "service_name"      => $data->service_name,
            "price"             => $data->price,
            "appointment_date"  =>$data->appointment_date,
            "appointment_time"  =>$data->appointment_time,
            "user_id"           =>$data->user_id,
            "service_id"        =>$data->service_id,
            "outlet_id"         =>$data->outlet_id,
       ]);
       if($schedule){
        return $schedule;
       } 
    } 
    
    public function getById($id){

        $schedule = $this->schedule->findorfail($id);
        return $schedule;
      }


    public function update( array $request, $id){
        $data = (object)$request;

       $schedule = $this->schedule->findorfail($id);
       $schedule->update([
           "service_name"      => $data->service_name,
           "price"             => $data->price,
           "appointment_date"  =>$data->appointment_date,
           "appointment_time"  =>$data->appointment_time,
           "service_id"        =>$data->service_id,
           "outlet_id"         =>$data->outlet_id,
       ]);


       return $schedule;


      
    }

    public function delete( $id){

      return   $this->schedule->where('id', $id)->delete();

     
     }
}

