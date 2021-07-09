<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoLibraryTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('so_library', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_business_categories');
            $table->foreign('id_business_categories')->references('id')->on('business_categories');
            $table->string('aspect');
            $table->string('so');
        });

        //insert
        DB::table('so_library')->insert(
                [
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' ,'so' => 'Memperluas Jangkauan Distribusi'],
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' ,'so' => 'Meningkatkan efisiensi biaya gudang'],
                    ['id_business_categories' => '1', 'aspect' =>'IT' ,'so' => 'Mengadopsi Teknologi SCM 4.0 untuk mencapai keunggulan bersaing'],
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' , 'so' => 'Pemenuhan pesanan yang sempurna (perfect order fulfillment)'],
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' , 'so' => 'Memaksimalkan pengisian kapasitas pengangkutan'],
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' , 'so' => 'Memaksimalkan ketersediaan armada'],
                    ['id_business_categories' => '1', 'aspect' =>'SDM' , 'so' => 'Meningkatkan produktivitas '],
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' , 'so' => 'Meningkatkan efisiensi operasional'],
                    ['id_business_categories' => '1', 'aspect' =>'Keuangan' , 'so' => 'Menurunkan biaya overhead'],
                    ['id_business_categories' => '1', 'aspect' =>'Pelanggan' , 'so' => 'Meningkatkan pelayanan terhadap pelanggan'],
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' , 'so' => 'Menurunkan tingkat kesalahan pengiriman barang'],
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' , 'so' => 'Meningkatkan efisiensi bahan bakar'],
                    ['id_business_categories' => '1', 'aspect' =>'Pelanggan' , 'so' => 'Meningkatkan pangsa pasar'],
                    ['id_business_categories' => '1', 'aspect' =>'Pelanggan' , 'so' => 'Meningkatkan kepuasan pelanggan'],
                    ['id_business_categories' => '1', 'aspect' =>'SDM' , 'so' => 'Meningkatkan kepuasan karyawan terutama di bagian operasional'],
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' , 'so' => 'Meningkatkan daya saing perusahaan'],
                    ['id_business_categories' => '1', 'aspect' =>'Keuangan' , 'so' => 'Menurunkan biaya keuangan'],
                    ['id_business_categories' => '1', 'aspect' =>'IT' , 'so' => 'Mempercepat kesiapan perusahaan menghadapi era 4.0'],
                    ['id_business_categories' => '1', 'aspect' =>'Keuangan' , 'so' => 'Meningkatkan kualitas aset perusahaan'],
                    ['id_business_categories' => '1', 'aspect' =>'Keuangan' , 'so' => 'Meningkatkan cash flow perusahaan'],
                    ['id_business_categories' => '1', 'aspect' =>'Keuangan' , 'so' => 'Meningkatkan kemampuan perusahaan melakukan ekspansi'],
                    ['id_business_categories' => '1', 'aspect' =>'Pelanggan' , 'so' => 'Fokus terhadap segmen pasar yang menguntungkan'],
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' , 'so' => 'Meningkatkan utilisasi gudang'],
                    ['id_business_categories' => '1', 'aspect' =>'Keuangan' , 'so' => 'Meningkatkan Laba'],
                    ['id_business_categories' => '1', 'aspect' =>'Pelanggan' , 'so' => 'Meningkatkan Penjualan'],
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' , 'so' => 'Meningkatkan ketepatan waktu pengiriman'],
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' , 'so' => 'Meningkatkan produktifitas armada'],
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' , 'so' => 'Meningkatkan efisiensi operasional armada transportasi'],
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' , 'so' => 'Meningkatkan kemampuan internal dalam melakukan perbaikan atau pemeliharaan armada'],
                    ['id_business_categories' => '1', 'aspect' =>'SDM' , 'so' => 'Meningkatkan tingkat kesehatan sopir'],
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' , 'so' => 'Meningkatkan Penetrasi Distribusi'],
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' , 'so' => 'Meningkatkan Tingkat Ketersediaan Produk di outlet sesuai target'],
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' , 'so' => 'Meningkatkan produktifitas tenaga penjual'],
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' , 'so' => 'Meningkatkan produktivitas gudang'],
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' , 'so' => 'Meningkatkan Visibility Barang untuk Pelanggan'],
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' , 'so' => 'Meningkatkan efisiensi operasional pergudangan'],
                    ['id_business_categories' => '1', 'aspect' =>'Proses Bisnis' , 'so' => 'Meningkatkan turn over persediaan barang dalam gudang'],
                    ['id_business_categories' => '2', 'aspect' =>'Proses Bisnis' , 'so' => 'Strategic Objective Banking 1'],
                    ['id_business_categories' => '2', 'aspect' =>'Proses Bisnis' , 'so' => 'Strategic Objective Banking 2'],
                    ['id_business_categories' => '2', 'aspect' =>'Proses Bisnis' , 'so' => 'Strategic Objective Banking 3'],
                ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('so_library');
    }

}
