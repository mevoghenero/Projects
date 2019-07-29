<?php


namespace Glook\Modules\Account\Api\v1\Controllers;

use Illuminate\Foundation\Http\FormRequest;

// use Glook\Modules\Account\Api\v1\Repositories\PaymentRepository;
// use Glook\Modules\Account\Api\v1\Requests\CreatePaymentRequest;
use Glook\Modules\Account\Api\v1\Transformers\PaymentTransformer;
use Paystack;
use Glook\Modules\BaseController;


class PaymentController extends BaseController
{
      /**
     * @var PaymentRepository
     */
    private $paymentRepository;


    /**
     * @var PaymentTransformer
     */
    private $paymentTransformer;


    /**
     * PaymentController constructor.
     * @param PaymentRepository $paymentRepository
     * @param PaymentTransformer $paymentTransformer
     */
    public function __construct(PaymentRepository $paymentRepository,
    PaymentTransformer $paymentTransformer)
    {
        $this->paymentRepository = $paymentRepository;
        $this->paymentTransformer = $paymentTransformer;
    }


    /**
     * Handles request for registering a new Payment
     * @param CreatePaymentRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function create(CreatePaymentRequest $request){

      $payment =    $this->paymentRepository->create($request->all());

      if($payment)
          return $payment;

      return $this->error("Unable to make payment");

    }

    public function index()
	{
        $payment = $this->paymentRepository->index(); 
        return $this->success($payment, $this->paymentTransformer);
    }

    public function getById($id){
        return $this->paymentRepository->getById($id);
    }

    //  /**
    //  * Redirect the User to Paystack Payment Page
    //  * @return Url
    //  */
    // public function redirectToGateway()
    // {
    //     return $this->paymentRepository->redirectToGateway();
    // }

    // /**
    //  * Obtain Paystack payment information
    //  * @return void
    //  */
    // public function handleGatewayCallback()
    // {

    //     return  $this->paymentRepository->handleGatewayCallback();


    //     // dd($paymentDetails); 
    //     // Now you have the payment details,
    //     // you can store the authorization_code in your db to allow for recurrent subscriptions
    //     // you can then redirect or do whatever you want
    // }



     /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }


}
