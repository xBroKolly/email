@extends('homepage.layouts.app')

@section('title')
Pendaftaran
@endsection
@section('header')

@endsection
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Pendaftaran Berhasil</h2>
              
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="/">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Pendaftaran</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">


            <div class="row justify-content-center">
                <div class="col-md-8 alert alert-success">
                    <center>Pendaftaran Berhasil <br>
                    Silahkan Login menggunakan email dan password yang anda daftarkan</center>
                    <center><a href="/login-siswa" class="btn btn-info"> Login </a></center>
                </div>
            </div>
            

          
        </div>
    </div>
@stop
@section('footer')

@stop