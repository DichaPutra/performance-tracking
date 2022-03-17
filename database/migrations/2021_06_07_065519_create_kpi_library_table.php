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
    public function up()
    {
        Schema::create('kpi_library', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_so_library');
            $table->foreign('id_so_library')->references('id')->on('so_library');
            $table->string('kpi');
            $table->string('formula');
            $table->string('unit');
            $table->string('measurement'); //measurement = rating , rangking, absolute number, index, percentages
            $table->string('polarization');
        });

        //insert
        DB::table('kpi_library')->insert(
                [
                    //['id_so_library' => '', 'kpi' => '', 'formula' => '', 'unit' => '', 'measurement' => '', 'polarization' => ''],
                    //measurement = rating , rangking, absolute number, index, percentages
                    // distribusi
                    ['id_so_library' => '2', 'kpi' => '(Late deliveries) Jumlah pengiriman yang tiba di luar perkiraan waktu / terlambat', 'formula' => 'Late deliveries = (Total pengiriman terlambat) / (Total seluruh pengiriman)', 'unit' => '%', 'measurement' => 'percentages', 'polarization' => 'minimize'],
                    ['id_so_library' => '2', 'kpi' => '(On Time Deliveries) Jumlah Pengiriman selesai tepat waktu', 'formula' => 'On Time Deliveries = (Total pengiriman on time) / (Total seluruh pengiriman)', 'unit' => '%', 'measurement' => 'percentages', 'polarization' => 'maximize'],
                    ['id_so_library' => '3', 'kpi' => '(On-site damage) Jumlah Kerusakan ditemukan setelah bongkar pengiriman', 'formula' => 'On-site damage = ( Jumlah kerusakan setelah bongkar pengiriman ) / (Total seluruh pengiriman)', 'unit' => '%', 'measurement' => 'percentages', 'polarization' => 'minimize'],
                    ['id_so_library' => '3', 'kpi' => '(Pre-loading Damage) Jumlah Kerusakan ditemukan sebelum pemuatan', 'formula' => 'Pre-loading Damage = (Jumlah Kerusakan  sebelum pemuatan) / (Total seluruh pengiriman)', 'unit' => '%', 'measurement' => 'percentages', 'polarization' => 'minimize'],
                    ['id_so_library' => '3', 'kpi' => '(Transit Damage) Jumlah Kerusakan barang ditemukan setelah transit', 'formula' => 'Transit Damage = (Jumlah kerusakan pada saat transit) / (Total seluruh pengiriman)', 'unit' => '%', 'measurement' => 'percentages', 'polarization' => 'minimize'],
                    ['id_so_library' => '4', 'kpi' => '(Unable to deliver) Jumlah pengiriman tidak dapat dipenuhi', 'formula' => 'Unable to deliver = ( Jumlah pengiriman tidak dapat dipenuhi) / (Total jumlah seluruh pengiriman)', 'unit' => '%', 'measurement' => 'percentages', 'polarization' => 'minimize'],
                    ['id_so_library' => '4', 'kpi' => '(Canceled Pickup / Orders) Jumlah pengambilan atau pesanan yang dibatalkan', 'formula' => 'Canceled Pickup / Orders = (Cancelled Pickup order) / (Total jumlah seluruh pengiriman )', 'unit' => '%', 'measurement' => 'percentages', 'polarization' => 'minimize'],
                    ['id_so_library' => '4', 'kpi' => '(Deliveries) Total Pengiriman dalam satu periode', 'formula' => 'Deliveries = ( Jumlah total pengiriman dalam sebulan )', 'unit' => 'Deliveries', 'measurement' => 'absolute number', 'polarization' => 'maximize'],
                    ['id_so_library' => '4', 'kpi' => '(Incorrect or No Paperwork) Jumlah Dokumen salah atau tidak ada', 'formula' => 'Incorrect or No Paperwork = (Jumlah Dokumen salah atau tidak ada)', 'unit' => 'Incorrect Paperwork', 'measurement' => 'absolute number', 'polarization' => 'maximize'],
                    ['id_so_library' => '4', 'kpi' => '(Total Pickups / Orders) Jumlah total pengambilan atau pesanan per hari', 'formula' => 'Total Pickups / Orders = ( Rata rata jumlah pengambilan atau pesanan per hari dalam sebulan)', 'unit' => 'Pickup Order', 'measurement' => 'absolute number', 'polarization' => 'maximize'],
                    ['id_so_library' => '4', 'kpi' => '(Wrong Delivery details) Jumlah detail pengiriman yang salah (salah alamat / salah serah)', 'formula' => 'Wrong Delivery details =  ( Jumlah detail pengiriman yang salah )', 'unit' => 'Kesalahan detail Pengiriman', 'measurement' => 'absolute number', 'polarization' => 'minimize'],
                    // pergudangan
                    ['id_so_library' => '6', 'kpi' => '(Dock to stock (DTS)) Kecepatan proses saat barang tiba di loading dock hingga disimpan pada gudang.', 'formula' => 'Dock to stock = (# jam dari barang di terima hingga disimpan pada gudang) / (# shipments)', 'unit' => 'hours per shipment', 'measurement' => 'absolute number', 'polarization' => 'minimize'],
                    ['id_so_library' => '6', 'kpi' => '(Kecepatan Waktu Bongkar) Efisiensi waktu kecepatan bongkar muat barang pada gudang', 'formula' => 'Kecepatan Waktu Bongkar = (# jam kecepatan bongkar muat barang)', 'unit' => 'Jam', 'measurement' => 'absolute number', 'polarization' => 'minimize'],
                    ['id_so_library' => '7', 'kpi' => '(Kerusakan barang yang disimpan) Jumlah barang yang rusak pada saat penyimpanan di gudang', 'formula' => 'Kerusakan barang yang disimpan = (Jumlah barang yang rusak di gudang)', 'unit' => 'item', 'measurement' => 'absolute number', 'polarization' => 'minimize'],
                    ['id_so_library' => '8', 'kpi' => '(Inventory Accuracy) % akurasi seberapa dekat catatan inventaris dengan stock aktual yang ada di penyimpanan.', 'formula' => 'Inventory Accuracy = (jumlah stock pada catatan inventaris) / (jumlah stock aktual)', 'unit' => '%', 'measurement' => 'percentages', 'polarization' => 'maximize'],
                    ['id_so_library' => '8', 'kpi' => '(Warehouse Space) Jumlah Ruang tersisa di gudang', 'formula' => 'Warehouse Space = Jumlah Ruang tersisa di gudang', 'unit' => 'm2', 'measurement' => 'absolute number', 'polarization' => 'maximize'],
                    ['id_so_library' => '8', 'kpi' => '(Space Use in Warehouse)  Membandingkan warehouse space yang digunakan dibandingkan dengan total seluruh warehouse space', 'formula' => 'Space used in warehouse = (warehouse space yang dipakai) / (total warehouse space) × 100', 'unit' => '%', 'measurement' => 'percentages', 'polarization' => 'minimize'],
                    // transportation
                    ['id_so_library' => '9', 'kpi' => '(Fleet Costs) Total biaya operasional per kendaraan', 'formula' => 'Fleet Costs = (jumlah biaya operasional kendaraan) / (total seluruh armada)', 'unit' => 'Rp per Kendaraan', 'measurement' => 'absolute number', 'polarization' => 'minimize'],
                    ['id_so_library' => '10', 'kpi' => '(Delivered On time %) % pesanan terkirim tepat waktu', 'formula' => 'Delivered On time % = (jumlah pengiriman yang tepat waktu) /  (total seluruh pengiriman)', 'unit' => '%', 'measurement' => 'percentages', 'polarization' => 'maximize'],
                    ['id_so_library' => '11', 'kpi' => '(Damage Rate) Persentase kerusakan dari total pengiriman', 'formula' => 'Damage Rate = (jumlah pengiriman yang mengalami kerusakan) / (total seluruh pengiriman)', 'unit' => '%', 'measurement' => 'percentages', 'polarization' => 'minimize'],
                    ['id_so_library' => '12', 'kpi' => '(Drivers Absent) Jumlah pengemudi yang tidak hadir (absen)', 'formula' => 'Drivers Absent = (jumlah driver yang tidak hadir) / (total seluruh driver)', 'unit' => '%', 'measurement' => 'percentages', 'polarization' => 'minimize'],
                    ['id_so_library' => '12', 'kpi' => '(Number of Drivers Available) Total driver yang tersedia dalam suatu periode', 'formula' => 'Number of Drivers Available = ( Rata rata Jumlah driver yang tersedia dalam satu bulan)', 'unit' => 'Driver', 'measurement' => 'absolute number', 'polarization' => 'maximize'],
                    ['id_so_library' => '12', 'kpi' => '(Operating Vehicles) Jumlah kendaraan yang beroperasi pada suatu periode', 'formula' => 'Operating Vehicles = (Rata rata  Jumlah kendaraan yang beroperasi dalam satu bulan)', 'unit' => 'Kendaraan', 'measurement' => 'absolute number', 'polarization' => 'maximize'],
//                    ['id_so_library' => '1', 'kpi' => 'Jumlah Wilayah Terlayani','unit' => 'Jumlah Wilayah', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '2', 'kpi' => 'Biaya gudang per m2/bulan','unit' => 'Rp', 'measurement' => 'absolute number' ,'polarization' => 'minimize'],
//                    ['id_so_library' => '3', 'kpi' => '% proses bisnis pelanggan yang terlayani dengan smartphone','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '4', 'kpi' => '% Barang yang terkirim sesuai waktunya dan spesifikasinya','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '5', 'kpi' => '% Tingkat Keiisian Kapasitas Pengangkutan Barang','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '6', 'kpi' => '% Alat Angkut yang siap operasi','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '7', 'kpi' => 'Pendapatan per SDM','unit' => 'Rp', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '7', 'kpi' => 'Biaya Per SDM','unit' => 'Rp', 'measurement' => 'absolute number' ,'polarization' => 'minimize'],
//                    ['id_so_library' => '8', 'kpi' => '% utilisasi armada','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '9', 'kpi' => '% Biaya overhead terhadap pendapatan','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'minimize'],
//                    ['id_so_library' => '10', 'kpi' => '% wilayah yang pelanggannya terlayani dengan baik','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '11', 'kpi' => '% Barang terkirim dengan alamat yang salah','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'minimize'],
//                    ['id_so_library' => '12', 'kpi' => 'Biaya bahan bakar per KM','unit' => 'Rp', 'measurement' => 'absolute number' ,'polarization' => 'minimize'],
//                    ['id_so_library' => '13', 'kpi' => '% pangsa pasar','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '14', 'kpi' => 'Indeks Kepuasan Pelanggan','unit' => 'index', 'measurement' => 'index' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '15', 'kpi' => 'Indeks survey kepuasan karyawan','unit' => 'index', 'measurement' => 'index' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '16', 'kpi' => '% Margin Kotor','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '16', 'kpi' => '% Margin Bersih','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '17', 'kpi' => '% rata-rata beban keuangan','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'minimize'],
//                    ['id_so_library' => '18', 'kpi' => '% Tingkat kesiapan perusahaan menghadapi era 4.0','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '19', 'kpi' => '% Aset non produktif','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'minimize'],
//                    ['id_so_library' => '20', 'kpi' => 'Rasio Kas terhadap kewajiban lancar','unit' => '', 'measurement' => '' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '21', 'kpi' => 'Jumlah dana tersedia untuk investasi dan modal kerja','unit' => 'Rp', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '22', 'kpi' => 'Jumlah segmen pasar yang merugi','unit' => 'Jumlah Segmen Pasar', 'measurement' => 'absolute number' ,'polarization' => 'minimize'],
//                    ['id_so_library' => '23', 'kpi' => 'Rupiah per meter2','unit' => 'Rp', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '24', 'kpi' => 'Laba','unit' => 'Rp', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '25', 'kpi' => 'Sales','unit' => 'Rp', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '26', 'kpi' => '% Trip Tepat waktu','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '27', 'kpi' => 'Jumlah trip armada yang menghasilkan penjualan','unit' => 'Jumlah Trip', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '27', 'kpi' => 'Tingkat keterisian armada ','unit' => 'Tingkat Keterisian', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '27', 'kpi' => 'Tingkat utilisasi armada','unit' => 'Tingkat Utilisasi', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '28', 'kpi' => 'Biaya bahan bakar/KM','unit' => 'Rp', 'measurement' => 'absolute number' ,'polarization' => 'minimize'],
//                    ['id_so_library' => '28', 'kpi' => 'Konsumsi bahan bakar/KM','unit' => 'Liter', 'measurement' => 'absolute number' ,'polarization' => 'minimize'],
//                    ['id_so_library' => '29', 'kpi' => '% Tingkat kesiapan armada siap operasi','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '30', 'kpi' => '% Readiness Sopir siap mengemudi','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '31', 'kpi' => 'Jumlah outlet retail yang dilayani secara teratur','unit' => 'Jumlah Outlet', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '32', 'kpi' => '% Ketersediaan produk di outlet yang menjadi target','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '32', 'kpi' => '% Outlet yang menjual secara lengkap bauran produk sesuai target','unit' => '%', 'measurement' => 'percentages' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '33', 'kpi' => 'Rupiah per salesman per tahun','unit' => 'Rp', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '34', 'kpi' => 'Sales per M2 per bulan','unit' => 'Sales/M2 Perbulan', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
//                    ['id_so_library' => '35', 'kpi' => 'Out of Stock','unit' => 'Stock', 'measurement' => 'absolute number' ,'polarization' => 'minimize'],
//                    ['id_so_library' => '36', 'kpi' => 'Beban Gudang per pegawai operasional gudang','unit' => 'Beban Gudang/Pegawai', 'measurement' => 'absolute number' ,'polarization' => 'minimize'],
//                    ['id_so_library' => '37', 'kpi' => 'Tingkat perputaran persediaan barang','unit' => 'Tingkat Perputaran', 'measurement' => 'absolute number' ,'polarization' => 'maximize'],
//         
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
        Schema::dropIfExists('kpi_library');
    }

}
