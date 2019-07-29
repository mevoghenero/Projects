<?php

namespace Glook\Modules\Account\Api\v1\Transformers;

use League\Fractal\TransformerAbstract;
use Glook\Modules\Account\Models\Schedule;

class ScheduleTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Schedule $schedule)
    {
        return [
            "id"                => $schedule->id,
            "service_name"      => $schedule->service_name,
            "price"             => $schedule->price,
            "appointment_date"  => $schedule->appointment_date,
            "appointment_time"  => $schedule->appointment_time,
            "user_id"           => $schedule->user_id,
            "service_id"        => $schedule->service_id,
            "outlet_id"         => $schedule->outlet_id,
        ];
    }
}
