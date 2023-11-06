@extends('layouts.nav-admin')

@section('content')
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link rel="stylesheet" href="{{ asset('css/admin/template.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <div class="container-css">
    <div class="not-available">
      <h3 class="not-title">Ukuran layar ini tidak di dukung</h2>
    </div>
    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="top-content">
        <div class="left-side">
          <div class="header-card">
            <span class="first-title text-start">Upload Latar Belakang</span>
            <span class="second-title text-end text-info"><box-icon name='error-circle' color='#29BADB' class="warn-icon"></box-icon>Ukuran A4 3508px X 2480px</span>
          </div>
          <hr class="line-header">
          <div class="body-card">
            <div class="left-drop">
              <span class="drop-header">Latar belakang (Depan)</span>
              <input type="file" name="depan" id="file" />
              <div class="upload-area @error('depan') is-invalid @enderror" id="uploadfile">
                @error('depan')
                  <span>Error: Only images are allowed</span>
                @else
                  <span>Jatuhkan file disini atau klik untuk menggungah</span>
                @enderror
              </div>
            </div>
            <div class="right-drop">
              <span class="drop-header">Latar belakang (Belakang)</span>
              <input type="file" name="belakang" id="file2" />
              <div class="upload-area2 @error('belakang') is-invalid @enderror" id="uploadfile2">
                @error('belakang')
                  <span>Error: Only images are allowed</span>
                @else
                  <span>Jatuhkan file disini atau klik untuk menggungah</span>
                @enderror
              </div>
            </div>
          </div>
        </div>
        <div class="right-side">
          <div class="header-card">
            <span class="first-title text-start">Kategori</span>
          </div>
          <hr class="line-header">
          <div class="body-card">
            <div class="mb-3">
              <label for="namaKategori">Nama Kategori</label>
              <input type="text" name="namaKategori" class="form-control @error('namaKategori') is-invalid @enderror" placeholder="Nama kategori" value="{{ old('namaKategori') }}" required>
              @error('namaKategori')
                <div class="invalid-feedback">
                  <p>{{ $message }}</p>
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="namaKategori">Tata Letak</label>
              <select name="tataletak" id="tataLetak" class="form-select @error('tataletak') is-invalid @enderror" required>
                <option disabled value="tataletak" selected>Pilih tata letak depan</option>
                <option value="Kelulusan" {{ old('tataletak') == "Kelulusan" ? 'selected' : '' }}>Kelulusan</option>
                <option value="Pelatihan" {{ old('tataletak') == "Pelatihan" ? 'selected' : '' }}>Pelatihan</option>
                <option value="Kompetensi" {{ old('tataletak') == "Kompetensi" ? 'selected' : '' }}>Kompetensi</option>
              </select>
              @error('tataletak')
                <div class="invalid-feedback">
                  <p>{{ $message }}</p>
                </div>
              @enderror
            </div>
            <div class="card-button">
                <button type="button" id="preview-button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#preview" disabled>Preview</button>
              <button type="submit" id="simpan" class="btn btn-primary" disabled>Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <div class="modal fade" id="preview" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title fw-bold" id="myExtraLargeModalLabel">Preview</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <hr class="modal-line">
          <div id="modal-body" class="modal-body p-0 d-flex justify-content-center align-items-center">
            <link rel="stylesheet" href="{{ asset('css/user/load-image.css') }}">
            <div class="image-item">
              <img id="loadpreview" src="{{ asset('image/Loading-logo.png') }}" alt="Loading Logo">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    let backgroundDepan;
    let backgroundBelakang;

    $(function() {
      var maxFileSize = 2 * 1024 * 1024;
      $(".upload-area").on("dragenter", function(e) {
        e.stopPropagation();
        e.preventDefault();
        $(".upload-area").css({
          border: "2px solid lightgray"
        });
      });

      $(".upload-area").on("dragover", function(e) {
        e.stopPropagation();
        e.preventDefault();
        $(".upload-area").css({
          border: "2px solid lightgray"
        });
      });

      $(".upload-area").on("dragleave", function(e) {
        e.stopPropagation();
        e.preventDefault();
        $(".upload-area").css({
          border: "2px dashed lightgray"
        });
      });

      $(".upload-area").on("drop", function(e) {
        e.stopPropagation();
        e.preventDefault();

        var file = e.originalEvent.dataTransfer.files;
        // backgroundDepan = file;

        var dropFirst = document.getElementById("file");
        dropFirst.files = file;

        if (!file[0].type.startsWith("image/")) {
          $(".upload-area span").text("Error: Only images are allowed");
          return;
        }

        if (file[0].size > maxFileSize) {
          $(".upload-area span").text("Error: Maximum file size is 2 MB");
          return;
        }

        addThumbnail(file[0]);
      });

      $("#uploadfile").click(function() {
        $("#file").click();
      });

      $("#file").change(function() {
        var files = $("#file")[0].files[0];
        backgroundDepan = files;

        if (!files.type.startsWith("image/")) {
          $(".upload-area span").text("Error: Only images are allowed");
          return;
        }

        if (files.size > maxFileSize) {
          $(".upload-area span").text("Error: Maximum file size is 2 MB");
          return;
        }

        addThumbnail(files);
      });
    });

    function addThumbnail(file) {
      $("#uploadfile span").remove();
      var len = $("#uploadfile div.thumbnail").length;
      var num = Number(len);
      num = num + 1;

      var name = file.name;
      var size = convertSize(file.size);

      var reader = new FileReader();

      reader.onload = function(e) {
        var src = e.target.result;
        backgroundDepan = src;
        $("#uploadfile").css("background-image", "url(" + src + ")");
        $("#depan-preview").css("background-image", "url(" + src + ")");

        // $("#uploadfile").append('<p class="size">' + size + "</p>");
      };

      reader.readAsDataURL(file);
    }

    function convertSize(size) {
      var sizes = ["Bytes", "KB", "MB", "GB", "TB"];
      if (size == 0) return "0 Byte";
      var i = parseInt(Math.floor(Math.log(size) / Math.log(1024)));
      return Math.round(size / Math.pow(1024, i), 2) + " " + sizes[i];
    }

    $(function() {
      var maxFileSize = 2 * 1024 * 1024;
      $(".upload-area2").on("dragenter", function(e) {
        e.stopPropagation();
        e.preventDefault();
        $(".upload-area2").css({
          border: "2px solid lightgray"
        });
      });

      $(".upload-area2").on("dragover", function(e) {
        e.stopPropagation();
        e.preventDefault();
        $(".upload-area2").css({
          border: "2px solid lightgray"
        });
      });

      $(".upload-area2").on("dragleave", function(e) {
        e.stopPropagation();
        e.preventDefault();
        $(".upload-area2").css({
          border: "2px dashed lightgray"
        });
      });

      $(".upload-area2").on("drop", function(e) {
        e.stopPropagation();
        e.preventDefault();

        var file = e.originalEvent.dataTransfer.files;
        // backgroundBelakang = file;

        var dropSecond = document.getElementById("file2");
        dropSecond.files = file;

        if (!file[0].type.startsWith("image/")) {
          $(".upload-area2 span").text("Error: Only images are allowed");
          return;
        }

        if (file[0].size > maxFileSize) {
          $(".upload-area2 span").text("Error: Maximum file size is 2 MB");
          return;
        }

        addThumbnail2(file[0]);
      });

      $("#uploadfile2").click(function() {
        $("#file2").click();
      });

      $("#file2").change(function() {
        var files = $("#file2")[0].files[0];
        backgroundBelakang = files;

        if (!files.type.startsWith("image/")) {
          $(".upload-area2 span").text("Error: Only images are allowed");
          return;
        }

        if (files.size > maxFileSize) {
          $(".upload-area2 span").text("Error: Maximum file size is 2 MB");
          return;
        }

        addThumbnail2(files);
      });
    });

    function addThumbnail2(file) {
      $("#uploadfile2 span").remove();
      var len = $("#uploadfile2 div.thumbnail").length;
      var num = Number(len);
      num = num + 1;

      var name = file.name;
      var size = convertSize2(file.size);

      var reader = new FileReader();

      reader.onload = function(e) {
        var src = e.target.result;
        backgroundBelakang = src;
        $("#uploadfile2").css("background-image", "url(" + src + ")");
        $("#depan-preview").css("background-image", "url(" + src + ")");

        // $("#uploadfile").append('<p class="size">' + size + "</p>");
      };

      reader.readAsDataURL(file);
    }

    function convertSize2(size) {
      var sizes = ["Bytes", "KB", "MB", "GB", "TB"];
      if (size == 0) return "0 Byte";
      var i = parseInt(Math.floor(Math.log(size) / Math.log(1024)));
      return Math.round(size / Math.pow(1024, i), 2) + " " + sizes[i];
    }

    $('#preview-button').on('click', function() {
      let tataLetak = $('#tataLetak').val().toLowerCase();
      $.ajax({
        type: "GET",
        url: "{{ route('get_preview', '') }}/" + tataLetak,
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        dataType: "html",
        beforeSend: function() {
          $("#loadpreview").show();
        },
        success: function(response) {
          var parsedHTML = $.parseHTML(response);
          var bgDepanElement = $(parsedHTML).find('#bgDepan');
          var bgBelakangElement = $(parsedHTML).find('#bgBelakang');

          bgDepanElement.css('background-image', 'url(' + backgroundDepan + ')');
          bgBelakangElement.css('background-image', 'url(' + backgroundBelakang + ')');

          $("#loadpreview").hide();
          $('#modal-body').html(parsedHTML);
        },
        error: function(xhr, status, error) {
          $('#modal-body').html(`<p class="text-center">${error}</p>`);
          console.log("Error: " + error);
        }
      });
    })
  </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
      const namaKategoriInput = document.querySelector('input[name="namaKategori"]');
      const tataletakSelect = document.querySelector('select[name="tataletak"]');
      const depanInput = document.querySelector('input[name="depan"]');
      const belakangInput = document.querySelector('input[name="belakang"]');
      const previewButton = document.getElementById('preview-button');
      const simpanButton = document.getElementById('simpan');

      function togglePreviewButton() {
        if (namaKategoriInput.value.trim() !== '' && tataletakSelect.value !== 'tataletak' && depanInput.files.length > 0 && belakangInput.files.length > 0) {
          previewButton.disabled = false;
          simpanButton.disabled = false;
          previewButton.classList.remove('btn-secondary');
          previewButton.classList.add('btn-info');
        } else {
          previewButton.disabled = true;
          simpanButton.disabled = true;
          previewButton.classList.remove('btn-info');
          previewButton.classList.add('btn-secondary');
        }
      }

      namaKategoriInput.addEventListener('input', togglePreviewButton);
      tataletakSelect.addEventListener('change', togglePreviewButton);
      depanInput.addEventListener('change', togglePreviewButton);
      belakangInput.addEventListener('change', togglePreviewButton);
    });
  </script>



  {{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
      $('#preview').modal('show');
    });
  </script> --}}
@endsection
