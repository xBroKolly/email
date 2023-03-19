<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Datasekolah;

class DatasekolahController extends Controller
{
    public function index()
    {
    	$data = Datasekolah::where('id','1')->first();
	    
        return view('data_sekolah.index',compact('data'));
    }

    public function edit_submit(Request $request,$id){

        $data = Datasekolah::where('id','1')->first();
        $data->update($request->all());
        
        return redirect('/data-sekolah')->with('sukses','Data berhasil dirubah');
    }
}
