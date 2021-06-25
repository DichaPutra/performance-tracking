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
    public function up() {
        Schema::create('si_library', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kpi_library');
            $table->foreign('id_kpi_library')->references('id')->on('kpi_library');
            $table->string('si');
            $table->timestamps();
        });

        //insert
        DB::table('si_library')->insert(
                [
                    //measurement = rating , rangking, absolute number, index, percentages
                    ['id_kpi_library' => '1', 'si' => 'Membuka  wilayah distribusi baru'],
                    ['id_kpi_library' => '1', 'si' => 'Menunjuk Keagenan Wilayah Baru'],
                    ['id_kpi_library' => '2', 'si' => 'Investasi teknologi RFID untuk efisiensi Tenaga Kerja'],
                    ['id_kpi_library' => '2', 'si' => 'Analisis Beban Kerja Tenaga Kerja utk mengetahui ketidakefisienan TK'],
                    ['id_kpi_library' => '3', 'si' => 'Implementasi proses layanan bisnis menggunakan smartphone'],
                    ['id_kpi_library' => '3', 'si' => 'Akuisisi perusahaan start-up yang paling cocok dengan bisnis perusahaan'],
                ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('si_library');
    }

}
