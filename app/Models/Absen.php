<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    //memberikan akses data apa saja yang bisa dilihat
   protected $visible=['karyawan_id','tanggal_masuk','status_absen'];

   //memberikan akses dat apa saja yang bisa diisi
   protected $fillable =['karyawan_id','tanggal_masuk','status_absen'];

   //mencatat waktu pembuatan dan update data otomatis
   public $timestamps=true;

   //membuat relasi one to many
   public function karyawan()
   {
       //data model "jabtan" bisa memiliki banyak data
       //data model "karyawan" melalui fk "id_jabatan"
       return $this->belongsTo('App\Models\Karyawan','karyawan_id');
   }
}
