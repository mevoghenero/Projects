<?php

namespace Glook\Modules\Account\Api\v1\Transformers;

use League\Fractal\TransformerAbstract;
use Glook\Modules\Account\Models\Payment;

class PaymentTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Payment $payment)
    {
        return [
            "id"                   =>$payment->id,
            "amount"               => $payment->amount,
            "authorization_url"    => $payment->authorization_url,
            "access_code"          => $payment->access_code,
            "reference"            => $payment->reference,
            "transaction_time"     => $payment->transaction_time,
            "email"                => $payment->email,
            "user_id"              => $payment->user_id,
            "schedule_id"          => $payment->schedule_id,
            'vendor_id'            => $payment->vendor_id,
        ];
    }
}
