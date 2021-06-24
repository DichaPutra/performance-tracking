<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiLibraryTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('si_library', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kpi_library');
            $table->foreign('id_kpi_library')->references('id')->on('kpi_library');
            $table->string('si');
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
        Schema::dropIfExists('si_library');
    }

}
