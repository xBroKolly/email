@extends('homepage.layouts.app')

@section('title')
Persyaratan
@endsection
@section('header')

@endsection
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Persyaratan</h2>
              
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="/">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Persyaratan</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row justify-content-left">
                <div class="col-md-8">
                    Persyaratan
                    <div>
                    <img src="{{asset('/images/PARAGON.jpg')}}">                
                    </div>
                  </div>
            </div>
        </div>
    </div>
@stop
@section('footer')

@stop