<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZcbmCourceFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zcbm_cource_fees', function (Blueprint $table) {
            $table->increments('fee_id');
            // $table->foreign('zcbm_course_id')->refrences('id')->on('zcbm_course')->onDelete('cascade');
            // $table->foreignId('cource_id')->constrained('zcbm_course');
            $table->integer('price');
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
        Schema::dropIfExists('zcbm_cource_fees');
    }
}
