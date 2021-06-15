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
            $table->string('measurement');
        });

        //insert
        DB::table('kpi_library')->insert(
                [
                    //measurement = rating , rangking, absolute number, index, percentages
                    ['id_so' => '1', 'kpi' => 'Jumlah Wilayah Terlayani', 'measurement' => 'absolute number'],
                    ['id_so' => '2', 'kpi' => 'Biaya gudang per m2/bulan', 'measurement' => 'absolute number'],
                    ['id_so' => '3', 'kpi' => '% proses bisnis pelanggan yang terlayani dengan smartphone', 'measurement' => 'percentages'],
                    
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
