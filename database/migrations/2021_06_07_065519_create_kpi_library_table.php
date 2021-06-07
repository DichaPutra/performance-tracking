<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiLibraryTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('kpi_library', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_so');
            $table->foreign('id_so')->references('id')->on('so_library');
            $table->string('kpi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('kpi_library');
    }

}
