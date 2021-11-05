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
        });

        //insert
        DB::table('si_library')->insert(
                [
                    //measurement = rating , rangking, absolute number, index, percentages
                    ['id_kpi_library' => '1', 'si' => 'Membuka  wilayah distribusi baru'],
//                    ['id_kpi_library' => '1', 'si' => 'Menunjuk Keagenan Wilayah Baru'],
//                    ['id_kpi_library' => '2', 'si' => 'Investasi teknologi RFID untuk efisiensi Tenaga Kerja'],
//                    ['id_kpi_library' => '2', 'si' => 'Analisis Beban Kerja Tenaga Kerja utk mengetahui ketidakefisienan TK'],
//                    ['id_kpi_library' => '3', 'si' => 'Implementasi proses layanan bisnis menggunakan smartphone'],
//                    ['id_kpi_library' => '3', 'si' => 'Akuisisi perusahaan start-up yang paling cocok dengan bisnis perusahaan'],
//                    ['id_kpi_library' => '4', 'si' => 'Penyempurnaan sistem informasi dan SOP'],
//                    ['id_kpi_library' => '5', 'si' => 'Mengadakan program promosi kepada agen pengumpul untuk mencapai target tertentu '],
//                    ['id_kpi_library' => '6', 'si' => 'Melakukan kerjasama pemeliharaan alat angkut kepada piha ketiga untuk menjamin kesiapan operasi'],
//                    ['id_kpi_library' => '7', 'si' => 'Memperbaiki sistem bonus di bagian pemasaran yang memacu penjualan'],
//                    ['id_kpi_library' => '8', 'si' => 'Pengendalian biaya secara terintegrasi'],
//                    ['id_kpi_library' => '9', 'si' => 'Perampingan dan penyederhanaan armada sesuai kapasitas'],
//                    ['id_kpi_library' => '9', 'si' => 'Melakukan kaji ulang terhadap pola operasional rute armada'],
//                    ['id_kpi_library' => '10', 'si' => 'Program rasionalisasi jumlah SDM'],
//                    ['id_kpi_library' => '11', 'si' => 'Melakukan survei konsumen untuk mengetahui apakah sudah terlayani dengan baik (Aspek 3 Mu: Mutu-Mudah-Murah)'],
//                    ['id_kpi_library' => '12', 'si' => 'Mengimplementasikan teknologi pemetaan penentuan alamat kirim (model share location) yang dapat dikonfirmasi pelanggan'],
//                    ['id_kpi_library' => '13', 'si' => 'Optimalisasi rute'],
//                    ['id_kpi_library' => '13', 'si' => 'Audit khusus terhadap pemakaian bahan bakar'],
//                    ['id_kpi_library' => '13', 'si' => 'Uji petik terhadap efisiensi bahan bakar armada yang usianya diatas 5 tahun'],
//                    ['id_kpi_library' => '14', 'si' => 'Meningkatkan jumlah keagenan'],
//                    ['id_kpi_library' => '14', 'si' => 'Meningkatkan aktivitas promosi '],
//                    ['id_kpi_library' => '15', 'si' => 'Mengimplementasikan budaya melayani pelanggan diseluruh bagian perusahan'],
//                    ['id_kpi_library' => '16', 'si' => 'Memperbaiki sistem remunerasi bagian operasional'],
//                    ['id_kpi_library' => '16', 'si' => 'Mengidentifikasi area ketidakpuasan pegawai operasional'],
//                    ['id_kpi_library' => '17', 'si' => 'Kaji ulang seluruh pola operasi dengan Business Process Reengineering'],
//                    ['id_kpi_library' => '18', 'si' => 'Implementasi Activity Based Costing dengan menghilangkan aktivitas yang tidak bernilai tambah'],
//                    ['id_kpi_library' => '19', 'si' => 'Restrukturisasi hutang berbunga tinggi'],
//                    ['id_kpi_library' => '19', 'si' => 'Negosiasi beban bunga dengan kreditor'],
//                    ['id_kpi_library' => '19', 'si' => 'Mengeluarkan surat utang dengan beban bunga lebih rendah'],
//                    ['id_kpi_library' => '20', 'si' => 'Menemukan strategic investor dengan melepas sebagian kepemilikan '],
//                    ['id_kpi_library' => '21', 'si' => 'Melepas aset non produktif'],
//                    ['id_kpi_library' => '21', 'si' => 'Melakukan kerjasama dengan pihak ketiga untuk pendayagunaan aset non produktif'],
//                    ['id_kpi_library' => '22', 'si' => 'Mempercepat penagihan terhadap piutang yang sudah atuh tempo'],
//                    ['id_kpi_library' => '22', 'si' => 'Melakukan renegosiasi pembayaran hutang lancar terhadap kreditur'],
//                    ['id_kpi_library' => '23', 'si' => 'Melakukan IPO'],
//                    ['id_kpi_library' => '23', 'si' => 'Menyuntikkan dana segar dari pemilik/investor baru'],
//                    ['id_kpi_library' => '23', 'si' => 'Perampingan bisnis dengan fokus terhadap bisnis inti'],
//                    ['id_kpi_library' => '24', 'si' => 'Analisis keuntungan segmen pasar dengan menggunakan analisis pareto'],
//                    ['id_kpi_library' => '25', 'si' => 'Meningkatkan turnover persediaan '],
//                    ['id_kpi_library' => '25', 'si' => 'Melakukan treatment khusus terhadap barang slow moving'],
//                    ['id_kpi_library' => '25', 'si' => 'Mencari pelanggan baru yang bersifat fast moving'],
//                    ['id_kpi_library' => '26', 'si' => 'Menurunkan beban keuangan'],
//                    ['id_kpi_library' => '27', 'si' => 'Mempertahankan dan meningkatkan jumlah pelanggan'],
//                    ['id_kpi_library' => '28', 'si' => 'Implementasi teknologi GPS dan pemanduan rute armada menghindari kemacetan '],
//                    ['id_kpi_library' => '28', 'si' => 'Memberikan akses kepada pemilik barang untuk melihat visibility armada yang melayaninya secara real time'],
//                    ['id_kpi_library' => '29', 'si' => 'Meningkatkan upaya pemasaran dan penjualan secara intensif dan ekstensif'],
//                    ['id_kpi_library' => '31', 'si' => 'Analisis pola operasi armada utk menghasilan rute yang efisien dan efektif'],
//                    ['id_kpi_library' => '32', 'si' => 'Pelatihan Sopir armada bagaimana mengemudi secara efisien'],
//                    ['id_kpi_library' => '32', 'si' => 'Melakukan kerjasama dengan POM bensin strategis untuk meningkatkan pengendalian penggunaan bahan bakar dan mendapatkan term pembayaran yang menguntungkan'],
//                    ['id_kpi_library' => '33', 'si' => 'Pelatihan Sopir armada bagaimana mengemudi secara efisien'],
//                    ['id_kpi_library' => '34', 'si' => 'Meningkatkan kehandalan armada melalui program pemeliharaan preventif armada'],
//                    ['id_kpi_library' => '34', 'si' => 'Pelatihan Upgrade kemampuan mekanik perusahaan'],
//                    ['id_kpi_library' => '34', 'si' => 'Investasi alat-alat bengkel utk meningkatkan kemampuan internal dalam perbaikan kendaraan'],
//                    ['id_kpi_library' => '35', 'si' => 'Mengimplementasikan program kebugaran sopir di kantor dan di rumah '],
//                    ['id_kpi_library' => '35', 'si' => 'Implementasi program preventif kesehatan sopir dengan cek berkala dan pemberin multivitamin'],
//                    ['id_kpi_library' => '36', 'si' => 'Melakukan kaji ulang terhadap pola operasi rute penjualan'],
//                    ['id_kpi_library' => '37', 'si' => 'Melakukan kaji ulang terhadap pola operasi rute penjualan'],
//                    ['id_kpi_library' => '38', 'si' => 'Program insentif buat Salesman yang berhasil mencapai target sales dan bauran produk'],
//                    ['id_kpi_library' => '39', 'si' => 'Analisis rute penjualan dan potensi pasarnya'],
//                    ['id_kpi_library' => '39', 'si' => 'Meningkatkan efektifitas program pelatihan salesmanship untuk tenaga penjual'],
//                    ['id_kpi_library' => '40', 'si' => 'Analisis Persediaan Barang Fast Moving dan Slow Moving '],
//                    ['id_kpi_library' => '41', 'si' => 'Membangun sistem informasi pergudangan yang memungkinkan pemilik barang mengetahui ketersediaan barangnya secara reall time'],
//                    ['id_kpi_library' => '42', 'si' => 'Implementasi teknologi terkini dibidang pergudangan'],
//                    ['id_kpi_library' => '42', 'si' => 'Analisis lay-out gudang dan analisis pergerakan persediaan '],
//                    ['id_kpi_library' => '43', 'si' => 'Analisis turn over persediaan barang per item barang dan menghitung ulang persediaan minimal tiap item barang'],
                    //['id_kpi_library' => '', 'si' => ''],
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
