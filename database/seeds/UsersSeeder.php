<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //generate init admin account
        User::create([
            'name' => 'Jon-Luke Diericks',
            'role' => 'admin',
            'email' => 'jd@thewb.co',
            'title' => 'Web Developer',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);

        //generate init user account
        User::create([
            'name' => 'Matt Smith',
            'role' => 'team_member',
            'title' => 'Designer',
            'email' => 'jdwebdesigns@live.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);

    }
}
