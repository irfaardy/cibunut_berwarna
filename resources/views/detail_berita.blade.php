@extends('layouts.master_template_general')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>{{$berita->title}}</h2>
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>{{$berita->title}}</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <div class="row">
            <div class="col-12">
                <div align="center">
                    <img src="{{url('images/'.$berita->thumbnail)}}" width="400px">
                </div>
            </div>
        </div>
        {!!$berita->description!!}
      </div>
    </section>

  </main><!n -->
@endsection
