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
    public function up()
    {
        Schema::create('so_library', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_business_categories');
            $table->foreign('id_business_categories')->references('id')->on('business_categories');
            $table->string('bisnis');
            $table->string('aspect');
            $table->string('so');
        });

        //insert
        DB::table('so_library')->insert(
                [
                    // Aspect =  Keuangan, Kualitas, Produktivitas, Waktu
                    
                    ['id_business_categories' => '1', 'bisnis' => 'Distribusi', 'aspect' => 'Keuangan', 'so' => 'Memastikan pengelolaan biaya yang paling efisien dari setiap proses disektor Distribusi'],
                    ['id_business_categories' => '1', 'bisnis' => 'Distribusi', 'aspect' => 'Waktu', 'so' => 'Menjamin pemenuhan target lead time, baik secara keseluruhan maupun per proses kegiagtan disektor Distribusi'],
                    ['id_business_categories' => '1', 'bisnis' => 'Distribusi', 'aspect' => 'Kualitas', 'so' => 'Memastikan tidak terjadi adanya damage dan atau mengeliminasi damage se minimal mungkin disektor Distribusi'],
                    ['id_business_categories' => '1', 'bisnis' => 'Distribusi', 'aspect' => 'Produktivitas', 'so' => 'Memastikan tersediannya data yang mampu melacak keberadaan kiriman dan memberikan update akan status kiriman disektor Distribusi'],
                    
                    ['id_business_categories' => '1', 'bisnis' => 'Pergudangan', 'aspect' => 'Keuangan', 'so' => 'Memastikan pengelolaan biaya yang paling efisien dari setiap proses disektor Pergudangan'],
                    ['id_business_categories' => '1', 'bisnis' => 'Pergudangan', 'aspect' => 'Waktu', 'so' => 'Menjamin pemenuhan target lead time, baik secara keseluruhan maupun per proses kegiagtan disektor Pergudangan'],
                    ['id_business_categories' => '1', 'bisnis' => 'Pergudangan', 'aspect' => 'Kualitas', 'so' => 'Memastikan tidak terjadi adanya damage dan atau mengeliminasi damage se minimal mungkin disektor Pergudangan'],
                    ['id_business_categories' => '1', 'bisnis' => 'Pergudangan', 'aspect' => 'Produktivitas', 'so' => 'Memastikan tersediannya data yang mampu melacak keberadaan kiriman dan memberikan update akan status kiriman disektor Pergudangan'],
                    
                    ['id_business_categories' => '1', 'bisnis' => 'Transportasi', 'aspect' => 'Keuangan', 'so' => 'Memastikan pengelolaan biaya yang paling efisien dari setiap proses disektor Transportasi'],
                    ['id_business_categories' => '1', 'bisnis' => 'Transportasi', 'aspect' => 'Waktu', 'so' => 'Menjamin pemenuhan target lead time, baik secara keseluruhan maupun per proses kegiagtan disektor Transportasi'],
                    ['id_business_categories' => '1', 'bisnis' => 'Transportasi', 'aspect' => 'Kualitas', 'so' => 'Memastikan tidak terjadi adanya damage dan atau mengeliminasi damage se minimal mungkin disektor Transportasi'],
                    ['id_business_categories' => '1', 'bisnis' => 'Transportasi', 'aspect' => 'Produktivitas', 'so' => 'Memastikan tersediannya data yang mampu melacak keberadaan kiriman dan memberikan update akan status kiriman disektor Transportasi'],
                    
//                    ['id_business_categories' => '1', 'bisnis' => 'Distribusi', 'aspect' => 'Produktivitas', 'so' => 'Memperluas Jangkauan Distribusi'],
//                    ['id_business_categories' => '1', 'bisnis' => 'Pergudangan', 'aspect' => 'Produktivitas', 'so' => 'Meningkatkan efisiensi biaya gudang'],
//                    ['id_business_categories' => '1', 'bisnis' => 'All', 'aspect' => 'Kualitas', 'so' => 'Mengadopsi Teknologi SCM 4.0 untuk mencapai keunggulan bersaing'],
//                    ['id_business_categories' => '1', 'bisnis' => 'Distribusi', 'aspect' => 'Kualitas', 'so' => 'Pemenuhan pesanan yang sempurna (perfect order fulfillment)'],
//                    ['id_business_categories' => '1', 'bisnis' => 'Transportasi', 'aspect' => 'Produktivitas', 'so' => 'Memaksimalkan pengisian kapasitas pengangkutan'],
//                    ['id_business_categories' => '1', 'bisnis' => 'Transportasi', 'aspect' => 'Kualitas', 'so' => 'Memaksimalkan ketersediaan armada'],
//                    ['id_business_categories' => '1', 'bisnis' => 'All', 'aspect' => 'Produktivitas', 'so' => 'Meningkatkan produktivitas '],
//                    ['id_business_categories' => '1', 'bisnis' => 'Transportasi', 'aspect' => 'Produktivitas', 'so' => 'Meningkatkan efisiensi operasional'],
//                    ['id_business_categories' => '1', 'bisnis' => 'All', 'aspect' => 'Keuangan', 'so' => 'Menurunkan biaya overhead'],
//                    ['id_business_categories' => '1', 'bisnis' => 'Distribusi', 'aspect' => 'Kualitas', 'so' => 'Meningkatkan pelayanan terhadap pelanggan'],
//                    ['id_business_categories' => '1', 'bisnis' => 'Distribusi', 'aspect' => 'Kualitas', 'so' => 'Menurunkan tingkat kesalahan pengiriman barang'],
//                    ['id_business_categories' => '1', 'bisnis' => 'Transportasi', 'aspect' => 'Produktivitas', 'so' => 'Meningkatkan efisiensi bahan bakar'],
//                    ['id_business_categories' => '1', 'bisnis' => 'All', 'aspect' => 'Produktivitas', 'so' => 'Meningkatkan pangsa pasar'],
//                    ['id_business_categories' => '1', 'bisnis' => 'All', 'aspect' => 'Kualitas', 'so' => 'Meningkatkan kepuasan pelanggan'],
//                    ['id_business_categories' => '1', 'bisnis' => 'All', 'aspect' => 'Kualitas', 'so' => 'Meningkatkan kepuasan karyawan terutama di bagian operasional'],
//                    ['id_business_categories' => '1', 'bisnis' => 'All', 'aspect' => 'Keuangan', 'so' => 'Meningkatkan daya saing perusahaan'],
//                    ['id_business_categories' => '1', 'bisnis' => 'All', 'aspect' => 'Keuangan', 'so' => 'Menurunkan biaya keuangan'],
//                    ['id_business_categories' => '1', 'bisnis' => 'All', 'aspect' => 'Kualitas', 'so' => 'Mempercepat kesiapan perusahaan menghadapi era 4.0'],
//                    ['id_business_categories' => '1', 'bisnis' => 'All', 'aspect' => 'Produktivitas', 'so' => 'Meningkatkan kualitas aset perusahaan'],
//                    ['id_business_categories' => '1', 'bisnis' => 'All', 'aspect' => 'Keuangan', 'so' => 'Meningkatkan cash flow perusahaan'],
//                    ['id_business_categories' => '1', 'bisnis' => 'All', 'aspect' => 'Keuangan', 'so' => 'Meningkatkan kemampuan perusahaan melakukan ekspansi'],
//                    ['id_business_categories' => '1', 'bisnis' => 'All', 'aspect' => 'Kualitas', 'so' => 'Fokus terhadap segmen pasar yang menguntungkan'],
//                    ['id_business_categories' => '1', 'bisnis' => 'Pergudangan', 'aspect' => 'Produktivitas', 'so' => 'Meningkatkan utilisasi gudang'],
//                    ['id_business_categories' => '1', 'bisnis' => 'All', 'aspect' => 'Keuangan', 'so' => 'Meningkatkan Laba'],
//                    ['id_business_categories' => '1', 'bisnis' => 'All', 'aspect' => 'Keuangan', 'so' => 'Meningkatkan Penjualan'],
//                    ['id_business_categories' => '1', 'bisnis' => 'Transportasi', 'aspect' => 'Kualitas', 'so' => 'Meningkatkan ketepatan waktu pengiriman'],
//                    ['id_business_categories' => '1', 'bisnis' => 'Transportasi', 'aspect' => 'Produktivitas', 'so' => 'Meningkatkan produktifitas armada'],
//                    ['id_business_categories' => '1', 'bisnis' => 'Transportasi', 'aspect' => 'Keuangan', 'so' => 'Meningkatkan efisiensi operasional armada transportasi'],
//                    ['id_business_categories' => '1', 'bisnis' => 'Transportasi', 'aspect' => 'Kualitas', 'so' => 'Meningkatkan kemampuan internal dalam melakukan perbaikan atau pemeliharaan armada'],
//                    ['id_business_categories' => '1', 'bisnis' => 'Transportasi', 'aspect' => 'Kualitas', 'so' => 'Meningkatkan tingkat kesehatan sopir'],
//                    ['id_business_categories' => '1', 'bisnis' => 'Distribusi', 'aspect' => 'Kualitas', 'so' => 'Meningkatkan Penetrasi Distribusi'],
//                    ['id_business_categories' => '1', 'bisnis' => 'Distribusi', 'aspect' => 'Kualitas', 'so' => 'Meningkatkan Tingkat Ketersediaan Produk di outlet sesuai target'],
//                    ['id_business_categories' => '1', 'bisnis' => 'Distribusi', 'aspect' => 'Produktivitas', 'so' => 'Meningkatkan produktifitas tenaga penjual'],
//                    ['id_business_categories' => '1', 'bisnis' => 'Pergudangan', 'aspect' => 'Produktivitas', 'so' => 'Meningkatkan produktivitas gudang'],
//                    ['id_business_categories' => '1', 'bisnis' => 'Pergudangan', 'aspect' => 'Produktivitas', 'so' => 'Meningkatkan Visibility Barang untuk Pelanggan'],
//                    ['id_business_categories' => '1', 'bisnis' => 'Pergudangan', 'aspect' => 'Produktivitas', 'so' => 'Meningkatkan efisiensi operasional pergudangan'],
//                    ['id_business_categories' => '1', 'bisnis' => 'Pergudangan', 'aspect' => 'Produktivitas', 'so' => 'Meningkatkan turn over persediaan barang dalam gudang'],
//                    ['id_business_categories' => '2', 'bisnis' => 'perbankan', 'aspect' => 'Proses Bisnis', 'so' => 'Strategic Objective Banking 1'],
//                    ['id_business_categories' => '2', 'bisnis' => 'perbankan', 'aspect' => 'Proses Bisnis', 'so' => 'Strategic Objective Banking 2'],
//                    ['id_business_categories' => '2', 'bisnis' => 'perbankan', 'aspect' => 'Proses Bisnis', 'so' => 'Strategic Objective Banking 3'],
                ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('so_library');
    }

}
