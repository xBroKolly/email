<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datasekolah extends Model
{
    use HasFactory;
    protected $table = 'data_sekolah'; 
    protected $fillable = ['nipsn','nama_sekolah','dinas','kabupaten','kecamatan','alamat','email','website','akreditasi','nama_kepala_sekolah','nip_kepala_sekolah','tgl_pengumuman','jam_pengumuman','tahun_ajaran'];
}
