<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    //memberikan akses data apa saja yang bisa dilihat
   protected $visible=['nama_jabatan','gapok'];

   //memberikan akses dat apa saja yang bisa diisi
   protected $fillable =['nama_jabatan','gapok'];

   //mencatat waktu pembuatan dan update data otomatis
   public $timestamps=true;

   //membuat relasi one to many
   public function karyawans()
   {
       //data model "jabtan" bisa memiliki banyak data
       //data model "karyawan" melalui fk "id_jabatan"
       $this->hasMany('App\Models\Karyawan','id_jabatan');
   }
}
