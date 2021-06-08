<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ZCBM_Id')->constrained('student_id');
            $table->string('current_level');
            $table->string('qualification_route');
            $table->date('start_date');
            $table->


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
        Schema::dropIfExists('incoices');
    }
}
