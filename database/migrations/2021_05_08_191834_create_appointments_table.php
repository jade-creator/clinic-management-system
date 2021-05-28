<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('scheduled_at');
            $table->mediumText('remarks')->nullable();
            $table->timestamps();
            $table->foreignId('patient_id')->onDelete('cascade')->constrained();
            $table->foreignId('doctor_id')->nullable()->onDelete('cascade')->constrained();
            $table->foreignId('status_id')->default(1)->onDelete('cascade')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
