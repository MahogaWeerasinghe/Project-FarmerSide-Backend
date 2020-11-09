<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObtainloansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obtainloans', function (Blueprint $table) {
			$table->increments('obtain_id');
			$table->string('application_id');
			$table->string('loan_id');
			$table->string('paid_mount');
			$table->string('rate');
			$table->string('no_of_installments');
			$table->string('amount');
			$table->string('obtained_date');
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
        Schema::dropIfExists('obtainloans');
    }
}
