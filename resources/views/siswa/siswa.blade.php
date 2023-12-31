@extends('layout')

@section('isi')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="py-3 mb-4"><span class="text-muted fw-light">Table/</span>Siswa</h4>

      <a class="btn btn-outline-primary" href="tambah/siswa"
      ><i class="bx bx-plus-circle"></i> Tambah</a>
      <!-- Basic Bootstrap Table -->
      <div class="card mt-3">
        <div class="table-responsive text-nowrap">
          <table class="table" id="tab">
            <thead>
              <tr>
                <th>NISN</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>SPP</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($data as $item)
              <tr>
                <td>{{$item->nisn}}</td>
                <td>{{$item->nis}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->kelas->nama_kelas}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->no_telp}}</td>
                <td>{{$item->spp->tahun}}-{{$item->spp->nominal}}</td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      
                      <a class="dropdown-item" href="{{url('edit/siswa/'.$item->nisn)}}"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                      >
                      <a class="dropdown-item" href="hapus/siswa/{{$item->nisn}}" onclick="return confirm('Apakah anda yakin ingin menghapus petugas ini?');"
                        ><i class="bx bx-trash me-1"></i> Delete</a
                      >
                    </div>
                  </div>
                </td>
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