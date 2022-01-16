<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_slots', function (Blueprint $table) {
            $table->id();
            $table->integer('tutor_id');
            $table->date('slot_date');
            $table->time('slot_start_time');
            $table->time('slot_end_time');
            $table->string('slot_note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutor_slots');
    }
}
