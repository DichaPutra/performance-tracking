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
            $table->string('so');
        });

        //insert
        DB::table('so_library')->insert(
                [
                    ['id_business_categories' => '1', 'so' => 'Memperluas Jangkauan Distribusi'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan efisiensi biaya gudang'],
                    ['id_business_categories' => '1', 'so' => 'Mengadopsi Teknologi SCM 4.0 untuk mencapai keunggulan bersaing'],
                    ['id_business_categories' => '1', 'so' => 'Pemenuhan pesanan yang sempurna (perfect order fulfillment)'],
                    ['id_business_categories' => '1', 'so' => 'Memaksimalkan pengisian kapasitas pengangkutan'],
                    ['id_business_categories' => '1', 'so' => 'Memaksimalkan ketersediaan armada'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan produktivitas '],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan efisiensi operasional'],
                    ['id_business_categories' => '1', 'so' => 'Menurunkan biaya overhead'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan pelayanan terhadap pelanggan'],
                    ['id_business_categories' => '1', 'so' => 'Menurunkan tingkat kesalahan pengiriman barang'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan efisiensi bahan bakar'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan pangsa pasar'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan kepuasan pelanggan'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan kepuasan karyawan terutama di bagian operasional'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan daya saing perusahaan'],
                    ['id_business_categories' => '1', 'so' => 'Menurunkan biaya keuangan'],
                    ['id_business_categories' => '1', 'so' => 'Mempercepat kesiapan perusahaan menghadapi era 4.0'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan kualitas aset perusahaan'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan cash flow perusahaan'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan kemampuan perusahaan melakukan ekspansi'],
                    ['id_business_categories' => '1', 'so' => 'Fokus terhadap segmen pasar yang menguntungkan'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan utilisasi gudang'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan Laba'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan Penjualan'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan ketepatan waktu pengiriman'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan produktifitas armada'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan efisiensi operasional armada transportasi'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan kemampuan internal dalam melakukan perbaikan atau pemeliharaan armada'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan tingkat kesehatan sopir'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan Penetrasi Distribusi'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan Tingkat Ketersediaan Produk di outlet sesuai target'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan produktifitas tenaga penjual'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan produktivitas gudang'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan Visibility Barang untuk Pelanggan'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan efisiensi operasional pergudangan'],
                    ['id_business_categories' => '1', 'so' => 'Meningkatkan turn over persediaan barang dalam gudang'],
                    ['id_business_categories' => '2', 'so' => 'Strategic Objective Banking 1'],
                    ['id_business_categories' => '2', 'so' => 'Strategic Objective Banking 2'],
                    ['id_business_categories' => '2', 'so' => 'Strategic Objective Banking 3'],
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
