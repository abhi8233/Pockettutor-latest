<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsBookingSlotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('booking_slots', function (Blueprint $table) {
            $table->boolean('is_feedback')->default(0)->after('date_time');
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking_slots', function (Blueprint $table) {
            $table->dropColumn('is_feedback');
        });
    }
}
