<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
    	$user = User::all();
        return view('user.index',compact('user'));
    }

    public function tambah()
    {
        return view('user.tambah');
    }

    public function user_submit(Request $request){
        
        $this->validate($request,[
            'name'=>'required',
            'role'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'konfirmasi_password'=>'required|same:password'
        ]);
        $user = new User;
        $user->name    				= $request->name;
        $user->email                = $request->email;
        $user->password             = Hash::make($request->konfirmasi_password);
        $user->role              	= $request->role;
        $user->save();
        
        return redirect('/user')->with('sukses','Data user berhasil disimpan');
    }

    public function edit($id){
        $user = User::where('id',$id)->first();
        return view('user.edit',compact('user'));
    }

    public function edit_submit(Request $request,$id){
        
        $this->validate($request,[
            'name'=>'required',
            'role'=>'required',
            'email'=>'required|email',
            'konfirmasi_password'=>'same:password'
        ]);
        $user = User::where('id',$id)->first();
        if($request->password == '' and $request->konfirmasi_password == ''){
	        $user->name    				= $request->name;
	        $user->email                = $request->email;
	        $user->role              	= $request->role;
	        $user->save();
        }else{
	        $user->name    				= $request->name;
	        $user->email                = $request->email;
	        $user->role              	= $request->role;
	        $user->password             = Hash::make($request->konfirmasi_password);
	        $user->save();
        }
        
        
        return redirect('/user')->with('sukses','Data user berhasil disimpan');
    }

    public function delete($id){
        $user = User::where('id',$id)->first();
        $user->delete();
        return response()->json(['sukses' => 'Data Berhasil dihapus']);
    }
}
