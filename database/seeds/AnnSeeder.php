<?php

use Illuminate\Database\Seeder;

class AnnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Announcement::create([
            'title' => 'Welcome to my app',
            'details' => 'this is a new notification',
        ]);
    }
}
