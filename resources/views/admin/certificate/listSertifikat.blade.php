@extends('layouts.nav-admin')

@section('content')
  <link rel="stylesheet" href="{{ asset('css/admin/AdminList.css') }}">
  <div class="container">
    <div class="card">
      <div class="accordion">
        <div class="accordion-item">
          <button class="accordion-button" style="color: white">Sertifikat Kelulusan</button>
          <div class="accordion-content" open>
            <div class="col-md-2">
                <img src="" alt="">
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <button class="accordion-button" style="color: white">Sertifikat Seminar</button>
          <div class="accordion-content">
            Content for Section 2 goes here.
          </div>
        </div>
        <div class="accordion-item">
          <button class="accordion-button" style="color: white">Sertifikat ---</button>
          <div class="accordion-content">
            Content for Section 3 goes here.
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
