<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        		'setting_key' => 'stripe payment option',
        		'setting_value' => 'Enable'
        	]);

        	DB::table('setting')->insert([
        		'id' => 2,
        		'setting_key' => 'stripe secret key',
        		'setting_value' => 'sk_test_v7lck8DbRLZnOpFQJGV0NfJU'
        	]);

        	DB::table('setting')->insert([
        		'id' => 3,
        		'setting_key' => 'stripe public key',
        		'setting_value' => 'pk_test_3w90PLGe3acqtkfjeXXImAsh'
        	]);
        }
    }
}
