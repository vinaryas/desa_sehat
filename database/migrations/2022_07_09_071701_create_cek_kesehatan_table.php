<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCekKesehatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cek_kesehatan', function (Blueprint $table) {
            $table->id();
			$table->string('nama')->nullable();
			$table->text('alamat')->nullable();
			$table->integer('umur')->nullable();
			$table->string('nama_kk')->nullable();
			$table->
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
        Schema::dropIfExists('cek_kesehatan');
    }
}
