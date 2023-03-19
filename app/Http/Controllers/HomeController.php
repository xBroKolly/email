<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Pendaftaran_siswa;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == 'admin'){
            $jml_mipa = Pendaftaran_siswa::where('jurusan','MAKE OVER')->count();
            $jml_ips = Pendaftaran_siswa::where('jurusan','EMINA')->count();
            $jml_ibu = Pendaftaran_siswa::where('jurusan','WARDAH')->count();
            return view('home',compact('jml_mipa','jml_ips' , 'jml_ibu'));
        }else{
        return view('home_siswa'); 
        }
        
    }
}
