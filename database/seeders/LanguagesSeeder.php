<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $check = DB::table('languages')->count();
        if($check < 1){
        	$languages = array('English','Hindi','Others');
        	$i = 1;
        	foreach ($languages as $row) {
        		DB::table('languages')->insert([
	        		'id' => $i++,
	        		'name' => $row
	        	]);
        	}
        }
    }
}
