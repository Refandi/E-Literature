@extends('layouts.app')

@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">DataTable</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
            <section class="col-lg-6 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                    <a href="javascript:void(0)" id="tombol-jenis" class="btn btn-info btn-sm modal-create float-right"><i class="fa fa-plus-circle"></i> Tambah</a>
                    <span class>Jenis Buku</span>
                </div><!-- /.card-header -->
                <div class="card-body">
                <table id="table_jenis" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th style="width: 75px">#</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                </div><!-- /.card-body -->
              </div>
            </section>

            <section class="col-lg-6 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                    <a href="javascript:void(0)" id="tombol-pengarang" class="btn btn-info btn-sm modal-create float-right"><i class="fa fa-plus-circle"></i> Tambah</a>
                    <span class>Pengarang</span>
                </div><!-- /.card-header -->
                <div class="card-body">
                <table id="table_pengarang" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th style="width: 75px">#</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                </div><!-- /.card-body -->
              </div>
            </section>

            <section class="col-lg-6 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                    <a href="javascript:void(0)" id="tombol-penerbit" class="btn btn-info btn-sm modal-create float-right"><i class="fa fa-plus-circle"></i> Tambah</a>
                    <span class>Penerbit</span>
                </div><!-- /.card-header -->
                <div class="card-body">
                <table id="table_penerbit" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th style="width: 75px">#</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                </div><!-- /.card-body -->
              </div>
            </section>

            <section class="col-lg-6 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                    <a href="javascript:void(0)" id="tombol-tahun_terbit" class="btn btn-info btn-sm modal-create float-right"><i class="fa fa-plus-circle"></i> Tambah</a>
                    <span class>Tahun Terbit</span>
                </div><!-- /.card-header -->
                <div class="card-body">
                <table id="table_tahun_terbit" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th style="width: 75px">#</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                </div><!-- /.card-body -->
              </div>
            </section>

          </div>
        </div><!-- /.container-fluid -->
  </section>
@endsection

@section('js')
@include('Kategori.modal_jenis_buku')
@include('Kategori.modal_pengarang')
@include('Kategori.modal_penerbit')
@include('Kategori.modal_tahun_terbit')
    <script>

            // START -- MENGATUR DATATABLE JENIS BUKU
            $(document).ready(function() {
                $('#table_jenis').DataTable({
                    processing: true,
                    serverSide: true,
                    timeout: 500,
                    'autoWidth'   : false,
                    ajax: "{{ route('datatable_jenis_buku') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'jenis_buku', name: 'jenis_buku'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
            });
            // END -- MENGATUR DATATABLE JENIS BUKU

            // START -- MENGATUR DATATABLE PENGARANG
            $(document).ready(function() {
                $('#table_pengarang').DataTable({
                    processing: true,
                    serverSide: true,
                    timeout: 500,
                    'autoWidth'   : false,
                    ajax: "{{ route('datatable_pengarang') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'pengarang', name: 'pengarang'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
            });
            // END -- MENGATUR DATATABLE PENGARANG

            // START -- MENGATUR DATATABLE PENERBIT
            $(document).ready(function() {
                $('#table_penerbit').DataTable({
                    processing: true,
                    serverSide: true,
                    timeout: 500,
                    'autoWidth'   : false,
                    ajax: "{{ route('datatable_penerbit') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'penerbit', name: 'penerbit'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
            });
            // END -- MENGATUR DATATABLE PENERBIT

            // START -- MENGATUR DATATABLE TAHUN TERBIT
            $(document).ready(function() {
                $('#table_tahun_terbit').DataTable({
                    processing: true,
                    serverSide: true,
                    timeout: 500,
                    'autoWidth'   : false,
                    ajax: "{{ route('datatable_tahun_terbit') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'tahun_terbit', name: 'tahun_terbit'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
            });
            // END -- MENGATUR DATATABLE TAHUN TERBIT
            

            $(document).ready(function () {
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            });


    </script>
@endsection

