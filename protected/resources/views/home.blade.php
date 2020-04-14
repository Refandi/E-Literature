@extends('layouts.app')

@section('content')
<div class="content-header">
      <div class="container-fluid">


        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
             
              <div class="info-box-content">
                <div class="col-sm-12">
                  <span class="info-box-text"><b>Jenis Buku</b></span>
                    <select class="form-control custom-select filter-select" data-column="2">
                        <option value="">Pilih</option>
                        @foreach($jenis_buku as $data)
                        <option value="{{ $data->jenis_buku }}"> {{ $data->jenis_buku }}</option>
                        @endforeach
                    </select>  
                </div>
              </div>
              <!-- /.info-box-content -->
            </div>
            <input type="text" name="email" class="form-control filter-input" placeholder="Jenis Buku . . ." data-column="2" />
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <div class="col-sm-12">
                  <span class="info-box-text"><b>Pengarang</b></span>
                    <select class="form-control custom-select filter-select" data-column="3">
                        <option value="">Pilih</option>
                        @foreach($pengarang as $data)
                        <option value="{{ $data->pengarang }}"> {{ $data->pengarang }}</option>
                        @endforeach
                    </select>  
                </div>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <input type="text" name="email" class="form-control filter-input" placeholder="Pengarang . . ." data-column="3" />
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                  <div class="col-sm-12">
                    <span class="info-box-text"><b>Penerbit</b></span>
                      <select class="form-control custom-select filter-select" data-column="4">
                          <option value="">Pilih</option>
                          @foreach($penerbit as $data)
                          <option value="{{ $data->penerbit }}"> {{ $data->penerbit }}</option>
                          @endforeach
                      </select>  
                  </div>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <input type="text" name="email" class="form-control filter-input" placeholder="Penerbit . . ." data-column="4" />
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                  <div class="col-sm-12">
                    <span class="info-box-text"><b>Tahun</b></span>
                      <select class="form-control custom-select filter-select" data-column="5">
                          <option value="">Pilih</option>
                          @foreach($tahun_terbit as $data)
                          <option value="{{ $data->tahun_terbit }}"> {{ $data->tahun_terbit }}</option>
                          @endforeach
                      </select>  
                  </div>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <input type="text" name="email" class="form-control filter-input" placeholder="Tahun . . ." data-column="5" />
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        
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
                <h3 class="card-title">
                  Daftar Buku
                </h3>

              </div><!-- /.card-header -->
              <div class="card-body">
              <table id="table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Jenis</th>
                  <th>Pengarang</th>
                  <th>Penerbit</th>
                  <th>Tahun</th>
                  <th>Sinopsis</th>
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
    <script>
            $(document).ready(function() {
                let table = $('#table').DataTable({
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
                    ]
                });

                $('.filter-input').keyup(function(){
                  table.column( $(this).data('column'))
                    .search( $(this).val())
                    .draw();
                });

                $('.filter-select').change(function(){
                  table.column( $(this).data('column'))
                    .search( $(this).val())
                    .draw();
                })
                

            });
    </script>
@endsection