<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;
      //memberikan akses data apa saja yang bisa dilihat
protected $visible=['karyawan_id','bpjs','investasi','kasbon','tagihan','total_pinjaman'];

   //memberikan akses dat apa saja yang bisa diisi
   protected $fillable =['karyawan_id','bpjs','investasi','kasbon','tagihan','total_pinjaman'];

   //mencatat waktu pembuatan dan update data otomatis
   public $timestamps=true;

    //membuat relasi one to many
    public function karyawan()
    {
        //data model "pinjaman" bisa memiliki banyak data
        //data model "karyawan" melalui fk "karyawan_id"
        return $this->belongsTo('App\Models\Karyawan','karyawan_id');
    }
}
