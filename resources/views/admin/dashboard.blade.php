 @extends('layouts.nav-admin')
 @section('content')
   {{-- Card --}}
   <title>{{ config('app.name', 'Laravel') }} - Dashboard</title>
   <div class="row">
     <div class="col-md-4">
       <div class="card card-dashboard card-animate">
         <div class="card-body">
           <div class="d-flex position-relative align-items-center">
             <div class="content flex-shrink-0 me-3 avatar-xl rounded" style="background-color: rgba(41, 186, 219, 23%);">
               <img src="{{ asset('image/certificate-vector.png') }}" alt="">
             </div>
             <div class="text">
               <h5 class="text-atas" style="pointer-events: none">Sertifikat</h5>
               <p class="angka" style="pointer-events: none">{{ $certificateCount }}</p>
               <p class="text-bawah" style="pointer-events: none">Total Sertifikat</p>
             </div>
           </div>
         </div>
       </div>
     </div>
     <div class="col-md-4">
       <div class="card card-dashboard card-animate">
         <div class="card-body">
           <div class="d-flex position-relative align-items-center">
             <div class="content flex-shrink-0 me-3 avatar-xl rounded" style="background-color: rgba(61, 120, 227, 28%);">
               <img src="{{ asset('image/user-vector.png') }}" alt="..." />
             </div>
             <div class="text">
               <h5 class="text-atas" style="pointer-events: none">Sertifikat Lulus</h5>
               <p class="angka" style="pointer-events: none">{{ $kelulusanCount }}</p>
               <p class="text-bawah" style="pointer-events: none">Sertifikat Lulus Siswa Magang</p>
             </div>
           </div>
         </div>
       </div>
     </div>
     <div class="col-md-4">
       <div class="card card-dashboard card-animate">
         <div class="card-body">
           <div class="d-flex position-relative align-items-center">
             <div class="content flex-shrink-0 me-3 avatar-xl rounded"
               style="background-color: rgba(223, 235, 250, 100%);">
               <img src="{{ asset('image/jenis-vector.png') }}" alt="..." />
             </div>
             <div class="text">
               <h5 class="text-atas" style="pointer-events: none">Jenis Sertifikat</h5>
               <p class="angka" style="pointer-events: none">{{ $certificateCategoryCount }}</p>
               <p class="text-bawah" style="pointer-events: none">Jenis Sertifikat Yang Ada</p>
             </div>
           </div>
         </div>
       </div>
     </div>

     {{-- Chart Line & Pie --}}
     <div class="col-md-8">
       <div class="card">
         <div class="top d-flex py-2 justify-content-between align-items-center">
           <div class="text">
             <p class="title-chart" style="margin-bottom: 0;">Sertifikat Tercetak Tahun <span id="tahunini">ini</span>
             </p>
           </div>
           <div class="button me-3 d-flex gap-1">
             <button type="button" id="previus"
               class="btn btn-sm btn-outline-primary btn-icon waves-effect waves-light d-flex align-items-center justify-content-center"
               fdprocessedid="f8hmr"><i class="fi fi-rr-arrow-alt-circle-left"></i></button>
             <button type="button" id="current" class="btn btn-sm btn-outline-primary" fdprocessedid="f8hmr">Tahun
               Ini</button>
             <button type="button" id="next"
               class="btn btn-sm btn-outline-primary btn-icon waves-effect waves-light d-none align-items-center justify-content-center"
               fdprocessedid="f8hmr"><i class="fi fi-rr-arrow-alt-circle-right"></i></button>
           </div>
         </div>
         <canvas id="chartLine"></canvas>
       </div>
     </div>
     <div class="col-md-4">
       <div class="card" style="height: 94.8%">
         <p class="title-chart">Data Sertifikat</p>
         <canvas id="chartDoughnut" class="mb-3"></canvas>
       </div>
     </div>
   </div>

   {{-- chart js --}}
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

   {{-- chart doughnut --}}
   <script>
     const categories = @json($categoryData);

     const categoryCounts = categories.map(category => category.count);
     const categoryNames = categories.map(category => `Sertifikat ${category.name}`);

     const ctxDoughnut = document.getElementById("chartDoughnut").getContext("2d");
     const chartDoughnut = new Chart(ctxDoughnut, {
       type: "doughnut",
       data: {
         labels: categoryNames,
         datasets: [{
           data: categoryCounts,
           backgroundColor: [
             "#301CAE",
             "#09C4FF",
             "#3D78E3",
             "#4809FF",
             "#053896",
             "#816EF6",
             "#D7D7D7",
             "#14535D",
             "#143B5D",
             "#14555D",
           ],
         }],
       },
       options: {
         legend: {
           display: false,
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

     const certificateData = {!! json_encode($certificateData) !!};

     const previousButton = document.getElementById("previus");
     const currentButton = document.getElementById("current");
     const nextButton = document.getElementById("next");
     const tahun = document.getElementById("tahunini");

     var year = new Date().getFullYear();
     const cekYear = new Date().getFullYear();
     var currentYear = year;
     tahun.textContent = new Date().getFullYear();

     function updateYearDisplay(year) {
       tahun.textContent = year;
     }

     previousButton.addEventListener("click", () => {
       year -= 1;
       updateChart(year);
       updateYearDisplay(year);
       nextButton.classList.remove("d-none");
       nextButton.classList.add("d-flex");
     });

     nextButton.addEventListener("click", () => {
       year += 1;
       updateChart(year);
       updateYearDisplay(year);
       if (year === cekYear) {
         nextButton.classList.remove("d-flex");
         nextButton.classList.add("d-none");
       }
     });

     currentButton.addEventListener("click", () => {
       year = new Date().getFullYear();
       updateChart(year);
       updateYearDisplay(year);
       nextButton.classList.remove("d-flex");
       nextButton.classList.add("d-none");
     })

     const monthNames = [
       "Jan", "Feb", "Mar", "Apr", "Mei", "Jun",
       "Jul", "Agu", "Sep", "Okt", "Nov", "Des"
     ];

     const certificateCounts = new Array(12).fill(0);

     certificateData.forEach(data => {
       if (data.year === currentYear) {
         certificateCounts[data.month - 1] = data.count;
       }
     });
     const labels = monthNames;
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

     function updateChart(year) {
       certificateCounts.fill(0);

       certificateData.forEach(data => {
         if (data.year === year) {
           certificateCounts[data.month - 1] = data.count;
         }
       });
       chartLine.data.datasets[0].data = certificateCounts;
       chartLine.update();
     }
     updateChart(year);
   </script>
 @endsection
