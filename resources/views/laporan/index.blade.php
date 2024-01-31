@extends('.admin.main')

@section('container')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h1 class="card-title">Laporan Harian</h1>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="filterYear">Pilih Tahun:</label>
              <select class="form-control" id="filterYear" onchange="filterData()">
                <!-- Tambahkan tahun sesuai kebutuhan -->
              </select>
            </div>

            <div class="form-group">
              <label for="filterMonth">Pilih Bulan:</label>
              <select class="form-control" id="filterMonth" onchange="filterData()">
                <!-- Tambahkan bulan sesuai kebutuhan -->
              </select>
            </div>

            <h2>Data Laporan</h2>

            <div id="printSection">
              <table class="table" id="reportTable">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Kegiatan</th>
                    <th>Hasil</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Data akan dimuat melalui JavaScript -->
                </tbody>
              </table>
            </div>

            <button class="btn btn-success" onclick="printTable()">Cetak Laporan</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Isi dropdown tahun
      var currentYear = new Date().getFullYear();
      var selectYear = document.getElementById("filterYear");
      for (var year = currentYear; year >= currentYear - 5; year--) {
        var option = document.createElement("option");
        option.value = year;
        option.text = year;
        selectYear.appendChild(option);
      }

      // Isi dropdown bulan
      var selectMonth = document.getElementById("filterMonth");
      for (var month = 1; month <= 12; month++) {
        var option = document.createElement("option");
        option.value = month < 10 ? "0" + month : "" + month;
        option.text = month < 10 ? "0" + month : "" + month;
        selectMonth.appendChild(option);
      }

      // Memanggil fungsi filterData saat pertama kali halaman dimuat
      filterData();
    });

    function filterData() {
      var filterYear = document.getElementById('filterYear').value;
      var filterMonth = document.getElementById('filterMonth').value;

      // Simulasikan data sesuai dengan filter
      var simulatedData = [
        { date: '2022-12-01', activity: 'Rapat Tim', result: 'Selesai' },
        { date: '2022-12-05', activity: 'Presentasi', result: 'Berhasil' },
        // Tambahkan data sesuai dengan kebutuhan proyek Anda
      ];

      // Membuat HTML untuk tabel berdasarkan data yang disimulasikan
      var tableBody = document.getElementById('reportTable').getElementsByTagName('tbody')[0];
      tableBody.innerHTML = '';

      simulatedData.forEach(function(data) {
        if (data.date.startsWith(filterYear + '-' + filterMonth)) {
          var row = tableBody.insertRow(tableBody.rows.length);
          var cellDate = row.insertCell(0);
          var cellActivity = row.insertCell(1);
          var cellResult = row.insertCell(2);

          cellDate.innerHTML = data.date;
          cellActivity.innerHTML = data.activity;
          cellResult.innerHTML = data.result;
        }
      });
    }

    function printTable() {
      var filterYear = document.getElementById('filterYear').value;
      var filterMonth = document.getElementById('filterMonth').value;

      // Simulasikan data sesuai dengan filter
      var simulatedData = [
        { date: '2022-12-01', activity: 'Rapat Tim', result: 'Selesai' },
        { date: '2022-12-05', activity: 'Presentasi', result: 'Berhasil' },
        // Tambahkan data sesuai dengan kebutuhan proyek Anda
      ];

      // Membuat HTML untuk tabel berdasarkan data yang disimulasikan
      var tableHTML = '<table class="table"><thead><tr><th>Tanggal</th><th>Kegiatan</th><th>Hasil</th></tr></thead><tbody>';
      simulatedData.forEach(function(data) {
        if (data.date.startsWith(filterYear + '-' + filterMonth)) {
          tableHTML += `<tr><td>${data.date}</td><td>${data.activity}</td><td>${data.result}</td></tr>`;
        }
      });
      tableHTML += '</tbody></table>';

      // Menyiapkan window untuk mencetak
      var printWindow = window.open('', '_blank');
      printWindow.document.open();
      printWindow.document.write('<html><head><style> @media print { body * { visibility: hidden; } #printSection, #printSection * { visibility: visible; } }</style></head><body>');
      printWindow.document.write('<h1>Laporan Harian - ' + filterMonth + '/' + filterYear + '</h1>');
      printWindow.document.write(tableHTML);
      printWindow.document.write('</body></html>');
      printWindow.document.close();

      // Menunggu dokumen terbuka sebelum mencetak
      printWindow.onload = function() {
        printWindow.print();
        printWindow.onafterprint = function() {
          printWindow.close();
        };
      };
    }
  </script>
@endsection


 {{-- @extends('admin.main')
 @section('container')
 <div class="container">
  <h1 class="mt-4">Laporan Harian</h1>

  <form action="/laporan/filter" method="post">
      @csrf
      <div class="form-row">
          <div class="form-group col-md-3">
              <label for="tahun">Pilih Tahun:</label>
              <select class="form-control" id="tahun" name="tahun">
                @for ($i = date('Y'); $i >= 2020; $i--)
                    <option value="{{ $i }}" {{ $i == $tahunSekarang ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
          </div>
          <div class="form-group col-md-3">
              <label for="bulan">Pilih Bulan:</label>
              <select class="form-control" id="bulan" name="bulan">
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" {{ $i == $bulanSekarang ? 'selected' : '' }}>
                        {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                    </option>
                @endfor
            </select>
          </div>
          <div class="form-group col-md-2">
              <button type="submit" class="btn btn-primary">Filter</button>
          </div>
      </div>
  </form>

  <table class="table mt-4">
      <thead>
          <tr>
              <th>Tanggal</th>
              <th>Kegiatan</th>
              <th>Hasil</th>
          </tr>
      </thead>
      <tbody>
          @forelse ($laporan as $data)
              <tr>
                  <td>{{ $data->tanggal }}</td>
                  <td>{{ $data->kegiatan }}</td>
                  <td>{{ $data->hasil }}</td>
              </tr>
          @empty
              <tr>
                  <td colspan="3">Tidak ada data untuk bulan dan tahun yang dipilih.</td>
              </tr>
          @endforelse
      </tbody>
  </table>
</div>

 @endsection --}}