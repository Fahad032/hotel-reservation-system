<?php

namespace App\Jobs;

use App\Accomodation\ReservationValidator;
use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReserveRoomCommand extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;


    public $user;

    public $start_date;

    public $end_date;

    public $rooms;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( User $user, $start_date, $end_date, $rooms)
    {
        //
        $this->user = $user;

        $this->start_date = $start_date;

        $this->end_date = $end_date;

        $this->rooms = $rooms;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $reservation = new ReservationValidator();

        $reservation->validate($this->start_date, $this->end_date, $this->rooms);
    }
}
