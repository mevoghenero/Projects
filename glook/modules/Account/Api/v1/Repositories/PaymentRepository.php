<?php


namespace Glook\Modules\Account\Api\v1\Repositories;


use Glook\Modules\Account\Api\v1\Transformers\PaymentTransformer;
use Glook\Modules\Account\Models\Payment;
use Paystack;
use Glook\Modules\BaseRepository;

class PaymentRepository extends BaseRepository{

     /**
     * @var Payment
     */
    private  $payment;

    /**
     * paymentRepository constructor.
     * @param Payment $payment
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    } 
    
    public function index(){

        return $this->payment->all();

   }

        /**
     * Handles creating payment
     * @param array $paymentData
     * @return bool|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function create(array $paymentData){
        $data = (object)$paymentData;
        
         $payment = Payment::create([
              "id"               => $this->generateUuid(),
              "amount"           => $data->amount,
              'email'            => $data->email,
              'transaction_time' => $data->transaction_time,
              // 'transaction_url'  => $data->transaction_url,
              // 'access_code'      => $data->access_code,
              "reference"        => $data->reference,
              "user_id"          => $data->user_id,
              "schedule_id"      => $data->schedule_id,
              "vendor_id"        => $data->vendor_id,
         ]);

         if($payment){
           
          return $paymentData;
         } 
      }



     public function getById($id){

          $payment = $this->payment->findorfail($id);
          return $payment;
        }

      /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
      $paymentInfo = Paystack::getAuthorizationUrl()->redirectNow();

        return $paymentInfo;
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        return $paymentDetails;

        // dd($paymentDetails); 
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}