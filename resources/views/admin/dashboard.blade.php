@extends('layouts.nav-admin')
@section('content')
  {{-- Card --}}
  <div class="row">
    <div class="col-md-4">
      <div class="card card-dashboard">
        <div class="card-body">
          <div class="d-flex position-relative align-items-center">
            <div class="content flex-shrink-0 me-3 avatar-xl rounded" style="background-color: rgba(41, 186, 219, 23%);">
              <img src="{{ asset('image/certificate-vector.png') }}" alt="">
            </div>
            <div class="text">
              <h5 class="text-atas">Sertifikat</h5>
              <p class="angka">{{ $certificateCount }}</p>
              <p class="text-bawah">Total Sertifikat</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-dashboard">
        <div class="card-body">
          <div class="d-flex position-relative align-items-center">
            <div class="content flex-shrink-0 me-3 avatar-xl rounded"
              style="background-color: rgba(61, 120, 227, 28%);">
              <img src="{{ asset('image/user-vector.png') }}" alt="..." />
            </div>
            <div class="text">
              <h5 class="text-atas">Sertifikat Lulus</h5>
              <p class="angka">{{ $kelulusanCount }}</p>
              <p class="text-bawah">Sertifikat Lulus Siswa Magang</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-dashboard">
        <div class="card-body">
          <div class="d-flex position-relative align-items-center">
            <div class="content flex-shrink-0 me-3 avatar-xl rounded"
              style="background-color: rgba(223, 235, 250, 100%);">
              <img src="{{ asset('image/jenis-vector.png') }}" alt="..." />
            </div>
            <div class="text">
              <h5 class="text-atas">Jenis Sertifikat</h5>
              <p class="angka">{{ $certificateCategoryCount }}</p>
              <p class="text-bawah">Jenis Sertifikat Yang Ada</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Chart Line & Pie --}}
    <div class="col-md-8">
      <div class="card">
        <p class="title-chart">Sertifikat Tercetak Tahun Ini</p>
        <canvas id="chartLine"></canvas>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <p class="title-chart">Data Sertifikat</p>
        <canvas id="chartDoughnut"></canvas>
      </div>
    </div>
  </div>

  {{-- chart js --}}
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  {{-- chart doughnut --}}
  <script>
    // mengambil data count dari variable yang sudah dibuat di controller
    const data = {
      kelulusan: {{ $kelulusanCount }},
      pelatihan: {{ $pelatihanCount }},
      kompetensi: {{ $kompetensiCount }},
    };

    // tampilan chart
    const ctxDoughnut = document.getElementById("chartDoughnut").getContext("2d");
    const chartDoughnut = new Chart(ctxDoughnut, {
      type: "doughnut",
      data: {
        labels: ["Sertifikat Kelulusan", "Sertifikat Pelatihan", "Sertifikat Kompetensi"],
        datasets: [{
          // data yang ditampilkan pada doughnut
          data: [data.kelulusan, data.pelatihan, data.kompetensi],
          backgroundColor: [
            "#301CAE",
            "#09C4FF",
            "#3D78E3",
          ],
        }, ],
      },
      options: {
        legend: {
          display: true,
          position: "bottom",
        },
      },
    });
  </script>

  {{-- chart line --}}
  <script>
    const ctxLine = document.getElementById("chartLine").getContext("2d");

    var gradientStroke1 = ctxLine.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(9, 196, 255, 0.5)');
    gradientStroke1.addColorStop(0.2, 'rgba(9, 196, 255, 0.2)');
    gradientStroke1.addColorStop(0, 'rgba(9, 196, 255, 0.1)');

    // mengambil data dari variable yang sudah di buat di controller
    const certificateData = {!! json_encode($certificateData) !!};

    // Filter data untuk tahun saat ini
    const currentYear = new Date().getFullYear();

    // Buat array yang berisi nama-nama bulan
    const monthNames = [
      "Januari", "Februari", "Maret", "April", "Mei", "Juni",
      "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];

    // Inisialisasi array yang akan berisi jumlah sertifikat untuk setiap bulan
    const certificateCounts = new Array(12).fill(0);

    // Mengisi array certificateCounts dengan data yang sesuai dari table
    certificateData.forEach(data => {
      if (data.year === currentYear) {
        certificateCounts[data.month - 1] = data.count; // -1 karena bulan dimulai dari 0
      }
    });

    // membuat variable yang berisikan nama bulan
    const labels = monthNames;

    // mengambil data yang sudah di rubah nilainya
    const datasetData = certificateCounts;

    const chartLine = new Chart(ctxLine, {
      type: "line",
      data: {
        labels: labels,
        datasets: [{
          label: "Jumlah",
          data: datasetData,
          backgroundColor: gradientStroke1,
          borderColor: '#09C4FF',
          borderWidth: 3,
          fill: true,
          cubicInterpolationMode: 'monotone',
        }, ],
      },
      options: {
        onComplete: function() {
          console.log('Chart rendered:', this);
        },
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#000000',
              font: {
                size: 11,
                family: "Poppins",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#000000',
              padding: 20,
              font: {
                size: 11,
                family: "Poppins",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>



  {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    tambah peserta
  </button>
<form action="{{ route('certificate.store') }}" method="post">
    @csrf
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <label for="category">Pilih Kategori</label>
                <select name="certificate_categori_id" class="form-control">
                    @foreach ($category as $categorys)
                        <option value="{{ $categorys->id }}">{{ $categorys->name }}</option>
                    @endforeach
                </select>
       <label for="name">nama peserta</label>
       <input type="text" name="name" class="form-control">
       <label for="name">email peserta</label>
       <input type="email" name="email" class="form-control">
       <label for="name">Nisn</label>
      <input type="number" name="password" class="form-control">
        </div>
        <div class="modal-body">
            <label for="name">tanggal</label>
            <input type="date" name="tanggal" class="form-control">
            <label for="name">divisions</label>
            <input type="text" name="divisions" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>
@foreach ($users as $User)
<form action="{{ route('certificate.update', ['certificate'=>$User->id]) }}" method="post">
@csrf
@method('put')
<div class="modal fade" id="exampleModal--{{ $User->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <label for="category">Pilih Kategori</label>
                <select name="certificate_categori_id" class="form-control">
                    @foreach ($category as $categorys)
                        <option value="{{ $categorys->id }}">{{ $categorys->name }}</option>
                    @endforeach
                </select>
       <label for="name">nama peserta</label>
       <input type="text" name="name" class="form-control" value="{{ $User->name }}">
       <label for="name">email peserta</label>
       <input type="email" name="email" class="form-control" value="{{ $User->email }}">
       <label for="name">Nisn</label>
       <input type="number" name="password" class="form-control" value="{{ $User->password }}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div>
</form>
@endforeach
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">categori sertificate</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $User)
      <tr>
        <th scope="row">1</th>
        <td>{{ $User->name }}</td>
        <td>{{ $User->email }}</td>
            <td>
            @foreach ($User->certificates as $certificate)
            @if ($certificate->category === null)
            <p>tidak ada kategori</p>
            @else
            {{ $certificate->category->name }}
            @endif
           @endforeach --}}
  {{-- {{$User->categori->name }} --}}
  {{-- </td>
        <td>
            <form action="{{ route('certificate.destroy', ['certificate'=>$User->id]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit"  class="btn btn-danger">hapus</button>
            </form>
        </td>
        <td>
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal--{{ $User->id }}" class="btn btn-warning">edit</button>
        </td>
    </tr>
    @endforeach
    </tbody>
  </table> --}}
@endsection
