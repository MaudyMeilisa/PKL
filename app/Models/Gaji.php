<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    //memberikan akses data apa saja yang bisa dilihat
   protected $visible=['id_karyawan','id_jabatan','gapok','tunjangan','lembur','potongan','total'];

   //memberikan akses dat apa saja yang bisa diisi
   protected $fillable =['id_karyawan','id_jabatan','gapok','tunjangan','lembur','potongan','total'];

   //mencatat waktu pembuatan dan update data otomatis
   public $timestamps=true;

    //membuat relasi one to many
    public function karyawans()
    {
        //data model "gaji" bisa memiliki banyak data
        //data model "karyawan" melalui fk "id_karyawan"
        $this->hasMany('App\Models\Karyawan','id_karyawan');
    }
}
