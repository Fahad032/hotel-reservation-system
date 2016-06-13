<?php

namespace App\Accomodation;

use Carbon\Carbon;
use Mockery\CountValidator\Exception;
use phpDocumentor\Reflection\Types\Self_;

class ReservationValidator
{

    const MINIMUM_STAY_LENGTH = 1 ;
    const MAXIMUM_STAY_LENGTH = 15;


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

        return $end->diffInDays($start) >= self::MINIMUM_STAY_LENGTH;

    }

//    public function createNew($user, $start_date, $end_date, $room)

    public function createNew($start_date, $end_date, $room)
    {

        $start = Carbon::createFromFormat('Y-m-d', $start_date);

        $end = Carbon::createFromFormat('Y-m-d', $end_date);

        $rooms = $room;


        if(daysAreGreaterThanMaximumAllowed($start, $end)){

            throw new \InvalidArgumentException("Cannot reserve a room for more than fifteen (15) days");
        }


    }


    private function daysAreGreaterThanMaximumAllowed($start, $end){

        return $end->diffInDays($start) > self::MAXIMUM_STAY_LENGTH;
    }


    private function daysAreWithInAcceptableRange($start, $end){

        // check if the days is less that 15 and greater than 1, implement later on;
    }
}
