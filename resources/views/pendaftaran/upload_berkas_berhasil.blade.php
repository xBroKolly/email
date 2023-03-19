@extends('admin.layouts.master')

@section('title')
Upload Berkas Berhasil
@endsection
@section('header')

@endsection
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Upload Berkas</h4>
  </div>
@if(auth()->user()->role == 'siswa')
  @if($data_siswa->status == null)
    <div class="alert alert-warning"><h4>Upload Berkas Berhasil, sedang dalam proses Verifikasi</h4></div>
  @elseif($data_siswa->status == 'Diterima')
    <div class="alert alert-success"><h4>Berkas Telah diverifikasi, selamat anda lolos ketahap berikutnya</h4></div>
  @elseif($data_siswa->status == 'Ditolak')
    <div class="alert alert-danger"><h4>Berkas Telah diverifikasi, Maaf pendaftaran anda ditolak</h4></div>
  @endif
@else
  <a href="/data-pendaftaran" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
@endif
  <hr>

  <table class="table table-bordered">
    <tr>
      <td>Nama / No. Pendaftaran</td>
      <td>Pas Foto 3x4</td>
      <td>Foto Ijazah</td>
      <td>Foto Akta</td>
      <td>Foto KK</td>
      <td>Foto Full Body</td>
      <td>Foto Bukti</td>
    </tr>
    <tr>
      <td>{{$data_siswa->nama_lengkap}} / {{$data_siswa->no_pendaftaran}}</td>
      <td><a href="{{asset('images/pas_photo/'.$data_berkas->pas_photo)}}" target="_blank"><img src="{{asset('images/pas_photo/'.$data_berkas->pas_photo)}}" width="100px"></a></td>
      <td><a href="{{asset('images/foto_ijazah/'.$data_berkas->foto_ijazah)}}" target="_blank"><img src="{{asset('images/foto_ijazah/'.$data_berkas->foto_ijazah)}}" width="100px"></a></td>
      <td><a href="{{asset('images/foto_akta/'.$data_berkas->foto_akta)}}" target="_blank"><img src="{{asset('images/foto_akta/'.$data_berkas->foto_akta)}}" width="100px"></a></td>
      <td><a href="{{asset('images/foto_kk/'.$data_berkas->foto_kk)}}" target="_blank"><img src="{{asset('images/foto_kk/'.$data_berkas->foto_kk)}}" width="100px"></a></td>
      <td><a href="{{asset('images/skhu/'.$data_berkas->skhu)}}" target="_blank"><img src="{{asset('images/skhu/'.$data_berkas->skhu)}}" width="100px"></a></td>
      <td><a href="{{asset('images/foto_bukti/'.$data_berkas->foto_bukti)}}" target="_blank"><img src="{{asset('images/foto_bukti/'.$data_berkas->foto_bukti)}}" width="100px"></a></td>
    </tr>
  </table>
  

</main>
@endsection