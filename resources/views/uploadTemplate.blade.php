@extends('layouts.nav-admin')

@section('content')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('css/admin/template.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <div class="container-css">
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="top-content">
        <div class="left-side">
          <div class="header-card">
            <span class="second-title text-end"><span class="first-title text-start">Upload Latar Belakang</span>Standar ukuran A4 (3508px X 2480px)</span>
          </div>
          <hr class="line-header">
          <div class="body-card">
            <div class="left-drop">
              <span class="drop-header">Template (Depan)</span>
              <input type="file" name="file" id="file" />
              <div class="upload-area" id="uploadfile">
                <span>Jatuhkan file disini atau klik untuk menggungah</span>
              </div>
            </div>
            <div class="right-drop">
              <span class="drop-header">Template (Belakang)</span>
              <input type="file" name="file2" id="file2" />
              <div class="upload-area2" id="uploadfile2">
                <span>Jatuhkan file disini atau klik untuk menggungah</span>
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
              <input type="text" name="namaKategori" class="form-control" placeholder="Nama kategori">
            </div>
            <div class="mb-3">
              <label for="namaKategori">Tata Letak</label>
              <select name="letakDepan" id="letakDepan" class="form-select">
                <option disabled selected>Pilih tata letak depan</option>
                <option value="1">Tata letak 1</option>
              </select>
            </div>
            <div class="card-button">
              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#preview">Preview</button>
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
          <div class="modal-body">
            <div class="preview-container">
              <div class="preview-left">
                <div class="preview-image">
                  <span>Gambar Latar Belakang Sertifikat (Depan)</span>
                  <div class="depan-preview"></div>
                </div>
              </div>
              <div class="preview-right">
                <div class="preview-image">
                  <span>Gambar Latar Belakang Sertifikat (Belakang)</span>
                  <div class="belakang-preview"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(function() {
      var maxFileSize = 2 * 1024 * 1024;
      $(".upload-area").on("dragenter", function(e) {
        e.stopPropagation();
        e.preventDefault();
        $(".upload-area").css({
          border: "2px dotted black"
        });
      });

      $(".upload-area").on("dragover", function(e) {
        e.stopPropagation();
        e.preventDefault();
        $(".upload-area").css({
          border: "2px dotted black"
        });
      });

      $(".upload-area").on("dragleave", function(e) {
        e.stopPropagation();
        e.preventDefault();
        $(".upload-area").css({
          border: "2px solid"
        });
      });

      $(".upload-area").on("drop", function(e) {
        e.stopPropagation();
        e.preventDefault();

        var file = e.originalEvent.dataTransfer.files;
        console.log(file);

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
        $("#uploadfile").css("background-image", "url(" + src + ")");

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
  </script>
  {{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
      $('#preview').modal('show');
    });
  </script> --}}
@endsection
