<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBisnisTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bisnis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_business_categories');
            $table->foreign('id_business_categories')->references('id')->on('business_categories');
            $table->string('bisnis');
        });
        
        //insert
        DB::table('bisnis')->insert(
                [
                    //measurement = rating , rangking, absolute number, index, percentages
                    ['id_business_categories' => '1', 'bisnis' => 'All'],
                    ['id_business_categories' => '1', 'bisnis' => 'Distribusi'],
                    ['id_business_categories' => '1', 'bisnis' => 'Pergudangan'],
                    ['id_business_categories' => '1', 'bisnis' => 'Transportasi'],
                    ['id_business_categories' => '2', 'bisnis' => 'perbankan']
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
        Schema::dropIfExists('bisnis');
    }

}
