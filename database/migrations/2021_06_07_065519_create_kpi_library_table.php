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
            $table->unsignedBigInteger('id_so_library');
            $table->foreign('id_so_library')->references('id')->on('so_library');
            $table->string('kpi');
            $table->string('measurement'); //measurement = rating , rangking, absolute number, index, percentages
            $table->string('polarization');
        });

        //insert
        DB::table('kpi_library')->insert(
                [
                    //measurement = rating , rangking, absolute number, index, percentages
                    ['id_so_library' => '1', 'kpi' => 'Jumlah Wilayah Terlayani', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
                    ['id_so_library' => '2', 'kpi' => 'Biaya gudang per m2/bulan', 'measurement' => 'absolute number' ,'polarization' => 'minimize'],
                    ['id_so_library' => '3', 'kpi' => '% proses bisnis pelanggan yang terlayani dengan smartphone', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
                    
                ]
        );
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
