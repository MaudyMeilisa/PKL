<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

//memberikan akses data apa saja yang bisa dilihat
protected $visible=['karyawan_id','jabatan_id','gapok','tunjangan','lembur','potongan','total'];

   //memberikan akses dat apa saja yang bisa diisi
   protected $fillable =['karyawan_id','jabatan_id','gapok','tunjangan','lembur','potongan','total'];

   //mencatat waktu pembuatan dan update data otomatis
   public $timestamps=true;

    //membuat relasi one to many
    public function karyawan()
    {
        //data model "gaji" bisa memiliki banyak data
        //data model "karyawan" melalui fk "karyawan_id"
        return $this->belongsTo('App\Models\Karyawan','karyawan_id');
    }
    public function jabatan()
    {
        //data model "gaji" bisa memiliki banyak data
        //data model "jabatan" melalui fk "jabatan_id"
        return $this->belongsTo('App\Models\Jabatan','jabatan_id');
    }
}
