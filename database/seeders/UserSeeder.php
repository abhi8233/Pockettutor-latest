<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $check = DB::table('users')->count();
        if($check < 1){
        	//super admin
        	DB::table('users')->insert([
        		'id' => 1,
            	'name' => '-',
	            'first_name' => 'Super',
	            'last_name' => 'Admin',
	            'role' => 'SuperAdmin',
	            'email' => 'superadmin@gmail.com',
	            'password' => '$2y$10$3DXWL2TLJ.nIoDP2y53QguZl3MvhZZVIyxAENbEsntPduUEldwJoS',
	            'stripe_customer_id' => '-'
	        ]);

	        //Tutor 
        	DB::table('users')->insert([
        		'id' => 2,
            	'name' => '-',
	            'first_name' => 'Tutor',
	            'last_name' => 'Tutor',
	            'role' => 'Tutor',
	            'email' => 'Tutor@gmail.com',
	            'password' => '$2y$10$3DXWL2TLJ.nIoDP2y53QguZl3MvhZZVIyxAENbEsntPduUEldwJoS',
	            'specialization_id' => 1,
	            'language_id' => 1,
	            'is_google_meet' => 0,
	            'institution' => 'US institution',
	            'city_institution' => 'Apple Valley',
	            'state_institution'	=> 'California',
	            'country_institution' => 'United States',
	            'country_id' => 'United States',
	            'stripe_customer_id' => '-'
	        ]);

	        // Student
	        DB::table('users')->insert([
        		'id' => 3,
            	'name' => '-',
	            'first_name' => 'Student',
	            'last_name' => 'Student',
	            'role' => 'Student',
	            'email' => 'Student@gmail.com',
	            'password' => '$2y$10$3DXWL2TLJ.nIoDP2y53QguZl3MvhZZVIyxAENbEsntPduUEldwJoS',
	            'specialization_id' => NULL,
	            'language_id' => NULL,
	            'subscriptions_id' => 1,
	            'institution' => NULL,
	            'city_institution' => NULL,
	            'state_institution'	=> NULL,
	            'country_institution' => NULL,
	            'country_id' => 'United States',
	            'stripe_customer_id' => '-'
	        ]);

	        DB::table('user_plans')->insert([
        		'id' => 1,
        		'user_id' => 3,
        		'subscription_id' => 1,
        		'stripe_plan_id' => '-',
        		'price' => 44.99,
        		'minutes' => 90,
        		'remaining_minutes' => 0,
        		// 'slots' => 6,
        		'is_active' => 1
        	]);

		}
    }
}
