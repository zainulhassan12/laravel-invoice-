<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            // $table->id();
            $table->bigincrements('ZCBM_Id')->unsigned();
            $table->string('Name')->length(50)->required();
            $table->string('Surname')->length(50)->required();
            $table->string('Email')->unique()->nullable()->default(null);
            $table->string('Phone_Number')->nullable()->default(null);
            $table->string('Qualification_Route')->required();
            $table->date('Start_Date', $precision = 0);
            $table->integer('Total_Tuition_Fees');
            $table->integer('Discount');
            $table->string('Current_Level')->nullable()->default(null);
            $table->string('Data_Entered_By')->nullable()->default(null);
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
        Schema::dropIfExists('students');
    }
}
