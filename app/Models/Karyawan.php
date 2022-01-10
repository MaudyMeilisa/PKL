<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
     //memberikan akses data apa saja yang bisa dilihat
   protected $visible=['nama_karyawan','ttl','jk','agama','alamat','no_hp','jabatan_id'];

   //memberikan akses dat apa saja yang bisa diisi
   protected $fillable =['nama_karyawan','ttl','jk','agama','alamat','no_hp','jabatan_id'];

   //mencatat waktu pembuatan dan update data otomatis
   public $timestamps=true;

    //membuat relasi one to many
    public function jabatan()
    {
        //data model "karyawan" bisa memiliki banyak data
        //data model "jabatan" melalui fk "id_jabatan"
        return $this->belongsTo('App\Models\Jabatan','jabatan_id');
    }
    public function gaji()
    {
        //data model "gaji" bisa memiliki banyak data
        //data model "karyawan" melalui fk "id_karyawan"
       return $this->hasOne('App\Models\Gaji','karyawan_id');
    }
    public function absen()
    {
        //data model "absen" bisa memiliki banyak data
        //data model "karyawan" melalui fk "id_karyawan"
       return $this->hasOne('App\Models\Absen','id_karyawan');
    }

}
