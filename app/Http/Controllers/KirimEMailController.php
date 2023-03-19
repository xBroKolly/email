<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

use App\Models\User;
use App\Models\Pendaftaran_siswa;
 
class KirimEmailController extends Controller
{
    public function kirim($no_daftar)
    {

        // Ambil Data Pendaftar
        $data_pendaftaran = Pendaftaran_siswa::where('no_pendaftaran',$no_daftar)->first();

        // Jika status kosong, batalkan dengan pesan
        if ($data_pendaftaran->status == null) {
            return back()->with('pesan', 'Update Status Dahulu !');
        }

        // Cari data dari user id
        $user_yg_dituju = User::where('id', $data_pendaftaran->user_id)->first();
        $email = $user_yg_dituju->email;

        $data = [
            'title' => 'Status Pendaftaran',
            'from' => 'paragoncorp@gmail.com',
			'body'	=> 'Selamat </user> kamu telah diterima di Paragon Technology and Inovation DC Jambi'
        ];
        Mail::to($email)->send(new SendMail($data));
        return back()->with('pesan', 'Berhasil Kirim e-Mail !');
    }
}