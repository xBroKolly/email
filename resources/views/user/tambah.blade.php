@extends('admin.layouts.master')

@section('title')
Tambah User
@endsection
@section('header')

@endsection
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah User</h1>
  </div>
  @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div class="alert alert-danger">{{$error}}</div>
     @endforeach
  @endif
  <form class="row" action="/user/tambah/submit" method="post">
    @csrf
    <div class="row">
      <div class="col-md-6">
        <label><strong>Nama</strong></label>
        <input type="text" name="name" value="{{old('name')}}" placeholder="Nama" class="form-control">
        <hr>
        <label><strong>Email</strong></label>
        <input type="email" name="email" value="{{old('email')}}" placeholder="email" class="form-control">
        <hr>
        <label><strong>Role</strong></label>
          <select name="role" class="form-control">
            <option value="">[Pilih]</option>
            <option value="admin">Admin</option>
            <option value="Calon Beauty Advisor">Calon Beauty Advisor</option>
          </select>
      </div>
      <div class="col-md-6">
        <label><strong>Password</strong></label>
        <input type="password" name="password" value="" class="form-control">
        <hr>
        <label><strong>Konfirmasi Password</strong></label>
        <input type="password" name="konfirmasi_password" value="" class="form-control">
        <hr>
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
      </div>
    </div>
    
    
  </form>
  
</main>
@endsection