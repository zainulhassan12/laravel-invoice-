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
        Schema::create('zcbm_invoices_seprate', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('ZCBM_Id')->on('students')->onDelete('cascade');
            $table->integer('course_id');
            $table->integer('fee_id');
            $table->string('current_level');
            $table->string('qualification_route');
            $table->date('due_date');
            $table->integer('ammount_paid');
            $table->integer('total_ammount');
            $table->integer('balance');
            $table->string('issued_by');
            $table->timestamp('issue_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
