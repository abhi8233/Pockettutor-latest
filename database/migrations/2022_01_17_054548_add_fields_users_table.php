<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
           $table->string('first_name')->nullable()->after('name');
           $table->string('last_name')->nullable()->after('first_name');
           $table->enum('role',['SuperAdmin', 'Tutor', 'Student'])->after('last_name');

           $table->integer('specialization_id')->nullable()->after('profile');
           $table->integer('language_id')->nullable()->after('specialization_id');
           $table->integer('subscriptions_id')->nullable()->after('language_id');
           $table->boolean('is_document')->default(0)->after('subscriptions_id');
           $table->string('institution')->nullable()->after('is_document');
           $table->string('city_institution')->nullable()->after('institution');
           $table->string('state_institution')->nullable()->after('city_institution');
           $table->string('country_institution')->nullable()->after('state_institution');
           $table->integer('country_id')->nullable()->after('country_institution');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('role');
            $table->dropColumn('specialization_id');
            $table->dropColumn('language_id');
            $table->dropColumn('subscriptions_id');
            $table->dropColumn('is_document');
            $table->dropColumn('institution');
            $table->dropColumn('city_institution');
            $table->dropColumn('state_institution');
            $table->dropColumn('country_institution');
            $table->dropColumn('country_id');
            
        });
    }
}
