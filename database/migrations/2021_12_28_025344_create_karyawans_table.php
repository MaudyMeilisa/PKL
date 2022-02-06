<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('ttl');
            $table->string('jk');
            $table->string('agama');
            $table->string('alamat');
            $table->biginteger('no_hp')->unsigned();
            $table->biginteger('jabatan_id')->unsigned();

             //fk id jabatan_id
             $table->foreign('jabatan_id')->references('id')
             ->on('jabatans')->onUpdate('cascade')
             ->onDelete('cascade');
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
        Schema::dropIfExists('karyawans');
    }
}
