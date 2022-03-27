<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGajisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gajis', function (Blueprint $table) {
            $table->id();
            $table->biginteger('karyawan_id')->unsigned();
            $table->biginteger('jabatan_id')->unsigned();
            $table->string('gapok');
            $table->string('tunjangan');
            // $table->string('lembur');
            $table->string('potongan');
            $table->string('total');
            $table->string('tanggal_gajian');


            //fk id_karyawan
            $table->foreign('karyawan_id')->references('id')
            ->on('karyawans')->onUpdate('cascade')
            ->onDelete('cascade');

            //fk id_jabatan
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
        Schema::dropIfExists('gajis');
    }
}
