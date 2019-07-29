<?php

namespace Glook\Modules\Vendor\Api\v1\Controllers;

use Glook\Modules\Vendor\Api\v1\Repositories\EmployeeRepository;
use Glook\Modules\Vendor\Api\v1\Requests\CreateEmployeeRequest;
use Glook\Modules\Vendor\Api\v1\Requests\UpdateEmployeeRequest;
use Glook\Modules\Vendor\Api\v1\Transformers\EmployeeTransformer;
use Glook\Modules\BaseController;


class EmployeeController extends BaseController
{
    /**
     * @var EmployeeRepository
     */
    private $employeeRepository;


    /**
     * @var EmployeeTransformer
     */
    private $employeeTransformer;


    /**
     * EmployeeController constructor.
     * @param EmployeeRepository $employeeRepository
     * @param EmployeeTransformer $employeeTransformer
     */
    public function __construct(
        EmployeeRepository $employeeRepository,
        EmployeeTransformer $employeeTransformer
    ) {
        $this->employeeRepository = $employeeRepository;
        $this->employeeTransformer = $employeeTransformer;
    }


    /**
     * Handles request for registering a new Employee
     * @param CreateEmployeeRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function create(CreateEmployeeRequest $request)
    {

        $employee =    $this->EmployeeRepository->create($request->all());

        if ($employee)
            return $employee;

        return $this->error("error:Unable to create employee");
    }

    public function index()
    {
        $employee = $this->employeeRepository->index();
        return $this->success($employee, $this->employeeTransformer);
    }


    public function getById($id)
    {
        return $this->employeeRepository->getById($id);
    }

    public function update(UpdateEmployeeRequest $request, $id)
    {
        $employee = $this->employeeRepository->update($request->all(), $id);
        if ($employee) {
            return $employee;
        }
        return $this->error("Unable to update employee");
    }

    public function delete($id)
    {
        return  $this->employeeRepository->delete($id);
    }
}
