@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Edit Background Sertifikat</title>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link rel="stylesheet" href="{{ asset('css/admin/template.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <div class="container-css" style="padding: 22px 0 0">
    <div class="not-available">
      <h3 class="not-title">Ukuran layar ini tidak di dukung</h2>
    </div>
    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="top-content">
        <div class="left-side">
          <div class="header-card">
            <span class="first-title text-start">Upload Latar Belakang</span>
            <span class="second-title text-end text-info"><box-icon name='error-circle' color='#29BADB'
                class="warn-icon"></box-icon>Ukuran Harus A4 (29.7 x 21 cm)</span>
          </div>
          <hr class="line-header">
          <div class="body-card">
            <div class="left-drop">
              <span class="drop-header">Latar belakang (Depan)</span>
              <input type="file" name="depan" id="file" />
              <div class="upload-area" id="uploadfile"
                style="background-image: url('{{ asset($category->background_depan) }}')">
              </div>
              @error('depan')
                <div class="text-danger">
                  <p>{{ $message }}</p>
                </div>
              @enderror
            </div>
            <div class="right-drop">
              <span class="drop-header">Latar belakang (Belakang)</span>
              <input type="file" name="belakang" id="file2" />
              <div class="upload-area2" id="uploadfile2"
                style="background-image: url('{{ asset($category->background_belakang) }}')">
              </div>
              @error('belakang')
                <div class="text-danger">
                  <p>{{ $message }}</p>
                </div>
              @enderror
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
              <input type="text" name="namaKategori" class="form-control @error('namaKategori') is-invalid @enderror"
                placeholder="Nama kategori" value="{{ old('namaKategori', $category->name) }}" required>
              @error('namaKategori')
                <div class="invalid-feedback">
                  <p>{{ $message }}</p>
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="namaKategori">Tata Letak</label>
              <select name="tataletak" id="tataLetak" class="form-select @error('tataletak') is-invalid @enderror"
                required>
                <option disabled selected>Pilih tata letak</option>
                <option value="Kelulusan" {{ $category->tata_letak == 'Kelulusan' ? 'selected' : '' }}>
                  Kelulusan</option>
                <option value="Pelatihan" {{ $category->tata_letak == 'Pelatihan' ? 'selected' : '' }}>
                  Pelatihan</option>
                <option value="Kompetensi" {{ $category->tata_letak == 'Kompetensi' ? 'selected' : '' }}>
                  Kompetensi</option>
              </select>
              @error('tataletak')
                <div class="invalid-feedback">
                  <p>{{ $message }}</p>
                </div>
              @enderror
            </div>
            <div class="card-button">
              <button type="button" id="preview-button" class="btn btn-info" data-bs-toggle="modal" style="display: none" data-bs-target="#preview">Preview</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
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
    let backgroundDepan = "/{{ $category->background_depan }}";
    let backgroundBelakang = "/{{ $category->background_belakang }}";

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
          console.log(xhr);
          console.log(status);
          console.log(error);
        }
      });
    })
  </script>

  {{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
      $('#preview').modal('show');
    });
  </script> --}}
@endsection
