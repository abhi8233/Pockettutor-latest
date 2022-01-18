<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmailNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $check = DB::table('email_notification')->count();
        if($check < 1){
        	
        	DB::table('email_notification')->insert([
        		'id' => 1,
        		'admin_email' => 'rashmita.gangani.bi@gmail.com',
        		'name' => 'Rashmita',
        		'email' => 'rashmita.gangani.bi@gmail.com',
        	]);
        }
    }
}
