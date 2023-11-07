@extends('layouts.nav-user')

@section('content')
<title>{{ config('app.name', 'Laravel') }} - Home</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <section class="hero-6 bg-center position-relative overflow-hidden"
    style="background-image: url({{ asset('landingpage/images/hero-6-bg.png') }});" id="home">
    <div class="container">
      <div class="row align-items-center mwc">
        <div class="col-lg-5" id="pencarian">
          <i class="mb-4 icon-lg sw-1_5 text-primary" style="display: none;" data-feather="sunrise"></i>
          <div class="mb-4 hero-6-title">
            <h1 class="fw-light mb-0 hero-6-title">Selamat Datang di
            </h1>
            <b class="text-gradient">HummaCertify</b>
          </div>
          <p class="mb-5 text-muted">Verifikasi keaslian sertifikat Anda dengan memasukkan kode sertifikat
            yang Anda terima</p>
          {{-- <a href="#" class="btn btn-primary me-2">Get Started <i class="icon-sm ms-1" data-feather="arrow-right"></i></a> --}}
          <form action="{{ route('search') }}" method="GET" id="searching">
            <div class="searchBox">
              <input class="searchInput" type="search" name="q" id="search" placeholder="Contoh: Ser/0001/0002/02/3112/2023"
                autocomplete="off" required>
              <button class="searchButton" href="#">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
          @error('q')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-lg-6 col-sm-10 mx-auto ms-lg-auto me-lg-0" id="gambar">
          <div class="mt-lg-0 mt-5">
            <img src="{{ asset('landingpage/images/image1.png') }}" alt="Asset Pelayanan kami" class="img-xl-responsive" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section" id="">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-lg-7 text-center">
          <h2 class="fw-bold text-gradient">Pelayanan Kami</h2>
          <p class="text-muted">Platform kami yang mengakomodasi Anda dalam menemukan dan memverifikasi
            sertifikat Hummatech Anda dengan cepat dan mudah, menegaskan keaslian setiap pencapaian</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="service-box text-center px-4 py-5 position-relative mb-4">
            <div class="service-box-content p-4">
              <div class="icon-mono service-icon avatar-md mx-auto mb-4">
                <i class="bx bx-cog fs-3"></i>
              </div>
              <h4 class="mb-3 font-size-22">Fungsi</h4>
              <p class="text-muted mb-0">Pencarian sertifikat adalah langkah kunci dalam memastikan keabsahan dokumen
                penting yang anda miliki</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="service-box text-center px-4 py-5 position-relative mb-4 active">
            <div class="service-box-content p-4">
              <div class="icon-mono service-icon avatar-md mx-auto mb-4">
                <i class="bx bx-book-reader fs-3"></i>
              </div>
              <h4 class="mb-3 font-size-22">Manfaat</h4>
              <p class="text-muted mb-0">Sertifikat adalah bukti konkrit pencapaian dan digunakan dalam berbagai
                konteks, seperti pekerjaan dll</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="service-box text-center px-4 py-5 position-relative mb-4">
            <div class="service-box-content p-4">
              <div class="icon-mono service-icon avatar-md mx-auto mb-4">
                <i class="bx bx-bulb fs-3"></i>
              </div>
              <h4 class="mb-3 font-size-22">Bukti</h4>
              <p class="text-muted mb-0">Sertifikat mewakili pengetahuan, keterampilan, atau status tertentu yang anda
                peroleh selama perjalanan hidup anda</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section bg-light" id="tentang">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-lg-7 text-center">
          <h2 class="fw-bold text-gradient">Tentang Website Kami</h2>
          <p class="text-muted">Apabila Anda menerima sertifikat magang dari Hummatech, Anda dapat memeriksa keaslian
            sertifikat tersebut dengan mengunjungi situs web resmi kami, yaitu HummaCertify</p>
        </div>
      </div>
      <div class="row align-items-center mb-5">
        <div class="col-md-5 order-2 order-md-1 mt-md-0 mt-5">
          <p class="text-muted mb-5">Sertifikat kelulusan magang adalah wujud pengakuan atas upaya dan dedikasi siswa
            magang yang telah menyelesaikan program mereka. Sertifikat khusus acara, di sisi lain, adalah bukti
            kehadiran atau kontribusi dalam
            acara-acara tertentu yang mungkin relevan dengan pengalaman magang.
            <br><br>
            Kami menghargai pentingnya sertifikat-sertifikat ini dalam perjalanan pendidikan dan karier siswa magang dan
            guru magang. Oleh karena itu, kami dengan sepenuh hati berkomitmen untuk membantu Anda memeriksa keaslian
            sertifikat-sertifikat ini
            melalui platform kami.
          </p>
        </div>
        <div class="col-md-6 ms-md-auto order-1 order-md-2 mb-costum">
          <div class="position-relative">
            <div class="ms-5 features-img">
              <img src="{{ asset('landingpage/images/image2.png') }}" alt="Asset About Me"
                class="img-fluid d-block mx-auto rounded" />
            </div>
            <img src="{{ asset('landingpage/images/dot-img.png') }}" alt="Titik-titik About Me" class="dot-img-left" />
          </div>
        </div>
      </div>
      <div class="row align-items-center atas-none section pb-0">
        <div class="col-md-6 mb-costum">
          <div class="position-relative mb-md-0 mb-5">
            <div class="me-5 features-img">
              <img src="{{ asset('landingpage/images/image3.png') }}" alt="Asset About Me kedua"
                class="img-fluid d-block mx-auto rounded" />
            </div>
            <img src="{{ asset('landingpage/images/dot-img.png') }}" alt="Titik-titik About Me kedua" class="dot-img-right" />
          </div>
        </div>
        <!-- end col -->
        <div class="col-md-5 ms-md-auto">
          <p class="text-muted mb-5">Dengan penggunaan platform kami, Anda dapat dengan mudah memastikan bahwa
            sertifikat kelulusan magang dan sertifikat khusus acara yang Anda miliki adalah resmi dan sah sesuai dengan
            ketentuan perusahaan kami.
            <br><br>
            Jadi, jika Anda adalah seorang siswa magang atau guru magang yang ingin memverifikasi sertifikat Anda,
            silakan manfaatkan platform kami dengan percaya diri. Kami siap membantu Anda dalam proses ini dan
            memastikan keaslian sertifikat-sertifikat
            tersebut. Terima kasih atas kepercayaan Anda kepada layanan kami.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="section bg-gradient-costum" id="contoh">
    <div class="bg-overlay-img"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="text-center">
            <h1 class="text-white mb-4">Contoh Sertifikat</h1>
            <p class="text-white font-size-16">Berikut ini adalah contoh sertifikat yang di dapat saat lulus PKL
              atau magang di HummaTech.</p>
          </div>
        </div>
        <div class="gallery">
          <div class="gallery-container">
            <img class="gallery-item gallery-item-1" src="{{ asset('image/gallery-1.png') }}" data-index="1"
              alt="gallery1">
            <img class="gallery-item gallery-item-2" src="{{ asset('image/gallery-2.png') }}" data-index="2"
              alt="gallery2">
            <img class="gallery-item gallery-item-3" src="{{ asset('image/gallery-3.png') }}" data-index="3"
              alt="gallery3">
          </div>
          <div class="gallery-controls">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section" style="display: none;" id="pricing">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-lg-7 text-center">
          <h2 class="fw-bold">Pricing Plan</h2>
          <p class="text-muted">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
            doloremque laudantium totam rem ab illo inventore.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="text-center mb-4 pricing-tab">
            <ul class="nav nav-pills rounded-pill justify-content-center d-inline-block shadow-sm" id="pricingpills-tab"
              role="tablist">
              <li class="nav-item d-inline-block">
                <a class="nav-link rounded-pill active" id="pills-monthly-tab" data-bs-toggle="pill"
                  href="#pills-monthly" role="tab" aria-controls="pills-monthly" aria-selected="true">Monthly</a>
              </li>
              <li class="nav-item d-inline-block">
                <a class="nav-link rounded-pill" id="pills-yearly-tab" data-bs-toggle="pill" href="#pills-yearly"
                  role="tab" aria-controls="pills-yearly" aria-selected="false">Yearly</a>
              </li>
            </ul>
          </div>
          <div class="tab-content" id="pricingpills-tabContent">
            <div class="tab-pane fade show active" id="pills-monthly" role="tabpanel"
              aria-labelledby="pills-monthly-tab">
              <div class="row">
                <div class="col-lg-4">
                  <div class="card plan-card mt-4 rounded text-center border-0 shadow overflow-hidden">
                    <div class="card-body px-4 py-5">
                      <!-- <div class="icon-mono avatar-md bg-soft-primary text-primary rounded mx-auto mb-5"><i class="icon-lg" data-feather="circle"></i></div> -->
                      <div class="icon-mono avatar-md bg-soft-primary rounded mx-auto mb-5 p-3">
                        {{-- <img src="images/pricing/1.png" alt="" class="img-fluid d-block mx-auto" /> --}}
                      </div>
                      <h4 class="text-uppercase mb-4 pb-1">Basic</h4>
                      <p class="text-muted">Onlinespace: <span class="fw-bold">50MB</span></p>
                      <p class="text-muted">Support: <span class="fw-bold">No</span></p>
                      <p class="text-muted mb-4 pb-1">Domain 1</p>
                      <p class="text-muted font-size-14 mb-1">All Extension Included</p>
                      <p class="font-size-16 font-weight-semibold mb-4 price-tag">$9.00 / Month
                      </p>
                      <a href="javascript: void(0);" class="btn btn-soft-primary">Buy Now</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card plan-card mt-4 rounded text-center border-0 shadow overflow-hidden">
                    <div class="card-body px-4 py-5">
                      <span class="badge badge-primary pricing-badge shadow-lg">Most
                        Popular</span>
                      <!-- <div class="icon-mono avatar-md bg-soft-primary text-primary rounded mx-auto mb-5"><i class="icon-lg" data-feather="square"></i></div> -->
                      <div class="icon-mono avatar-md bg-soft-primary rounded mx-auto mb-5 p-3">
                        {{-- <img src="images/pricing/2.png" alt="" class="img-fluid d-block mx-auto" /> --}}
                      </div>
                      <h4 class="text-uppercase mb-4 pb-1">Standard</h4>
                      <p class="text-muted">Onlinespace: <span class="fw-bold">100MB</span></p>
                      <p class="text-muted">Support: <span class="fw-bold">Yes</span></p>
                      <p class="text-muted mb-4 pb-1">Domain 1</p>
                      <p class="text-muted font-size-14 mb-1">All Extension Included</p>
                      <p class="font-size-16 font-weight-semibold mb-4 price-tag">$39.00 / Month
                      </p>
                      <a href="javascript: void(0);" class="btn btn-primary">Buy Now</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card plan-card mt-4 rounded text-center border-0 shadow overflow-hidden">
                    <div class="card-body px-4 py-5">
                      <!-- <div class="icon-mono avatar-md bg-soft-primary text-primary rounded mx-auto mb-5"><i class="icon-lg" data-feather="triangle"></i></div> -->
                      <div class="icon-mono avatar-md bg-soft-primary rounded mx-auto mb-5 p-3">
                        {{-- <img src="images/pricing/3.png" alt="" class="img-fluid d-block mx-auto" /> --}}
                      </div>
                      <h4 class="text-uppercase mb-4 pb-1">Premium</h4>
                      <p class="text-muted">Onlinespace: <span class="fw-bold">200MB</span></p>
                      <p class="text-muted">Support: <span class="fw-bold">No</span></p>
                      <p class="text-muted mb-4 pb-1">Domain 1</p>
                      <p class="text-muted font-size-14 mb-1">All Extension Included</p>
                      <p class="font-size-16 font-weight-semibold mb-4 price-tag">$79.00 / Month
                      </p>
                      <a href="javascript: void(0);" class="btn btn-soft-primary">Buy Now</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="pills-yearly" role="tabpanel" aria-labelledby="pills-yearly-tab">
              <div class="row">
                <div class="col-lg-4">
                  <div class="card plan-card mt-4 rounded text-center border-0 shadow overflow-hidden">
                    <div class="card-body px-4 py-5">
                      <!-- <div class="icon-mono avatar-md bg-soft-primary text-primary rounded mx-auto mb-5"><i class="icon-lg" data-feather="circle"></i></div> -->
                      <div class="icon-mono avatar-md bg-soft-primary rounded mx-auto mb-5 p-3">
                        {{-- <img src="images/pricing/1.png" alt="" class="img-fluid d-block mx-auto" /> --}}
                      </div>
                      <h4 class="text-uppercase mb-4 pb-1">Basic</h4>
                      <p class="text-muted">Onlinespace: <span class="fw-bold">50MB</span></p>
                      <p class="text-muted">Support: <span class="fw-bold">No</span></p>
                      <p class="text-muted mb-4 pb-1">Domain 1</p>
                      <p class="text-muted font-size-14 mb-1">All Extension Included</p>
                      <p class="font-size-16 font-weight-semibold mb-4 price-tag">$29.00 / Year
                      </p>
                      <a href="javascript: void(0);" class="btn btn-soft-primary">Buy Now</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card plan-card mt-4 rounded text-center border-0 shadow overflow-hidden">
                    <div class="card-body px-4 py-5">
                      <!-- <div class="icon-mono avatar-md bg-soft-primary text-primary rounded mx-auto mb-5"><i class="icon-lg" data-feather="square"></i></div> -->
                      <div class="icon-mono avatar-md bg-soft-primary rounded mx-auto mb-5 p-3">
                        {{-- <img src="images/pricing/2.png" alt="" class="img-fluid d-block mx-auto" /> --}}
                      </div>
                      <h4 class="text-uppercase mb-4 pb-1">Standard</h4>
                      <p class="text-muted">Onlinespace: <span class="fw-bold">100MB</span></p>
                      <p class="text-muted">Support: <span class="fw-bold">Yes</span></p>
                      <p class="text-muted mb-4 pb-1">Domain 1</p>
                      <p class="text-muted font-size-14 mb-1">All Extension Included</p>
                      <p class="font-size-16 font-weight-semibold mb-4 price-tag">$49.00 / Year
                      </p>
                      <a href="javascript: void(0);" class="btn btn-soft-primary">Buy Now</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card plan-card mt-4 rounded text-center border-0 shadow overflow-hidden">
                    <div class="card-body px-4 py-5">
                      <span class="badge badge-primary pricing-badge shadow-lg">Most
                        Popular</span>
                      <!-- <div class="icon-mono avatar-md bg-soft-primary text-primary rounded mx-auto mb-5"><i class="icon-lg" data-feather="triangle"></i></div> -->
                      <div class="icon-mono avatar-md bg-soft-primary rounded mx-auto mb-5 p-3">
                        {{-- <img src="images/pricing/3.png" alt="" class="img-fluid d-block mx-auto" /> --}}
                      </div>
                      <h4 class="text-uppercase mb-4 pb-1">Premium</h4>
                      <p class="text-muted">Onlinespace: <span class="fw-bold">200MB</span></p>
                      <p class="text-muted">Support: <span class="fw-bold">No</span></p>
                      <p class="text-muted mb-4 pb-1">Domain 1</p>
                      <p class="text-muted font-size-14 mb-1">All Extension Included</p>
                      <p class="font-size-16 font-weight-semibold mb-4 price-tag">$99.00 / Year
                      </p>
                      <a href="javascript: void(0);" class="btn btn-soft-primary">Buy Now</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section bg-light" style="display: none;" id="team">
    <div class="container">
      <div class="row justify-content-center mb-4">
        <div class="col-lg-7 text-center">
          <h2 class="fw-bold">Our Team Members</h2>
          <p class="text-muted">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
            doloremque laudantium totam rem ab illo inventore.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-sm-6">
          <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
            <div class="position-relative overflow-hidden">
              {{-- <img src="images/team/1.jpg" alt="" class="img-fluid d-block mx-auto" /> --}}
              <ul class="list-inline p-3 mb-0 team-social-item">
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-primary"><i class="icon-sm"
                      data-feather="facebook"></i></a>
                </li>
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-info"><i class="icon-sm"
                      data-feather="twitter"></i></a>
                </li>
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-danger"><i class="icon-sm"
                      data-feather="instagram"></i></a>
                </li>
              </ul>
            </div>
            <div class="p-4">
              <h5 class="font-size-19 mb-1">Frances Thompson</h5>
              <p class="text-muted text-uppercase font-size-14 mb-0">Developer</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6">
          <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
            <div class="position-relative overflow-hidden">
              {{-- <img src="images/team/2.jpg" alt="" class="img-fluid d-block mx-auto" /> --}}
              <ul class="list-inline p-3 mb-0 team-social-item">
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-primary"><i class="icon-sm"
                      data-feather="facebook"></i></a>
                </li>
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-info"><i class="icon-sm"
                      data-feather="twitter"></i></a>
                </li>
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-danger"><i class="icon-sm"
                      data-feather="instagram"></i></a>
                </li>
              </ul>
            </div>
            <div class="p-4">
              <h5 class="font-size-19 mb-1">John Jones</h5>
              <p class="text-muted text-uppercase font-size-14 mb-0">Ceo</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6">
          <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
            <div class="position-relative overflow-hidden">
              {{-- <img src="images/team/3.jpg" alt="" class="img-fluid d-block mx-auto" /> --}}
              <ul class="list-inline p-3 mb-0 team-social-item">
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-primary"><i class="icon-sm"
                      data-feather="facebook"></i></a>
                </li>
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-info"><i class="icon-sm"
                      data-feather="twitter"></i></a>
                </li>
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-danger"><i class="icon-sm"
                      data-feather="instagram"></i></a>
                </li>
              </ul>
            </div>
            <div class="p-4">
              <h5 class="font-size-19 mb-1">Della Hobbs</h5>
              <p class="text-muted text-uppercase font-size-14 mb-0">Designer</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6">
          <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
            <div class="position-relative overflow-hidden">
              {{-- <img src="images/team/4.jpg" alt="" class="img-fluid d-block mx-auto" /> --}}
              <ul class="list-inline p-3 mb-0 team-social-item">
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-primary"><i class="icon-sm"
                      data-feather="facebook"></i></a>
                </li>
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-info"><i class="icon-sm"
                      data-feather="twitter"></i></a>
                </li>
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-danger"><i class="icon-sm"
                      data-feather="instagram"></i></a>
                </li>
              </ul>
            </div>
            <div class="p-4">
              <h5 class="font-size-19 mb-1">Troy Jordon</h5>
              <p class="text-muted text-uppercase font-size-14 mb-0">Developer</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section" id="blog">
    <div class="container">
      <div class="row justify-content-center mb-4">
        <div class="col-lg-7 text-center">
          <h2 class="fw-bold text-gradient">Lulusan Magang Hummatech</h2>
          <p class="text-muted">Berikut contoh lulusan siswa magang kami yang telah meraih sertifikat sebagai pengakuan
            atas dedikasi dan prestasi luar biasa mereka</p>
        </div>
      </div>
      <div class="container container-lulus">
        <div class="scroller">
          <ul class="tag-list scroller__inner">
              <li>
                <div class="card card-lulus text-center">
                  <p class="nama text-truncate" style="max-width: 150px">Marshall West</p>
                  <p class="sekolah">Universitas Brawijaya</p>
                </div>
              </li>
              <li>
                <div class="card card-lulus text-center">
                  <p class="nama text-truncate" style="max-width: 150px">Winsonnnnn</p>
                  <p class="sekolah">UNPAS</p>
                </div>
              </li>
              <li>
                <div class="card card-lulus text-center">
                  <p class="nama text-truncate" style="max-width: 150px">Bills Comeback</p>
                  <p class="sekolah">UNPAD</p>
                </div>
              </li>
              <li>
                <div class="card card-lulus text-center">
                  <p class="nama text-truncate" style="max-width: 150px">Miguel Carls</p>
                  <p class="sekolah">BINUS</p>
                </div>
              </li>
              <li>
                <div class="card card-lulus text-center">
                  <p class="nama text-truncate" style="max-width: 150px">Caesar O'Connor</p>
                  <p class="sekolah">Politeknik Malang</p>
                </div>
              </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="section bg-center w-100 bg-light" style="background-image: url(images/cta-bg.png); display: none;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card bg-gradient-primary text-center border-0">
            <div class="bg-overlay-img" style="background-image: url(images/demos.png);"></div>
            <div class="card-body mx-auto p-sm-5 p-4">
              <div class="row justify-content-center">
                <div class="col-lg-10">
                  <div class="p-3">
                    <h2 class="text-white mb-4">Join our Growing Community</h2>
                    <p class="text-white-70 font-size-16 mb-4 pb-3">Far far away, behind the word
                      mountains, far from the countries Vokalia and Consonantia, there live the
                      blind texts.</p>
                    <a href="javascript: void(0);" class="btn btn-light rounded-pill">Sign Up for
                      free</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h2 class="fw-bold text-gradient mb-4 t">Hubungi Kami</h2>
          <p class="text-muted mb-3 t">Anda bisa hubungi kami, dengan mengirimkan pesan pada form dibawah ini. Terima
            Kasih!</p>

          <div>
            <form method="post" id="send-notif-form" name="myForm">
              @csrf
              <p id="error-msg"></p>
              <div id="simple-msg"></div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="mb-4" id="name-container">
                    <label for="name" class="text-muted form-label">Nama</label>
                    <input name="name" id="name" type="text" class="form-control"
                      placeholder="Masukkan nama" @auth value="{{ Auth::user()->name }}" @endauth required>
                    <p id="error-nama" class="text-danger"></p>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-4" id="email-container">
                    <label for="email" class="text-muted form-label">Email</label>
                    <input name="email" id="email" type="email" class="form-control"
                      placeholder="Masukkan email" @auth value="{{ Auth::user()->email }}" @endauth required>
                    <p id="error-email" class="text-danger"></p>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-4 pb-2" id="comments-container">
                    <label for="comments" class="text-muted form-label">Pesan</label>
                    <textarea name="message" id="comments" rows="10" class="form-control" placeholder="Masukkan pesan..."
                      required></textarea>
                    <p id="error-pesan" class="text-danger"></p>
                  </div>

                  <button type="submit" id="submit-button" name="send" class="btn btn-biru">
                    <span class="d-flex align-items-center">
                      <span class="flex-grow-1 me-2">
                        Kirim Pesan
                      </span>
                      <span class="spinner-border flex-shrink-0 d-none" role="status">
                        <span class="visually-hidden">Mengirim Pesan...</span>
                      </span>
                    </span>
                  </button>
                </div>
              </div>
            </form>
          </div>

        </div>

        <div class="col-lg-5 ms-lg-auto">
          <div class="mt-5 mt-lg-0">
            <img src="{{ asset('landingpage/images/kontak.png') }}" alt="Contact Me" class="img-fluid d-block" id="ktkgmr" />
            <p class="text-muted mt-5 mb-3"><i class="me-2 far fa-envelope text-muted icon icon-xs"></i>
              hummacertify@gmail.com</p>
            <p class="text-muted mb-3"><i class="me-2 text-muted icon icon-xs" data-feather="phone"></i>+91 123 4556
              789</p>
            <p class="text-muted mb-3"><i class="me-2 text-muted icon icon-xs" data-feather="map-pin"></i> Malang,
              Karangploso, Perum Permata</p>
            <ul class="list-inline pt-4 t">
              <li class="list-inline-item me-3">
                <a href="http://www.facebook.com/hummatech" class="social-icon icon-mono avatar-xs rounded-circle"><i
                    class="icon-xs" data-feather="facebook"></i></a>
              </li>
              <li class="list-inline-item me-3">
                <a href="http://www.youtube.com/@hummatech" class="social-icon icon-mono avatar-xs rounded-circle"><i
                    class="icon-xs" data-feather="youtube"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="http://www.instagram.com/hummatech" class="social-icon icon-mono avatar-xs rounded-circle"><i
                    class="icon-xs" data-feather="instagram"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="text-center text-light">
          <img src="{{ asset('landingpage/images/logo-footer.png') }}" class="gmr-footer" alt="Logo Footer">
          <h3>HummaCertify</h3>
          <p>HummaCertify bukti pengalaman anda</p>
        </div>
        <div class="col-lg-4" style="display: none;">
          <div class="mb-4">
            {{-- <a href="index-1.html"><img src="images/logo-light.png" alt="" class="" height="30" /></a> --}}
            <p class="text-white-50 my-4">At vero eos et accusamus et iusto odio dignissimos ducimus qui
              blanditiis praesentium voluptatum deleniti.</p>
          </div>
        </div>

        <div class="col-lg-7 ms-lg-auto" style="display: none;">
          <div class="row">
            <div class="col-lg-3 col-6">
              <div class="mt-4 mt-lg-0">
                <h4 class="text-white font-size-18 mb-3">Customer</h4>
                <ul class="list-unstyled footer-sub-menu">
                  <li><a href="javascript: void(0);" class="footer-link">Works</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Strategy</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Releases</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Press</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Mission</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="mt-4 mt-lg-0">
                <h4 class="text-white font-size-18 mb-3">Product</h4>
                <ul class="list-unstyled footer-sub-menu">
                  <li><a href="javascript: void(0);" class="footer-link">Trending</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Popular</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Customers</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Features</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="mt-4 mt-lg-0">
                <h4 class="text-white font-size-18 mb-3">Information</h4>
                <ul class="list-unstyled footer-sub-menu">
                  <li><a href="javascript: void(0);" class="footer-link">Developers</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Support</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Customer Service</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Get Started</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Guide</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="mt-4 mt-lg-0">
                <h4 class="text-white font-size-18 mb-3">Support</h4>
                <ul class="list-unstyled footer-sub-menu">
                  <li><a href="javascript: void(0);" class="footer-link">FAQ</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Contact</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Disscusion</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="d-flex justify-content-between text-light">
          <p><small>All rights reserved © 2023</small></p>
          <p><small>Dibuat Oleh Siswa HummaTech</small></p>
        </div>
      </div>
    </div>
  </footer>

  <script>
    const scrollers = document.querySelectorAll(".scroller");

    if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
      addAnimation();
    }

    function addAnimation() {
      scrollers.forEach((scroller) => {
        scroller.setAttribute('data-animated', true);

        const scrollerInner = scroller.querySelector('.scroller__inner');
        const scrollerContent = Array.from(scrollerInner.children);

        scrollerContent.forEach(item => {
          const duplicateItem = item.cloneNode(true);
          duplicateItem.setAttribute("aria-hidden", true);
          scrollerInner.appendChild(duplicateItem);
        })
      });
    }
  </script>
  
  {{-- <script>
    $("#search").on('keyup', function () {
        var search = $("#search").val();
        localStorage.setItem("search", search);
        console.log(search);
    });

    var restore = localStorage.getItem("search");
    $("#search").val(restore);
  </script> --}}
  <script>
    $(document).ready(function() {
      $("#searching").submit(function(event) {
        var searchInput = $(".searchInput");
        var errorMessage = $("#pencarian .text-danger");

        if (searchInput.val().trim() === "") {
          event.preventDefault();

          if (errorMessage.length === 0) {
            errorMessage = $("<p></p>");
            errorMessage.text("Input tidak boleh kosong!");
            errorMessage.addClass("text-danger");

            $("#pencarian").append(errorMessage);
          }
        } else {
          errorMessage.remove();
        }
      });

      var sendCount = localStorage.getItem('sendCount') || 0;

      $("#send-notif-form").on("submit", function(event) {
        event.preventDefault();

        var name = $("#name").val().toLowerCase().replace(/^\s+|\s+$/g, "");
        var email = $("#email").val().toLowerCase().replace(/^\s+|\s+$/g, "");
        var message = $("#comments").val();

        var nameContainer = $("#error-nama");
        var emailContainer = $("#error-email");
        var messageContainer = $("#error-pesan");

        var error = false;

        if (name === "") {
          nameContainer.text('Nama harus diisi.');
          error = true;
        } else if (name === "hummacertify") {
          nameContainer.text('Jangan menggunakan nama kami!');
          error = true;
        } else {
          nameContainer.text('');
        }

        if (email === "") {
          emailContainer.text('Email harus diisi.');
          error = true;
        } else if (email === "hummacertify@gmail.com") {
          emailContainer.text('Jangan menggunakan nama email kami!');
          error = true;
        } else {
          emailContainer.text('');
        }

        if (message === "") {
          messageContainer.text('Pesan harus diisi.');
          error = true;
        } else if (message.length > 5000) {
          messageContainer.text('Pesan tidak boleh lebih dari 5000 karakter.');
          error = true;
        } else {
          messageContainer.text('');
        }

        if (error) {
          return;
        }

        if (sendCount < 5) {
          $("#submit-button").attr('type', 'button');
          $("#submit-button .flex-grow-1").text("Loading...");
          $("#submit-button .spinner-border").removeClass("d-none");
          $.ajax({
            url: "{{ route('send_notif') }}",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
              console.log(response);
              if (response.error) {
                $("#simple-msg").empty();
                let errorList = '<ul>';
                $.each(response.error, function(field, messages) {
                  $.each(messages, function(key, message) {
                    errorList += '<li>' + message + '</li>';
                  });
                });
                errorList += '</ul>';

                $("#error-msg").html(
                  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>" +
                  "Terjadi  kesalahan:" + errorList +
                  '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                );

                $("#submit-button .flex-grow-1").text("Kirim Pesan");
                $("#submit-button .spinner-border").addClass("d-none");
              } else {
                $("#error-msg").empty();

                $("#simple-msg").html(
                  "<div class='alert alert-success alert-dismissible fade show' role='alert'>" + response
                  .success +
                  '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                );

                $("#send-notif-form")[0].reset();

                sendCount++;
                localStorage.setItem('sendCount', sendCount);

                $("#submit-button .flex-grow-1").text("Kirim Pesan");
                $("#submit-button .spinner-border").addClass("d-none");
              }
              $("#submit-button").attr('type', 'submit');
            },
            error: function(xhr, status, error) {
              $("#simple-msg").empty();
              $("#error-msg").html(
                "<div class='alert alert-danger alert-dismissible fade show' role='alert'>" +
                "Terjadi  kesalahan: " + error +
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
              );

              $("#submit-button .flex-grow-1").text("Kirim Pesan");
              $("#submit-button .spinner-border").addClass("d-none");
            }
          });
        } else {
          $("#simple-msg").empty();
          $("#error-msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert'>" +
            "Anda telah mencapai batas pengiriman pesan (5 kali)." +
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
          );
        }
      });
    });
  </script>

  <script>
    const galleryContainer = document.querySelector('.gallery-container');
    const galleryControlsContainer = document.querySelector('.gallery-controls');
    const galleryControls = ['p', 'n'];
    const galleryItems = document.querySelectorAll('.gallery-item');

    class Carousel {
      constructor(container, items, controls) {
        this.carouselContainer = container;
        this.carouselControls = controls;
        this.carouselArray = [...items];
      }

      updateGallery() {
        this.carouselArray.forEach(el => {
          el.classList.remove("gallery-item-1");
          el.classList.remove("gallery-item-2");
          el.classList.remove("gallery-item-3");
        });

        this.carouselArray.slice(0, 3).forEach((el, i) => {
          el.classList.add(`gallery-item-${i + 1}`);
        });
      }

      setCurrentState(direction) {
        if (direction.className == "gallery-controls-p") {
          this.carouselArray.unshift(this.carouselArray.pop());
        } else {
          this.carouselArray.push(this.carouselArray.shift());
        }
        this.updateGallery();
      }

      setControls() {
        this.carouselControls.forEach((control) => {
          galleryControlsContainer.appendChild(document.createElement("button")).className = `gallery-controls-${control}`;
          document.querySelector(`.gallery-controls-${control}`).innerText = '';
        });
      }

      useControls() {
        const triggers = [...galleryControlsContainer.childNodes];
        triggers.forEach(control => {
          control.addEventListener('click', (e) => {
            e.preventDefault();
            this.setCurrentState(control);
          });
        });
      }
    }

    const exampleCarousel = new Carousel(galleryContainer, galleryItems, galleryControls);

    exampleCarousel.setControls();
    exampleCarousel.useControls();
  </script>
@endsection
