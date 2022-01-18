<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubscriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $check = DB::table('subscriptions')->count();
        if($check < 1){
        	
        	DB::table('subscriptions')->insert([
        		'id' => 1,
        		'plan' => 'Basic',
        		'price' => 44.99,
        		'minutes' => 90,
        		'slots' => 6,
        		'status' => 'Active',
        		'stripe_product_id' => '',
        	]);

        	DB::table('subscriptions')->insert([
        		'id' => 2,
        		'plan' => 'Plus',
        		'price' => 74.99,
        		'minutes' => 180,
        		'slots' => 12,
        		'status' => 'Active',
        		'stripe_product_id' => '',
        	]);

        	DB::table('subscriptions')->insert([
        		'id' => 3,
        		'plan' => 'Premium',
        		'price' => 114.99,
        		'minutes' => 300,
        		'slots' => 20,
        		'status' => 'Active',
        		'stripe_product_id' => '',
        	]);

        	DB::table('subscriptions')->insert([
        		'id' => 4,
        		'plan' => 'Mentor',
        		'price' => 299.99,
        		'minutes' => 900,
        		'slots' => 60,
        		'status' => 'Active',
        		'stripe_product_id' => '',
        	]);
        }
    }
}
