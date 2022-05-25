<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AleterAdmissionTableAddFileRow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admissions', function ($table) {
            $table->string('profile_image')->nullable()->after('zip');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admissions', function ($table) {
            $table->$table->dropColumn('profile_image');
        });
    }
}
