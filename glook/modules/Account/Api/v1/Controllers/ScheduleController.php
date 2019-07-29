<?php

namespace Glook\Modules\Account\Api\v1\Controllers;

use Glook\Modules\Account\Api\v1\Repositories\ScheduleRepository;
use Glook\Modules\Account\Api\v1\Requests\CreateScheduleRequest;
use Glook\Modules\Account\Api\v1\Requests\UpdateScheduleRequest;
use Glook\Modules\Account\Api\v1\Transformers\ScheduleTransformer;
use Glook\Modules\BaseController;

class ScheduleController extends BaseController
{
    /**
     * @var ScheduleRepository
     */
    private $scheduleRepository;


    /**
     * @var ScheduleTransformer
     */
    private $scheduleTransformer;


    /**
     * ScheduleController constructor.
     * @param ScheduleRepository $scheduleRepository
     * @param ScheduleTransformer $scheduleTransformer
     */
    public function __construct(ScheduleRepository $scheduleRepository,
                                ScheduleTransformer $scheduleTransformer)
    {
        $this->scheduleRepository = $scheduleRepository;
        $this->scheduleTransformer = $scheduleTransformer;
    }


    /**
     * Handles request for registering a new schedule
     * @param CreateScheduleRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function create(CreateScheduleRequest $request){

      $schedule =    $this->scheduleRepository->create($request->all());

      if($schedule)
          return $schedule;

      return $this->error("Unable to create schedule");

    }



    public function index()
	{
        $schedule = $this->scheduleRepository->index(); 
        return $this->transform($schedule, $this->scheduleTransformer);
    }

    public function getById($id){
        return $this->scheduleRepository->getById($id);
    }


	public function update(UpdateScheduleRequest $request, $id)
	{
        $schedule = $this->scheduleRepository->update($request->all(), $id);
        if($schedule)
        return $schedule;

        return $this->error("Unable to update schedule");
       
	}

	public function delete($id)
	{
        return  $this->scheduleRepository->delete($id);
		
	}
}
