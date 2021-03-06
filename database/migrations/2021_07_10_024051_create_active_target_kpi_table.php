<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiveTargetKpiTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_target_kpi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_target_kpi');
            $table->foreign('id_target_kpi')->references('id')->on('target_kpi');
            $table->bigInteger('periode_th');
            $table->string('range_period');
            $table->bigInteger('bulan');
            $table->bigInteger('tahun');
            $table->string('so');
            $table->string('kpi');
            $table->string('unit'); // satuan
            $table->string('measurement'); //measurement = rating , rangking, absolute number, index, percentages
            $table->bigInteger('target');
            $table->bigInteger('weight');
            $table->string('polarization');
            $table->string('timeframe_target');
            $table->bigInteger('is_scored')->default(0);
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
        Schema::dropIfExists('active_target_kpi');
    }

}
