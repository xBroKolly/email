@extends('homepage.layouts.app')

@section('title')
Profil Sekolah
@endsection
@section('header')

@endsection
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Profil Perushaan</h2>
              
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="/">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Profil Perusahaan</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row justify-content-left">
                <div class="col-md-8">
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Perusahaan</h1>
  </div>
  @if ($errors->any())
     @foreach ($errors->all() as $error)
      <div class="alert alert-danger">{{$error}}</div>
     @endforeach
  @endif
 
    @csrf
    <div class="row">
      <div class="col-md-6">
        <label><strong>Nomor Perusahaan</strong></label>
        <input type="text" readonly name="nipsn"placeholder="Nama" class="form-control" value="{{$data->nipsn}}">
        <hr>
        <label><strong>Nama Perusahaan</strong></label>
        <input type="text" readonly name="nama_sekolah"  placeholder="nama_sekolah" class="form-control" value="{{$data->nama_sekolah}}">
        <hr>
        <label><strong>Tahun Berdiri</strong></label>
        <input type="text" readonly name="dinas"  placeholder="dinas" class="form-control" value="{{$data->dinas}}">
        <hr>
        <label><strong>Kabupaten</strong></label>
        <input type="text" readonly name="kabupaten"  placeholder="kabupaten" class="form-control" value="{{$data->kabupaten}}">
        <hr>
        <label><strong>Kecamatan</strong></label>
        <input type="text" readonly name="kecamatan"  placeholder="kecamatan" class="form-control" value="{{$data->kecamatan}}">
        <hr>
        <label><strong>Alamat</strong></label>
        <input type="text" readonly name="alamat"  placeholder="alamat" class="form-control" value="{{$data->alamat}}">
        <hr>
        <label><strong>Email</strong></label>
        <input type="email" readonly name="email"  placeholder="email" class="form-control" value="{{$data->email}}">
        
        
        
      </div>
      <div class="col-md-6">
        <label><strong>Website</strong></label>
        <input type="text" readonly name="website"  placeholder="website" class="form-control" value="{{$data->website}}">
        <hr>
        <label><strong>Bidang</strong></label>
        <input type="text" readonly name="akreditasi" placeholder="akreditasi" class="form-control" value="{{$data->akreditasi}}">
        <hr>
        <label><strong>Nama Kepala Cabang</strong></label>
        <input type="text" readonly name="nama_kepala_sekolah"  placeholder="nama_kepala_sekolah" class="form-control" value="{{$data->nama_kepala_sekolah}}">
        <hr>
        <label><strong>NIP Kepala Cabang</strong></label>
        <input type="text" readonly name="nip_kepala_sekolah" placeholder="nip_kepala_sekolah" class="form-control" value="{{$data->nip_kepala_sekolah}}">
        <hr>
        <label><strong>Tgl Pengumuman</strong></label>
        <input type="date" readonly name="tgl_pengumuman"  placeholder="tgl_pengumuman" class="form-control" value="{{$data->tgl_pengumuman}}">
        <hr>
        <label><strong>Jam Pengumuman</strong></label>
        <input type="text" readonly name="jam_pengumuman"  placeholder="jam_pengumuman" class="form-control" value="{{$data->jam_pengumuman}}">
        <hr>
        <label><strong>Jumlah Karyawan</strong></label>
        <input type="text" readonly name="tahun_ajaran"placeholder="tahun_ajaran" class="form-control" value="{{$data->tahun_ajaran}}">
        
        <hr>
      
      </div>
    </div>
    
    
  </form>
  
</main>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer')

@stop