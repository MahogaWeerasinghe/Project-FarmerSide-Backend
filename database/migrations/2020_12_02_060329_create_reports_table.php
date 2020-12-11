<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('app_id');
            $table->string('ao_id');
            $table->string('ai_id');
            $table->string('do_id');
            $table->string('mem_id');
            $table->string('fert_id');
            $table->string('year');
            $table->string('season');
            $table->string('area');
            $table->string('crop');
            $table->double('quantity');
            $table->double('income');
            $table->string('ao_status');
            $table->string('ai_status');
            $table->string('do_status');
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
        Schema::dropIfExists('reports');
    }
}
