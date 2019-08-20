<?php

use Illuminate\Database\Seeder;
use App\Events;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create init event
        Events::create([
            'title' => 'App Meeting @ SOGO',
            'event_start' => '2019-07-30',
            'event_end' => '2019-07-31',
        ]);
    }
}
