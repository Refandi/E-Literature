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
              <li class="breadcrumb-item"><a href="#">Halaman</a></li>
              <li class="breadcrumb-item active">Buku</li>
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
            <section class="col-lg-12 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                    @if(Auth::user()->role == 'Admin')
                    <a href="javascript:void(0)" id="tombol-buku" class="btn btn-info btn-sm modal-create float-right"><i class="fa fa-plus-circle"></i> Tambah</a>
                    @endif
                    <h5 class><b>Buku</b></h5>
                </div><!-- /.card-header -->
                <div class="card-body">
                <table id="table_buku" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 20px">No</th>
                    <th>Judul</th>
                    <th>Jenis</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Sinopsis</th>
                    @if(Auth::user()->role == 'Admin')
                    <th style="width: 110px">#</th>
                    @elseif(Auth::user()->role == 'User')
                    <th style="width: 75px">#</th>
                    @endif
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
@include('Buku.modal_buku')

    <script>

            // START -- MENGATUR DATATABLE JENIS BUKU
            $(document).ready(function() {
                $('#table_buku').DataTable({
                    processing: true,
                    serverSide: true,
                    timeout: 500,
                    'autoWidth'   : false,
                    ajax: "{{ route('datatable_buku') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'judul_buku', name: 'judul_buku'},
                        {data: 'jenis_buku', name: 'jenis_buku'},
                        {data: 'pengarang', name: 'pengarang'},
                        {data: 'penerbit', name: 'penerbit'},
                        {data: 'tahun_terbit', name: 'tahun_terbit'},
                        {data: 'sinopsis', name: 'sinopsis'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
            });
            // END -- MENGATUR DATATABLE JENIS BUKU            

            $(document).ready(function () {
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            });


    </script>
@endsection

