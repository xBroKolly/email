@extends('homepage.layouts.app')

@section('title')
Brosur
@endsection
@section('header')

@endsection
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Brosur</h2>
              
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="/">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Brosur</span>
      </div>
    </div>

    <DIV CLASS="SITE-SECTION">
        <DIV CLASS="CONTAINER">
            <DIV CLASS="ROW JUSTIFY-CONTENT-LEFT">
                <DIV CLASS="COL-MD-8">
                    BROSUR
                    <DIV>
                    <IMG SRC="{{ASSET('/IMAGES/sekolah.png')}}">                
                    </DIV>
                  </DIV>
            </DIV>
        </DIV>
    </DIV>
@stop
@section('footer')

@stop