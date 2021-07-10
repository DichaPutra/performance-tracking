<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetKpiTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('target_kpi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_target_so');
            $table->foreign('id_target_so')->references('id')->on('target_so');
            $table->unsignedBigInteger('id_kpi_library')->nullable();
            //$table->foreign('id_kpi_library')->references('id')->on('kpi_library');
            $table->string('kpi');
            $table->string('unit'); //satuan
            $table->string('measurement'); //measurement = rating , rangking, absolute number, index, percentages
            $table->bigInteger('target');
            $table->bigInteger('weight');
            $table->string('polarization');
            $table->string('timeframe_target'); // Bulanan, Triwulan, Quartal, Semester, Tahunan
            $table->boolean('is_active')->default(1);
            $table->string('periode_th');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('target_kpi');
    }

}
