<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    //memberikan akses data apa saja yang bisa dilihat
   protected $visible=['nama_jabatan','gapok','tunjangan'];

   //memberikan akses dat apa saja yang bisa diisi
   protected $fillable =['nama_jabatan','gapok','tunjangan'];

   //mencatat waktu pembuatan dan update data otomatis
   public $timestamps=true;

   //membuat relasi one to many
   public function karyawan()
   {
       //data model "jabtan" bisa memiliki banyak data
       //data model "karyawan" melalui fk "id_jabatan"
       $this->hasMany('App\Models\Karyawan','jabatan_id');
   }

   public function gaji()
   {
       //data model "gaji" bisa memiliki banyak data
       //data model "jabatan" melalui fk "jabatan_id"
       return $this->hasMany('App\Models\Gaji','jabatan_id');
   }
}
