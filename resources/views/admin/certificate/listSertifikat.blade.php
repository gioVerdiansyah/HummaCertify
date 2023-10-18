@extends('layouts.nav-user')

@section('content')
  <link rel="stylesheet" href="{{ asset('css/admin/AdminList.css') }}">
  <div class="card">
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button style="background-color: #00B1F0; color: white" class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Sertifikat Kelulusan
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <div class="row">
              <div class="col-md-3 mt-3">
                <div class="image-container-list">
                  <img width="100%" src="{{ asset('image/certificate-bg.png') }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button style="background-color: #00B1F0; color: white" class="accordion-button fw-bold" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Sertifikat Seminar
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <div class="row">
                <div class="col-md-3 mt-3">
                  <div class="image-container-list">
                    <img width="100%" src="{{ asset('image/certificate-bg.png') }}" alt="">
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button style="background-color: #00B1F0; color: white" class="accordion-button fw-bold" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Sertifikat ---
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <div class="row">
                <div class="col-md-3 mt-3">
                  <div class="image-container-list">
                    <img width="100%" src="{{ asset('image/certificate-bg.png') }}" alt="">
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    const buttons = document.querySelectorAll(".accordion-button");

    buttons.forEach((button) => {
      button.addEventListener("click", function() {
        const content = this.nextElementSibling;
        if (content.style.display === "block") {
          content.style.display = "none";
        } else {
          content.style.display = "block";
          buttons.forEach((btn) => {
            if (btn !== this) {
              btn.nextElementSibling.style.display = "none";
            }
          });
        }
      });
    });
  </script>
@endsection
