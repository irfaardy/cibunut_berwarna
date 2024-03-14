@extends('layouts.master_template')

@section('content')
<style>
  .force-img{
    background-image:url('{{url('images/landing/'.\App\Helper\CMS::getContent('LND-001','image'))}}') !important;
  }
  </style>
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center force-img justify-content-center" >
    <div class="container" data-aos="fade-up">
        {!!\App\Helper\CMS::getContent('LND-001','description')!!}
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="{{url('images/landing/'.\App\Helper\CMS::getContent('LND-002','image'))}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
            {!!\App\Helper\CMS::getContent('LND-002','description')!!}
          </div>
        </div>

      </div>
    </section><!-- End About Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Berita</h2>
          <p>Berita terkini Cibunut Berwarna</p>
        </div>

        <div class="row">
          @foreach($berita as $item)

          
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <a href="{{url('berita/detail/'.$item->seo_url)}}">
              <div class="icon-box">
                <div style="background: url('{{url('images/'.$item->thumbnail)}}'); min-width:100%; min-height:150px; background-size:100%; width:100%"></div>
                <h4><a href="{{url('berita/detail/'.$item->seo_url)}}">{{$item->title}}</a></h4>
                <p>{{Str::limit(strip_tags($item->description),120)}}</p>
                <small><b>Dipublikasikan pada:</b> <br> {{date('Y-m-d H:i:s',strtotime($item->created_at))}}</small>
              </div>
            </a>
            </div>

            


            @endforeach

        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Produk</h2>
          <p>Produk menarik kami</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
          
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          @foreach($produk as $p)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{url('images/'.$p->thumbnail)}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>{{$p->nama_produk}}</h4>
                <p>{{$p->nama_produk}}</p>
                <div class="portfolio-links">
                  <a href="{{url('images/'.$p->thumbnail)}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="{{url('product/detail/'.$p->seo_url)}}" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kontak</h2>
          <p>Kontak Kami</p>
        </div>

        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!4m6!3m5!1s0x2e68e62da93ee3a1:0x52acf6c4561b3b4a!8m2!3d-6.9198193!4d107.6182232!16s%2Fg%2F11gdkzxl69?entry=ttu" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p> Gg. Cibunut Utara, Kb. Pisang, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40112</p>
              </div>


              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>0878-2566-2425</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
@endsection
