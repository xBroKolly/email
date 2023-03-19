@extends('admin.layouts.master')

@section('title')
Data Sekolah
@endsection
@section('header')

@endsection
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data PARAGON DC JAMBI</h1>
  </div>
  @if ($errors->any())
     @foreach ($errors->all() as $error)
      <div class="alert alert-danger">{{$error}}</div>
     @endforeach
  @endif
  <form class="row" action="/data-sekolah/edit/{{$data->id}}/submit" method="post">
    @csrf
    <div class="row">
      <div class="col-md-6">
        <label><strong>Nomor Perusahaan</strong></label>
        <input type="text" name="nipsn" value="{{$data->nipsn}}" placeholder="Nama" class="form-control">
        <hr>
        <label><strong>Nama Perusahaan</strong></label>
        <input type="text" name="nama_sekolah" value="{{$data->nama_sekolah}}" placeholder="nama_sekolah" class="form-control">
        <hr>
        <label><strong>Tahun Berdiri</strong></label>
        <input type="text" name="dinas" value="{{$data->dinas}}" placeholder="dinas" class="form-control">
        <hr>
        <label><strong>Kabupaten</strong></label>
        <input type="text" name="kabupaten" value="{{$data->kabupaten}}" placeholder="kabupaten" class="form-control">
        <hr>
        <label><strong>Kecamatan</strong></label>
        <input type="text" name="kecamatan" value="{{$data->kecamatan}}" placeholder="kecamatan" class="form-control">
        <hr>
        <label><strong>Alamat</strong></label>
        <input type="text" name="alamat" value="{{$data->alamat}}" placeholder="alamat" class="form-control">
        <hr>
        <label><strong>Email</strong></label>
        <input type="email" name="email" value="{{$data->email}}" placeholder="email" class="form-control">
        
        
        
      </div>
      <div class="col-md-6">
        <label><strong>Website</strong></label>
        <input type="text" name="website" value="{{$data->website}}" placeholder="website" class="form-control">
        <hr>
        <label><strong>Bidang</strong></label>
        <input type="text" name="akreditasi" value="{{$data->akreditasi}}" placeholder="akreditasi" class="form-control">
        <hr>
        <label><strong>Nama Kepala Cabang</strong></label>
        <input type="text" name="nama_kepala_sekolah" value="{{$data->nama_kepala_sekolah}}" placeholder="nama_kepala_sekolah" class="form-control">
        <hr>
        <label><strong>NIP Kepala Cabang</strong></label>
        <input type="text" name="nip_kepala_sekolah" value="{{$data->nip_kepala_sekolah}}" placeholder="nip_kepala_sekolah" class="form-control">
        <hr>
        <label><strong>Tgl Pengumuman</strong></label>
        <input type="date" name="tgl_pengumuman" value="{{$data->tgl_pengumuman}}" placeholder="tgl_pengumuman" class="form-control">
        <hr>
        <label><strong>Jam Pengumuman</strong></label>
        <input type="text" name="jam_pengumuman" value="{{$data->jam_pengumuman}}" placeholder="jam_pengumuman" class="form-control">
        <hr>
        <label><strong>Jumlah Karyawan</strong></label>
        <input type="text" name="tahun_ajaran" value="{{$data->tahun_ajaran}}" placeholder="tahun_ajaran" class="form-control">
        
        <hr>
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
      </div>
    </div>
    
    
  </form>
  
</main>
@endsection