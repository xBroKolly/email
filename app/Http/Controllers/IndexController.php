<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \App\Models\Datasekolah;


class IndexController extends Controller
{
    public function index()
    {
        return view('homepage.home');
    }

    public function pendaftaran()
    {
        return view('homepage.pendaftaran');
    }

    public function profil_sekolah()
    {
        $data = Datasekolah::where('id','1')->first();
        return view('homepage.profil_sekolah', compact('data'));
    }

    public function brosur()
    {
        return view('homepage.brosur');
    }

    public function persyaratan()
    {
        return view('homepage.persyaratan');
    }

    public function alur_psb()
    {
        return view('homepage.alur_psb');
    }

    public function login_siswa()
    {
        return view('homepage.login_siswa');
    }

    public function pendaftaran_submit(Request $request){
        
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'password_confirmation'=>'required|same:password'
        ]);
        $user = new \App\Models\User;
        $user->name    				= $request->name;
        $user->email                = $request->email;
        $user->password             = Hash::make($request->password_confirmation);
        $user->role              	= 'siswa';
        $user->save();
        
        return redirect('/pendaftaran/berhasil')->with('sukses','Pendaftaran berhasil');
        
    }

    public function pendaftaran_berhasil()
    {
        return view('homepage.pendaftaran_berhasil');
    }
}
