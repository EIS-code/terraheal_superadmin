<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class FreelancerTherapistMassageHistory extends Model
{
    protected $fillable = [
        'start_time',
        'end_time',
        'remaining_time',
        'pause_from',
        'pause_to',
        'booking_infos_id'
    ];

    public function validator(array $data)
    {
        return Validator::make($data, [
            'start_time'       => ['required', 'time'],
            'end_time'         => ['required', 'time'],
            'remaining_time'   => ['required', 'time'],
            'pause_from'       => ['required', 'time'],
            'pause_to'         => ['required', 'time'],
            'booking_infos_id' => ['required', 'integer']
        ]);
    }

    public function getCreatedAt($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
}
