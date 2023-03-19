<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Pendaftaran_siswa;
use \App\Models\Upload_berkas;
use PDF;
class PendaftaranController extends Controller
{
    public function form_pendaftaran()
    {
    	$user_id = auth()->user()->id;
    	$cek = Pendaftaran_siswa::where('user_id',$user_id)->count();
        if($cek == 0){
            return view('pendaftaran.form');
        }elseif($cek == 1){
            $data_siswa = Pendaftaran_siswa::where('user_id',$user_id)->first();
            $cek_data_berkas = Upload_berkas::where('pendaftaran_siswa_id',$data_siswa->id)->count();
            $data_berkas = Upload_berkas::where('pendaftaran_siswa_id',$data_siswa->id)->first();
            return view('pendaftaran.berhasil',compact('data_siswa','data_berkas'));
        }
    }

    public function upload_berkas()
    {
    	$user_id = auth()->user()->id;
        $cek_data_siswa = Pendaftaran_siswa::where('user_id',$user_id)->count();
        if($cek_data_siswa == 1){
            $data_siswa = Pendaftaran_siswa::where('user_id',$user_id)->first();
            $cek_data_berkas = Upload_berkas::where('pendaftaran_siswa_id',$data_siswa->id)->count();
            $data_berkas = Upload_berkas::where('pendaftaran_siswa_id',$data_siswa->id)->first();
            if($cek_data_berkas == 0){
                return view('pendaftaran.upload_berkas',compact('data_siswa','cek_data_berkas','cek_data_siswa'));
            }elseif($cek_data_berkas == 1){
                return view('pendaftaran.upload_berkas_berhasil',compact('data_siswa','data_berkas'));
            }
        }else{
            return view('pendaftaran.upload_berkas',compact('cek_data_siswa'));
        }

    	
        
    }

    public function upload_berkas_admin($id)
    {
       // $user_id = auth()->user()->id;
        $data_siswa = Pendaftaran_siswa::where('id',$id)->first();
        $cek_data_berkas = Upload_berkas::where('pendaftaran_siswa_id',$data_siswa->id)->count();
        $data_berkas = Upload_berkas::where('pendaftaran_siswa_id',$data_siswa->id)->first();
        if($cek_data_berkas == 0){
            return view('pendaftaran.upload_berkas',compact('data_siswa'));
        }elseif($cek_data_berkas == 1){
            return view('pendaftaran.upload_berkas_berhasil',compact('data_siswa','data_berkas'));
        }
        
    }

    public function upload_berkas_submit(Request $request)
    {

    	$this->validate($request,[
            'pas_photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_ijazah'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_akta'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_kk'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'skhu'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $pas_photo = str_replace(' ','',$request->nama_lengkap).'_'.time().'.'.$request->pas_photo->extension();  
        $request->pas_photo->move(public_path('images/pas_photo'), $pas_photo);

        $foto_ijazah = str_replace(' ','',$request->nama_lengkap).'_'.time().'.'.$request->foto_ijazah->extension();  
        $request->foto_ijazah->move(public_path('images/foto_ijazah'), $foto_ijazah);

        $foto_akta = str_replace(' ','',$request->nama_lengkap).'_'.time().'.'.$request->foto_akta->extension();  
        $request->foto_akta->move(public_path('images/foto_akta'), $foto_akta);

        $foto_kk = str_replace(' ','',$request->nama_lengkap).'_'.time().'.'.$request->foto_kk->extension();  
        $request->foto_kk->move(public_path('images/foto_kk'), $foto_kk);

        $skhu = str_replace(' ','',$request->nama_lengkap).'_'.time().'.'.$request->skhu->extension();  
        $request->skhu->move(public_path('images/skhu'), $skhu);

        $berkas = new \App\Models\Upload_berkas;
        $berkas->pendaftaran_siswa_id   = $request->pendaftaran_siswa_id;
        $berkas->pas_photo              = $pas_photo;
        $berkas->foto_ijazah           = $foto_ijazah;
        $berkas->foto_akta              = $foto_akta;
        $berkas->foto_kk                = $foto_kk;
        $berkas->skhu                   = $skhu;
        $berkas->save();

        if(auth()->user()->role == 'admin'){
            return redirect('/data-pendaftaran')->with('sukses','Pendaftaran berhasil');
        }elseif(auth()->user()->role == 'siswa'){
            return redirect()->back()->with('sukses','Upload berhasil');
        }
    }

    public function upload_bukti(Request $request,$id)
    {

        $this->validate($request,[
            'foto_bukti'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $foto_bukti = str_replace(' ','',$request->nama_lengkap).'_'.time().'.'.$request->foto_bukti->extension();  
        $request->foto_bukti->move(public_path('images/foto_bukti'), $foto_bukti);

        $berkas = Upload_berkas::where('id',$id)->first();;
        $berkas->foto_bukti                   = $foto_bukti;
        $berkas->save();

        if(auth()->user()->role == 'admin'){
            return redirect('/data-pendaftaran')->with('sukses','Pendaftaran berhasil');
        }elseif(auth()->user()->role == 'siswa'){
            return redirect()->back()->with('sukses','Upload berhasil');
        }
    }

    public function psb_submit(Request $request){
        
        $this->validate($request,[
            'nama_lengkap'=>'required',
            'email'=>'required',
            'jenis_kelamin'=>'required',
            'tempat_lahir'=>'required',
            'tgl_lahir'=>'required',
            'bulan_lahir'=>'required',
            'tahun_lahir'=>'required',

            'anak_ke'=>'required',
            'jml_saudara'=>'required',
            'alamat'=>'required',
            'jurusan'=>'required',
            'tempat_tinggal'=>'required',
            'sekolah_sebelumnya'=>'required',
            'no_wa'=>'required',
            'lokasi'=>'required',

        ]);
        if(auth()->user()->role == 'siswa'){
        	$user_id = auth()->user()->id;
    	}elseif(auth()->user()->role == 'admin'){
    		$user_id = 0;
    	}

        $tgl_lahir = $request->tahun_lahir.'-'.$request->bulan_lahir.'-'.$request->tgl_lahir;

        $jml_inbox = Pendaftaran_siswa::all()->count();
        $nomor = Pendaftaran_siswa::latest('id')->first();
        $no = 1;
        if($jml_inbox > 0) {
            $format = sprintf("%04s", abs($nomor->no_pendaftaran + 1));
        }
        else {
            $format = sprintf("%04s", sprintf("%03s", $no));
        }

        $siswa = new \App\Models\Pendaftaran_siswa;
        $siswa->no_pendaftaran          = $format;
        $siswa->user_id    				= $user_id;
        $siswa->nama_lengkap    		= $request->nama_lengkap;
        $siswa->email                   = $request->email;
        $siswa->jenis_kelamin           = $request->jenis_kelamin;
        $siswa->tempat_lahir    		= $request->tempat_lahir;
        $siswa->tgl_lahir           	= $tgl_lahir;
        $siswa->anak_ke    				= $request->anak_ke;
        $siswa->jml_saudara           	= $request->jml_saudara;
        $siswa->alamat    				= $request->alamat;
        $siswa->jurusan           		= $request->jurusan;
        $siswa->tempat_tinggal    		= $request->tempat_tinggal;
        $siswa->sekolah_sebelumnya      = $request->sekolah_sebelumnya;
        $siswa->no_wa                   = $request->no_wa;
        $siswa->lokasi                   = $request->lokasi;
        $siswa->save();
        
        if(auth()->user()->role == 'admin'){
        	return redirect('/data-pendaftaran')->with('sukses','Pendaftaran berhasil');
        }elseif(auth()->user()->role == 'siswa'){
        	return redirect()->back()->with('sukses','Pendaftaran berhasil');
        }
        
    }

    public function cetak_form($no_daftar){
        $pendaftaran = Pendaftaran_siswa::where('no_pendaftaran',$no_daftar)->first();

        $pdf = PDF::loadView('pendaftaran.cetak_form',['pendaftaran' => $pendaftaran])->setPaper('legal','portrait');
        return $pdf->stream('pendaftaran_'.$pendaftaran->nama_lengkap.'_'.$pendaftaran->no_pendaftaran.'.pdf');
    }

    public function data_pendaftaran(){
        $pendaftaran = Pendaftaran_siswa::all();
        return view('data_pendaftaran.index',compact('pendaftaran'));
    }
    public function data_pendaftaran_tambah(){
        return view('pendaftaran.form');
    }

    public function data_pendaftaran_edit($no_daftar){
        $pendaftaran = Pendaftaran_siswa::where('no_pendaftaran',$no_daftar)->first();
        return view('data_pendaftaran.edit',compact('pendaftaran'));
    }

    public function data_pendaftaran_detail($no_daftar){
        $pendaftaran = Pendaftaran_siswa::where('no_pendaftaran',$no_daftar)->first();
        return view('data_pendaftaran.detail',compact('pendaftaran'));
    }

    public function data_pendaftaran_verifikasi(Request $request, $no_daftar){
        $siswa = Pendaftaran_siswa::where('no_pendaftaran',$no_daftar)->first();
        $siswa->status            = $request->status;
        $siswa->save();

        return redirect('/data-pendaftaran')->with('sukses','Pendaftaran berhasil Diedit');
    }

    public function data_pendaftaran_delete($id){
        $pendaftaran = Pendaftaran_siswa::where('id',$id)->first();
        $pendaftaran->delete();
        $jml_berkas = Upload_berkas::where('pendaftaran_siswa_id',$id)->count();

        if($jml_berkas > 0){
            $berkas = Upload_berkas::where('pendaftaran_siswa_id',$id)->first();
            $berkas->delete();
        }
        return response()->json(['sukses' => 'Data Berhasil dihapus']);
        
    }

    public function data_pendaftaran_edit_submit(Request $request, $no_daftar){
        $this->validate($request,[
            'nama_lengkap'=>'required',
            'email'=>'required',
            'jenis_kelamin'=>'required',
            'tempat_lahir'=>'required',
            'tgl_lahir'=>'required',
            'anak_ke'=>'required',
            'jml_saudara'=>'required',
            'alamat'=>'required',
            'jurusan'=>'required',
            'tempat_tinggal'=>'required',
            'sekolah_sebelumnya'=>'required',
            'no_wa'=>'required',
            'lokasi'=>'required',
        ]);

        $siswa = Pendaftaran_siswa::where('no_pendaftaran',$no_daftar)->first();
        $siswa->nama_lengkap            = $request->nama_lengkap;
        $siswa->email                   = $request->email;
        $siswa->jenis_kelamin           = $request->jenis_kelamin;
        $siswa->tempat_lahir            = $request->tempat_lahir;
        $siswa->tgl_lahir               = $request->tgl_lahir;
        $siswa->anak_ke                 = $request->anak_ke;
        $siswa->jml_saudara             = $request->jml_saudara;
        $siswa->alamat                  = $request->alamat;
        $siswa->jurusan                 = $request->jurusan;
        $siswa->tempat_tinggal          = $request->tempat_tinggal;
        $siswa->sekolah_sebelumnya      = $request->sekolah_sebelumnya;
        $siswa->no_wa                   = $request->no_wa;
        $siswa->lokasi                   = $request->lokasi;
        $siswa->save();

        return redirect('/data-pendaftaran')->with('sukses','Pendaftaran berhasil Diedit');
    }
}
