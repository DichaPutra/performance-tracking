<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapaianKpiTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capaian_kpi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_active_target_kpi');
            $table->foreign('id_active_target_kpi')->references('id')->on('active_target_kpi');
            $table->bigInteger('periode_th');
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
            $table->bigInteger('capaian');
            $table->double('score', 20, 2);
            $table->bigInteger('weightedscore');
            $table->string('approval')->default('waiting for approval'); // waiting for approval, approved , not approved
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
        Schema::dropIfExists('capaian_kpi');
    }

}
