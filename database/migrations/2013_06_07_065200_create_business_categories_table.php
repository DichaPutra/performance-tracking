<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessCategoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category');
        });

        //insert
        DB::table('business_categories')->insert(
                [
                    ['category' => 'Logistics'],
                    ['category' => 'Banking'],
                    ['category' => 'Food and Beverage']
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
        Schema::dropIfExists('business_categories');
    }

}
