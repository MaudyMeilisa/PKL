<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjamen', function (Blueprint $table) {
            $table->id();
            $table->biginteger('karyawan_id')->unsigned();
            $table->string('bpjs');
            $table->string('investasi');
            $table->string('kasbon');
            $table->string('tagihan');
            $table->string('total_pinjaman');

            //fk id_karyawan
            $table->foreign('karyawan_id')->references('id')
                ->on('karyawans')->onUpdate('cascade')
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
        Schema::dropIfExists('pinjamen');
    }
}
