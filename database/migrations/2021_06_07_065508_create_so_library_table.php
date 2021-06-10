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
