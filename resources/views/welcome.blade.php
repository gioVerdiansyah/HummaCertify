@extends('layouts.nav-user')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Home</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <section class="hero-6 bg-center position-relative overflow-hidden"
    style="background-image: url({{ asset('landingpage/images/hero-6-bg.png') }});" id="home">
    <div class="container">
      <div class="row align-items-center mwc">
        <div class="col-lg-5" id="pencarian">
          <div class="mb-4 hero-6-title">
            <h1 class="fw-light mb-0 hero-6-title">Selamat Datang di</h1>
            <b class="text-gradient">HummaCertify</b>
          </div>
          <p class="mb-5 text-muted">Verifikasi keaslian sertifikat Anda dengan memasukkan kode sertifikat yang Anda
            terima</p>
          <form action="{{ route('search') }}" method="GET" id="searching">
            <div class="searchBox">
              <input class="searchInput" type="search" name="q" id="search"
                placeholder="Contoh: Ser/0001/0002/02/3112/2023" autocomplete="off" required>
              <button class="searchButton" href="#" aria-label="search">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
          @error('q')
            <p class="text-danger ms-4">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-lg-6 col-sm-10 mx-auto ms-lg-auto me-lg-0" id="gambar">
          <div class="mt-lg-0 mt-5">
            <img src="{{ asset('landingpage/images/image1.png') }}" alt="Asset Pelayanan kami"
              class="img-xl-responsive" />
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
              <h2 class="mb-3 font-size-22">Fungsi</h2>
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
              <h3 class="mb-3 font-size-22">Manfaat</h3>
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
          <h2 class="fw-bold text-gradient mb-4">Tentang Website Kami</h2>
          <p class="text-muted">Apabila Anda menerima sertifikat magang dari Hummatech, Anda dapat memeriksa keaslian
            sertifikat tersebut dengan mengunjungi situs web resmi kami, yaitu HummaCertify</p>
        </div>
      </div>
      <div class="row align-items-center mb-5">
        <div class="col-md-5 order-2 order-md-1 mt-md-0 mt-5 ctr">
          <p class="text-muted mb-4">Sertifikat kelulusan magang adalah wujud pengakuan atas upaya dan dedikasi siswa
            magang yang telah menyelesaikan program mereka. Sertifikat khusus acara, di sisi lain, adalah bukti
            kehadiran atau kontribusi dalam
            acara-acara tertentu yang mungkin relevan dengan pengalaman magang.
          </p>
          <p class="text-muted mb-5">
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
            <img src="{{ asset('landingpage/images/dot-img.png') }}" alt="Titik-titik About Me kedua"
              class="dot-img-right" />
          </div>
        </div>
        <!-- end col -->
        <div class="col-md-5 ms-md-auto ctr">
          <p class="text-muted mb-4">Dengan penggunaan platform kami, Anda dapat dengan mudah memastikan bahwa
            sertifikat kelulusan magang dan sertifikat khusus acara yang Anda miliki adalah resmi dan sah sesuai dengan
            ketentuan perusahaan kami.
          </p>
          <p class="text-muted mb-5">
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

  <section class="section" style="padding-bottom: 50px;" id="blog">
    <div class="container">
      <div class="row justify-content-center mb-4">
        <div class="col-lg-7 text-center">
          <h2 class="fw-bold text-gradient mb-3">Lulusan Magang Hummatech</h2>
          <p class="text-muted text-panjang">Berikut contoh lulusan siswa magang kami yang telah meraih sertifikat
            sebagai pengakuan
            atas dedikasi dan prestasi luar biasa mereka</p>
        </div>
      </div>
      <div class="container container-lulus">
        <div class="scroller">
          <ul class="tag-list scroller__inner">
            @if (count($userCertificate) > 3)
              @foreach ($userCertificate as $data)
                <li>
                  <div class="card card-lulus text-center">
                    <p class="nama text-truncate">{{ $data->name }}</p>
                    <p class="sekolah text-truncate">{{ $data->institusi }}</p>
                  </div>
                </li>
              @endforeach
            @else
              <li>
                <div class="card card-lulus text-center">
                  <p class="nama text-truncate">Marshall West</p>
                  <p class="sekolah text-truncate">Universitas Brawijaya</p>
                </div>
              </li>
              <li>
                <div class="card card-lulus text-center">
                  <p class="nama text-truncate">Winsonnnnn</p>
                  <p class="sekolah text-truncate">UNPAS</p>
                </div>
              </li>
              <li>
                <div class="card card-lulus text-center">
                  <p class="nama text-truncate">Bills Comeback</p>
                  <p class="sekolah text-truncate">UNPAD</p>
                </div>
              </li>
              <li>
                <div class="card card-lulus text-center">
                  <p class="nama text-truncate">Miguel Carls</p>
                  <p class="sekolah text-truncate">BINUS</p>
                </div>
              </li>
              <li>
                <div class="card card-lulus text-center">
                  <p class="nama text-truncate">Caesar O'Connor</p>
                  <p class="sekolah text-truncate">Politeknik Malang</p>
                </div>
              </li>
            @endif
          </ul>
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

          <div class="frm">
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
                  <div class="mb-2" id="comments-container">
                    <label for="comments" class="text-muted form-label">Pesan</label>
                    <textarea name="message" id="comments" rows="10" class="form-control" placeholder="Masukkan pesan..."
                      required></textarea>
                    <p id="error-pesan" class="text-danger"></p>
                  </div>
                  <button type="submit" id="submit-button" name="send" class="btn btn-biru"
                    aria-label="Kirim Pesan">
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

        <div class="col-lg-5 ms-lg-auto" id="social">
          <div class="mt-5 mt-lg-0">
            <img src="{{ asset('landingpage/images/kontak.png') }}" alt="Contact Me" class="img-fluid d-block"
              id="ktkgmr" />
            <p class="text-muted mt-5 mb-3"><i
                class="me-2 mb-0 far fa-envelope text-muted icon-xs"></i>hummacertify@gmail.com</p>
            <p class="text-muted mb-3"><i class="me-2 mb-0 text-muted icon icon-xs" data-feather="phone"></i>+91 123
              4556 789</p>
            <p class="text-muted mb-3"><i class="me-2 mb-0 text-muted icon icon-xs" data-feather="map-pin"></i>Malang,
              Karangploso, Perum Permata</p>
            <ul class="list-inline pt-4 t">
              <li class="list-inline-item me-3">
                <a href="http://www.facebook.com/hummatech" class="social-icon icon-mono avatar-xs rounded-circle"
                  aria-label="Visit our Facebook page">
                  <i class="icon-xs" data-feather="facebook"></i>
                </a>
              </li>
              <li class="list-inline-item me-3">
                <a href="http://www.youtube.com/@hummatech" class="social-icon icon-mono avatar-xs rounded-circle"
                  aria-label="Visit our YouTube channel">
                  <i class="icon-xs" data-feather="youtube"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="http://www.instagram.com/hummatech" class="social-icon icon-mono avatar-xs rounded-circle"
                  aria-label="Visit our Instagram profile">
                  <i class="icon-xs" data-feather="instagram"></i>
                </a>
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
      tambahkanAnimasi();
    }

    function tambahkanAnimasi() {
      scrollers.forEach((scroller) => {
        scroller.setAttribute("data-animated", true);

        const scrollerInner = scroller.querySelector(".scroller__inner");
        const scrollerContent = Array.from(scrollerInner.children);

        const totalWidth = scrollerContent.reduce(
          (acc, item) => acc + item.offsetWidth,
          0
        );

        const durasiAnimasi = totalWidth / 40;

        scrollerInner.style.animationDuration = `${durasiAnimasi}s`;

        scrollerContent.forEach((item) => {
          const duplicateItem = item.cloneNode(true);
          duplicateItem.setAttribute("aria-hidden", true);
          scrollerInner.appendChild(duplicateItem);
        });
      });
    }
  </script>
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
            errorMessage.addClass("ms-4");

            $("#pencarian").append(errorMessage);
          }
        } else {
          errorMessage.remove();
        }
      });

      var sendCount = parseInt(localStorage.getItem('sendCount')) || 0;
      var lastResetTime = parseInt(localStorage.getItem('lastResetTime')) || new Date().getTime();
      var currentTime = new Date().getTime();

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
              if (response.error) {
                $("#simple-msg").empty();
                Object.entries(response.error).forEach(([key, value]) => {
                  switch (key) {
                    case 'name':
                      nameContainer.text(value);
                      break;
                    case 'email':
                      emailContainer.text(value);
                      break;
                    case 'message':
                      messageContainer.text(value);
                      break;
                  }
                });
                $("#submit-button .flex-grow-1").text("Kirim Pesan");
                $("#submit-button .spinner-border").addClass("d-none");
              } else {
                if (!localStorage.getItem('lastResetTime')) {
                  localStorage.setItem('lastResetTime', new Date().getTime());
                }
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
              console.log(xhr.status);
              $("#simple-msg").empty();

			  if(xhr.status == 429){
                error = "Harap tunggu 1 menit untuk mengirim lagi"
              }

              if (error == "unknown status") {
                error = "Cobalah refresh halaman"
              }
              $("#error-msg").html(
                "<div class='alert alert-danger alert-dismissible fade show' role='alert'>" +
                "Terjadi  kesalahan: " + error +
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
              );

              $("#submit-button .flex-grow-1").text("Kirim Pesan");
              $("#submit-button .spinner-border").addClass("d-none");
              $("#submit-button").attr('type', 'submit');
            }
          });
        } else {
            $("#simple-msg").empty();
            $("#error-msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert'>" +
              "Anda telah mencapai batas pengiriman pesan (5 kali)." +
              '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
              );
              var today = new Date();
              var lastResetDate = new Date(lastResetTime);

            if (today.getDate() !== lastResetDate.getDate() || today.getMonth() !== lastResetDate.getMonth() || today.getFullYear() !== lastResetDate.getFullYear()) {
              console.log('Batasan harian telah tercapai. Menyetel ulang waktu terakhir.');

              lastResetTime = currentTime;
              sendCount = 0;

              localStorage.setItem('sendCount', sendCount);
              localStorage.setItem('lastResetTime', lastResetTime);
          }
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
          const button = document.createElement("button");
          button.className = `gallery-controls-${control}`;

          // Tambahkan atribut aria-label atau teks langsung ke dalam tombol
          if (control === 'p') {
            button.setAttribute('aria-label', 'Previous');
          } else if (control === 'n') {
            button.setAttribute('aria-label', 'Next');
          }

          galleryControlsContainer.appendChild(button);
          button.innerText = '';
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

  <div class="instant-up" id="goUp">
    <i class="fa-solid fa-arrow-up fa-fade"></i>
  </div>
@endsection
