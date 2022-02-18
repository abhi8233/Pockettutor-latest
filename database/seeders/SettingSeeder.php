<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $check = DB::table('setting')->count();
        if($check < 1){
        	
        	DB::table('setting')->insert([
        		'id' => 1,
        		'setting_key' => 'stripe_payment_option',
        		'setting_value' => 'Enable'
        	]);

        	DB::table('setting')->insert([
        		'id' => 2,
        		'setting_key' => 'stripe_secret_key',
        		'setting_value' => 'sk_test_v7lck8DbRLZnOpFQJGV0NfJU'
        	]);

        	DB::table('setting')->insert([
        		'id' => 3,
        		'setting_key' => 'stripe_public_key',
        		'setting_value' => 'pk_test_3w90PLGe3acqtkfjeXXImAsh'
        	]);

            DB::table('setting')->insert([
                'id' => 4,
                'setting_key' => 'notification_admin_email',
                'setting_value' => 'rashmita.gangani.bi@gmail.com'
            ]);

            DB::table('setting')->insert([
                'id' => 5,
                'setting_key' => 'notification_sender_name',
                'setting_value' => 'Rashmita'
            ]); 

            DB::table('setting')->insert([
                'id' => 6,
                'setting_key' => 'notification_sender_email',
                'setting_value' => 'rashmita.gangani.bi@gmail.com'
            ]); 

            

        }
    }
}
