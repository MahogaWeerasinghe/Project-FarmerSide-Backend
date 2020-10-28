<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
        $table->increments('id');
        $table->string('telephone_number')->unique();
        $table->string('choose');
        $table->string('nameini');
		$table->string('namefull');
		$table->string('address');
		$table->string('TpNo');
		$table->string('dob');
		$table->string('nic');
		$table->string('email');
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
        Schema::dropIfExists('details');
    }
}
