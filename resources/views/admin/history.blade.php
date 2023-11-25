@extends('layout')

@section('isi')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Table/</span>Admin</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>NO</th>
              <th>Petugas</th>
              <th>Nisn</th>
              <th>Tanggal Bayar</th>
              <th>Bulan Dibayar</th>
              <th>Tahun Dibayar</th>
              <th>SPP</th>
              <th>Jumlah Bayar</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($data as $item)
            <tr>
              <td>{{$item->id_pembayaran}}</td>
              <td>{{$item->petugas->nama_petugas}}</td>
              <td>{{$item->siswa->nisn}}</td>
              <td>{{$item->tgl_bayar}}</td>
              <td>{{$item->bulan_dibayar}}</td>
              <td>{{$item->tahun_dibayar}}</td>
              <td>{{$item->siswa->spp->tahun}}-{{ $item->siswa->spp->nominal }}</td>
              <td>{{$item->jumlah_bayar}}</td>
              
            </tr>
            
            @endforeach  
          </tbody>
        </table>
      </div>
    </div>
 <!-- Content wrapper -->
 <div class="content-wrapper">
         
  <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
                                                                                                                                                 
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="../assets/vendor/js/menu.js"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../assets/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

@endsection