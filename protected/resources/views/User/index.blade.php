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
              <li class="breadcrumb-item active">Pengguna</li>
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
                  <a href="javascript:void(0)" id="tombol-user" title="Create" class="btn btn-info btn-sm modal-create float-right"><i class="fa fa-plus-circle"></i> Tambah</a>
                  <h5 class><b>Pengguna</b></h5>
                </div><!-- /.card-header -->
              <div class="card-body">
              <table id="table_user" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 25px">No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th style="width: 75px">#</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
</section>
@endsection

@section('js')
@include('User.modal_user')
    <script>
            $(document).ready(function() {
                $('#table_user').DataTable({
                    processing: true,
                    serverSide: true,
                    timeout: 500,
                    'autoWidth'   : false,
                    ajax: "{{ route('datatable_user') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
            });

            $(document).ready(function () {
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            });
    </script>
@endsection