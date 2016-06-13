<?php

namespace App\Accomodation;

use Carbon\Carbon;

class ReservationValidator
{

    const MINIMUM_STAY_LENGTH = 1 ;


    /**
     * @param $start_date
     * @param $end_date
     * @param $room
     */

    public function validate($start_date, $end_date, $room)
    {

        $end = carbon::createFromFormat('Y-m-d', $end_date );

        $start = Carbon::createFromFormat('Y-m-d', $start_date);

        if(!$this->endDateIsGreaterThanStartDate($end, $start)){

            throw new \InvalidArgumentException('Requires end date to be grater than start date.');

        }

    }


    /**
     * @param $end
     * @param $start
     * @return boolean
     */

    private function endDateIsGreaterThanStartDate( $end, $start){

        return $end->diffInDays($start) < MINIMUM_STAY_LENGTH;

    }
}
