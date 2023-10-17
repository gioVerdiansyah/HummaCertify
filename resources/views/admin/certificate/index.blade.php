@extends('layouts.nav-admin')

@section('content')
  <link rel="stylesheet" href="{{ asset('css/admin/AdminDataTable.css') }}">
  <div class="tambah-container">
    <div class="tambah-container-body">
      <div class="card-body">
        <div class="table-responsive">
          <div class="mb-3 col-12 d-flex">
            <div class="col-9">
              <div class="col-3">
                <select name="category" class="form-select">
                  <option disabled selected>Kategori Sertifikat</option>
                  <option value="SiswaMagangLulus">Kelulusan</option>
                </select>
              </div>
            </div>
            <div class="col-3">
              <div class="text-end">
                <input type="text" class="form-control" name="search" placeholder="Cari Data...">
              </div>
            </div>
          </div>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nomor Sertifikat </th>
                <th>Nama Peserta</th>
                <th>Kategori Sertifikat</th>
                <th>Tanggal mulai</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><span class="fw-bold">1</span></td>
                <td>111/22/AA/BB/3333</td>
                <td>Ayu Bagus</td>
                <td>Seminar</td>
                <td>15 Oktober 2023</td>
                <td class="d-flex gap-2 justify-content-center align-items-center">
                  <button class="btn btn-primary">Kirim</button>
                  <button class="btn btn-info" onclick="generatePDF(1)">Show</button>
                  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#detail">Detail</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
          <div class="grid-summary">
            Showing <b>1</b> to <b>1</b> of <b>1</b> results
          </div>
          <div class="grid-pagination">
            <button disabled class="btn btn-link" aria-label="Previous" title="Previous">Previous</button>
            <button class="btn btn-link" aria-label="Page 1" title="Page 1">1</button>
            <button class="btn btn-link" aria-label="Next" title="Next">Next</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Modal --}}
  <!-- Grids in modals -->
  <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detailLabel" aria-modal="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailLabel">Detail Sertifikat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="javascript:void(0);">
            <div class="row g-3">
              <div class="col-xxl-12 mb-2">
                <div>
                  <label for="unknown" class="form-label">Materi</label>
                  <input type="text" class="form-control" placeholder="Materi">
                </div>
              </div><!--end col-->
              <div class="col-xxl-12 mb-2">
                <div>
                  <label for="unknown" class="form-label">Jam Pelajaran</label>
                  <input type="number" class="form-control" id="jamPelajaran" placeholder="Jam Pelajaran" oninput="limitToThreeDigits(this)">
                </div>
              </div><!--end col-->
              <div class="col-xxl-12 mb-2">
                <div>
                  <label for="unknown" class="form-label">Predikat</label>
                  <select name="" class="form-select">
                    <option disabled selected>Pilih Predikat</option>
                    <option value="predikat1">predikat1</option>
                    <option value="predikat2">predikat2</option>
                    <option value="predikat3">predikat3</option>
                  </select>
                </div>
              </div><!--end col-->
              <div class="col-lg-12">
                <div class="hstack gap-2 justify-content-end">
                  <button type="button" class="btn btn-primary">Kirim</button>
                </div>
              </div><!--end col-->
            </div><!--end row-->
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js" integrity="sha512-Fd3EQng6gZYBGzHbKd52pV76dXZZravPY7lxfg01nPx5mdekqS8kX4o1NfTtWiHqQyKhEGaReSf4BrtfKc+D5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    function generatePDF(id) {
      var certificateId = 'certificate-' + id;

      $.ajax({
        url: `{{ route('getCertificate', 2) }}`,
        method: 'GET',
        data: {
          certificateId: certificateId
        },
        success: function(response) {
          var certificateElement = $(response).filter('#certificate-' + id);
          console.log(certificateElement);

          certificateElement.printThis({
            base: true
          });
        },
        error: function(error) {
          console.error('Error:', error);
        }
      });
    };
  </script>
  <script>
    function limitToThreeDigits(input) {
      if (input.value.length > 3) {
        input.value = input.value.slice(0, 3);
      }
    }
  </script>
@endsection
