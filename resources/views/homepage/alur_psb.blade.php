@extends('homepage.layouts.app')

@section('title')
Alur Pendaftaran
@endsection
@section('header')

@endsection
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Alur Pendaftaran</h2>
              
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="/">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Alur Pendaftaran</span>
      </div>
    </div>

    <DIV CLASS="SITE-SECTION">
        <DIV CLASS="CONTAINER">
            <DIV CLASS="ROW JUSTIFY-CONTENT-LEFT">
                <DIV CLASS="COL-MD-8">
                    ALUR PENDAFTARAN
                    <DIV>
                    <IMG SRC="{{ASSET('/IMAGES/alur.PNG')}}" WIDTH="1000" HEIGHT="1000">                
                    </DIV>
                  </DIV>
            </DIV>
        </DIV>
    </DIV>
@stop
@section('footer')

@stop