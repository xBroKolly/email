@extends('admin.layouts.master')

@section('title')
Dashboard
@endsection
@section('header')

@endsection
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
  </div>

  <h5>Selamat Datang, {{auth()->user()->name}}</h5>
  <hr>
  <center><h3>Jumlah Calon Beauty Advisor Terdaftar</h3></center>
  <div class="row">
  	<div class="col-md-4">
  		<div class="alert alert-info">
  			
  			<h3><center>MAKE OVER</center></h3>
  			<h4><center>{{$jml_mipa}}</center></h4>
  		</div>
  		<div class="col-md-4">
  		<div class="alert alert-info">
  			
  			<h3><center>EMINA</center></h3>
  			<h4><center>{{$jml_ips}}</center></h4>
  		</div>
  	</div>
  	<div class="col-md-4">
  		<div class="alert alert-info">
  			
  			<h3><center>WARDAH</center></h3>
  			<h4><center>{{$jml_ibu}}</center></h4>
  		</div>
  	</div>
  </div>
</main>
@endsection