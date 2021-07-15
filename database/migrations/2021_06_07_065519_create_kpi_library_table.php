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
            $table->string('unit');
            $table->string('measurement'); //measurement = rating , rangking, absolute number, index, percentages
            $table->string('polarization');
        });

        //insert
        DB::table('kpi_library')->insert(
                [
                    //measurement = rating , rangking, absolute number, index, percentages
                    ['id_so_library' => '1', 'kpi' => 'Jumlah Wilayah Terlayani','unit' => 'Jumlah Wilayah', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
                    ['id_so_library' => '2', 'kpi' => 'Biaya gudang per m2/bulan','unit' => 'Rp', 'measurement' => 'absolute number' ,'polarization' => 'minimize'],
                    ['id_so_library' => '3', 'kpi' => '% proses bisnis pelanggan yang terlayani dengan smartphone','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
                    ['id_so_library' => '4', 'kpi' => '% Barang yang terkirim sesuai waktunya dan spesifikasinya','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
                    ['id_so_library' => '5', 'kpi' => '% Tingkat Keiisian Kapasitas Pengangkutan Barang','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
                    ['id_so_library' => '6', 'kpi' => '% Alat Angkut yang siap operasi','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
                    ['id_so_library' => '7', 'kpi' => 'Pendapatan per SDM','unit' => 'Rp', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
                    ['id_so_library' => '7', 'kpi' => 'Biaya Per SDM','unit' => 'Rp', 'measurement' => 'absolute number' ,'polarization' => 'minimize'],
                    ['id_so_library' => '8', 'kpi' => '% utilisasi armada','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
                    ['id_so_library' => '9', 'kpi' => '% Biaya overhead terhadap pendapatan','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'minimize'],
                    ['id_so_library' => '10', 'kpi' => '% wilayah yang pelanggannya terlayani dengan baik','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
                    ['id_so_library' => '11', 'kpi' => '% Barang terkirim dengan alamat yang salah','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'minimize'],
                    ['id_so_library' => '12', 'kpi' => 'Biaya bahan bakar per KM','unit' => 'Rp', 'measurement' => 'absolute number' ,'polarization' => 'minimize'],
                    ['id_so_library' => '13', 'kpi' => '% pangsa pasar','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
                    ['id_so_library' => '14', 'kpi' => 'Indeks Kepuasan Pelanggan','unit' => 'index', 'measurement' => 'index' ,'polarization' => 'maximize'],
                    ['id_so_library' => '15', 'kpi' => 'Indeks survey kepuasan karyawan','unit' => 'index', 'measurement' => 'index' ,'polarization' => 'maximize'],
                    ['id_so_library' => '16', 'kpi' => '% Margin Kotor','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
                    ['id_so_library' => '16', 'kpi' => '% Margin Bersih','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
                    ['id_so_library' => '17', 'kpi' => '% rata-rata beban keuangan','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'minimize'],
                    ['id_so_library' => '18', 'kpi' => '% Tingkat kesiapan perusahaan menghadapi era 4.0','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
                    ['id_so_library' => '19', 'kpi' => '% Aset non produktif','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'minimize'],
                    ['id_so_library' => '20', 'kpi' => 'Rasio Kas terhadap kewajiban lancar','unit' => '', 'measurement' => '' ,'polarization' => 'maximize'],
                    ['id_so_library' => '21', 'kpi' => 'Jumlah dana tersedia untuk investasi dan modal kerja','unit' => 'Rp', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
                    ['id_so_library' => '22', 'kpi' => 'Jumlah segmen pasar yang merugi','unit' => 'Jumlah Segmen Pasar', 'measurement' => 'absolute number' ,'polarization' => 'minimize'],
                    ['id_so_library' => '23', 'kpi' => 'Rupiah per meter2','unit' => 'Rp', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
                    ['id_so_library' => '24', 'kpi' => 'Laba','unit' => 'Rp', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
                    ['id_so_library' => '25', 'kpi' => 'Sales','unit' => 'Rp', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
                    ['id_so_library' => '26', 'kpi' => '% Trip Tepat waktu','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
                    ['id_so_library' => '27', 'kpi' => 'Jumlah trip armada yang menghasilkan penjualan','unit' => 'Jumlah Trip', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
                    ['id_so_library' => '27', 'kpi' => 'Tingkat keterisian armada ','unit' => 'Tingkat Keterisian', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
                    ['id_so_library' => '27', 'kpi' => 'Tingkat utilisasi armada','unit' => 'Tingkat Utilisasi', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
                    ['id_so_library' => '28', 'kpi' => 'Biaya bahan bakar/KM','unit' => 'Rp', 'measurement' => 'absolute number' ,'polarization' => 'minimize'],
                    ['id_so_library' => '28', 'kpi' => 'Konsumsi bahan bakar/KM','unit' => 'Liter', 'measurement' => 'absolute number' ,'polarization' => 'minimize'],
                    ['id_so_library' => '29', 'kpi' => '% Tingkat kesiapan armada siap operasi','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
                    ['id_so_library' => '30', 'kpi' => '% Readiness Sopir siap mengemudi','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
                    ['id_so_library' => '31', 'kpi' => 'Jumlah outlet retail yang dilayani secara teratur','unit' => 'Jumlah Outlet', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
                    ['id_so_library' => '32', 'kpi' => '% Ketersediaan produk di outlet yang menjadi target','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
                    ['id_so_library' => '32', 'kpi' => '% Outlet yang menjual secara lengkap bauran produk sesuai target','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
                    ['id_so_library' => '33', 'kpi' => 'Rupiah per salesman per tahun','unit' => 'Rp', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
                    ['id_so_library' => '34', 'kpi' => 'Sales per M2 per bulan','unit' => 'Sales/M2 Perbulan', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
                    ['id_so_library' => '35', 'kpi' => 'Out of Stock','unit' => 'Stock', 'measurement' => 'absolute number' ,'polarization' => 'minimize'],
                    ['id_so_library' => '36', 'kpi' => 'Beban Gudang per pegawai operasional gudang','unit' => 'Beban Gudang/Pegawai', 'measurement' => 'absolute number' ,'polarization' => 'minimize'],
                    ['id_so_library' => '37', 'kpi' => 'Tingkat perputaran persediaan barang','unit' => 'Tingkat Perputaran', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
                    //['id_so_library' => '', 'kpi' => '','unit' => '', 'measurement' => '' ,'polarization' => ''],

                    
                    
                    
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
