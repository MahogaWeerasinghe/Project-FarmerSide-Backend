<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimates', function (Blueprint $table) {
            $table->increments('Estimate_id');
            $table->string('rep_id');
            $table->double('forclean');
            $table->double('forland');
            $table->double('forseed');
            $table->double('forfertilizer');
            $table->double('forchemicals');
            $table->double('forharvest');
            $table->double('forothers');
            $table->double('totalamount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estimates');
    }
}
