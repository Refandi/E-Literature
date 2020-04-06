   <!-- MULAI MODAL FORM TAMBAH-->
   <div class="modal fade" id="modal-tambah" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-judul"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form-tambah" class="form-horizontal">
                    
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Judul Buku</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control input_form" id="judul_buku" name="judul_buku"
                                            value="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Jenis Buku</label>
                                    <div class="col-sm-12">
                                        <select class="form-control custom-select" id="jenis_buku" name="jenis_buku_id">
                                            <option value="" selected disabled>Pilih</option>
                                            @foreach($jenis_buku as $data)
                                            <option value="{{ $data->id }}"> {{ $data->jenis_buku }}</option>
                                            @endforeach
                                        </select>  
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Pengarang</label>
                                    <div class="col-sm-12">
                                        <select class="form-control custom-select" id="pengarang" name="pengarang_id">
                                            <option value="" selected disabled>Pilih</option>
                                            @foreach($pengarang as $data)
                                            <option value="{{ $data->id }}"> {{ $data->pengarang }}</option>
                                            @endforeach
                                        </select>  
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Penerbit</label>
                                    <div class="col-sm-12">
                                        <select class="form-control custom-select" id="penerbit" name="penerbit_id">
                                            <option value="" selected disabled>Pilih</option>
                                            @foreach($penerbit as $data)
                                            <option value="{{ $data->id }}"> {{ $data->penerbit }}</option>
                                            @endforeach
                                        </select>  
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Tahun</label>
                                    <div class="col-sm-12">
                                        <select class="form-control custom-select" id="tahun_terbit" name="tahun_terbit_id">
                                            <option value="" selected disabled>Pilih</option>
                                            @foreach($tahun_terbit as $data)
                                            <option value="{{ $data->id }}"> {{ $data->tahun_terbit }}</option>
                                            @endforeach
                                        </select>  
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Sinopsis</label>
                                    <div class="col-sm-12">
                                        <textarea type="text" class="form-control input_form" id="sinopsis" name="sinopsis"
                                            value=""></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan"
                                    value="create">Simpan
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- AKHIR MODAL -->


   <!-- MULAI MODAL FORM UBAH-->
   <div class="modal fade" id="modal-ubah" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-judul_edit"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form-ubah" class="form-horizontal">
                    
                        <div class="row">
                            <input type="hidden" name="id" id="id_ubah">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Judul Buku</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control input_form" id="ubah_judul_buku" name="judul_buku"
                                            value="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Jenis Buku</label>
                                    <div class="col-sm-12">
                                        <select class="form-control custom-select" id="ubah_jenis_buku" name="jenis_buku_id">
                                            <option value="" selected disabled>Pilih</option>
                                            @foreach($jenis_buku as $data)
                                            <option value="{{ $data->id }}"> {{ $data->jenis_buku }}</option>
                                            @endforeach
                                        </select>  
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Pengarang</label>
                                    <div class="col-sm-12">
                                        <select class="form-control custom-select" id="ubah_pengarang" name="pengarang_id">
                                            <option value="" selected disabled>Pilih</option>
                                            @foreach($pengarang as $data)
                                            <option value="{{ $data->id }}"> {{ $data->pengarang }}</option>
                                            @endforeach
                                        </select>  
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Penerbit</label>
                                    <div class="col-sm-12">
                                        <select class="form-control custom-select" id="ubah_penerbit" name="penerbit_id">
                                            <option value="" selected disabled>Pilih</option>
                                            @foreach($penerbit as $data)
                                            <option value="{{ $data->id }}"> {{ $data->penerbit }}</option>
                                            @endforeach
                                        </select>  
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Tahun</label>
                                    <div class="col-sm-12">
                                        <select class="form-control custom-select" id="ubah_tahun_terbit" name="tahun_terbit_id">
                                            <option value="" selected disabled>Pilih</option>
                                            @foreach($tahun_terbit as $data)
                                            <option value="{{ $data->id }}"> {{ $data->tahun_terbit }}</option>
                                            @endforeach
                                        </select>  
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Sinopsis</label>
                                    <div class="col-sm-12">
                                        <textarea type="text" class="form-control input_form" id="ubah_sinopsis" name="sinopsis"
                                            value=""></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block" id="tombol-ubah"
                                    value="create">Simpan
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- AKHIR MODAL -->


    <!-- MULAI MODAL KONFIRMASI DELETE-->

    <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal-buku" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body text-center">
                    <img src="{{ asset('assets/admin/dist/img/warning.png') }}" width="190px" alt="">
                    <h5><b>Anda yakin ini menghapus?</b></h5>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-buku-hapus">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- AKHIR MODAL -->

    <script>
        $('#tombol-buku').click(function () {  
        $('#id').val('');  
        $('#modal-judul').html("Tambah Data"); 
        $('#modal-tambah').modal('show');    
        });
        
        if ($("#form-tambah").length > 0) {
            $("#form-tambah").validate({
                rules : {
                    judul_buku : {
                      required : true,
                      normalizer: function( value ) {
                        return $.trim( value );
                        }
                    },
                    jenis_buku_id : {
                      required : true,
                      normalizer: function( value ) {
                        return $.trim( value );
                        }
                    },
                    pengarang_id : {
                      required : true,
                      normalizer: function( value ) {
                        return $.trim( value );
                        }
                    },
                    penerbit_id : {
                      required : true,
                      normalizer: function( value ) {
                        return $.trim( value );
                        }
                    },
                    tahun_terbit_id : {
                      required : true,
                      normalizer: function( value ) {
                        return $.trim( value );
                        }
                    }

                  
                },
                messages : {
                    judul_buku : 'Tidak boleh kosong',
                    jenis_buku_id : 'Tidak boleh kosong',
                    pengarang_id : 'Tidak boleh kosong',
                    penerbit_id : 'Tidak boleh kosong',
                    tahun_terbit_id : 'Tidak boleh kosong'
                },
                
                highlight: function(element) {
                    $(element).removeClass('is-valid').addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                },

                submitHandler: function (form) {
                    $('#tombol-simpan').html('Menyimpan..');
                    $.ajax({
                        data: $('#form-tambah')
                            .serialize(),  
                        url: "{{ route('buku.store') }}",  
                        type: "POST",  
                        dataType: 'json', 
                        success: function (data) { 
                            $("#form-tambah").validate().resetForm();
                            $('.form-control').removeClass('is-valid');
                            $('#form-tambah').trigger("reset");  
                            $('#modal-tambah').modal('hide'); 
                            $('#tombol-simpan').html('Simpan');  
                            var oTable = $('#table_buku').dataTable();  
                            oTable.fnDraw(false); 
                            iziToast.success({ 
                                title: 'Data Berhasil Disimpan',
                                message: '{{ Session('success')}}',
                                position: 'topRight'
                            });
                        },
                        error: function (data) { 
                            console.log('Error:', data);
                            $('#tombol-simpan').html('Simpan');
                        },
                    })
                }
            })
        }

        $('body').on('click', '.btn-ubah-buku', function () {
            let data_id = $(this).data('id');
            $.get('buku/' + data_id + '/edit', function (data) {
                $('#modal-judul_edit').html("Ubah Data");
                $('#modal-ubah').modal('show');    
                $('#id_ubah').val(data.id);          
                $('#ubah_judul_buku').val(data.judul_buku);
                $('#ubah_jenis_buku').val(data.jenis_buku_id);
                $('#ubah_pengarang').val(data.pengarang_id);
                $('#ubah_penerbit').val(data.penerbit_id);
                $('#ubah_tahun_terbit').val(data.tahun_terbit_id);
                $('#ubah_sinopsis').val(data.sinopsis);
                $("#form-ubah").validate().resetForm();
                $('.form-control').removeClass('is-valid');
                $('.form-control').removeClass('is-invalid');

            })
        });

        if ($("#form-ubah").length > 0) {
            $("#form-ubah").validate({
                rules : {
                    judul_buku : {
                      required : true,
                      normalizer: function( value ) {
                        return $.trim( value );
                        }
                    },
                    jenis_buku_id : {
                      required : true,
                      normalizer: function( value ) {
                        return $.trim( value );
                        }
                    },
                    pengarang_id : {
                      required : true,
                      normalizer: function( value ) {
                        return $.trim( value );
                        }
                    },
                    penerbit_id : {
                      required : true,
                      normalizer: function( value ) {
                        return $.trim( value );
                        }
                    },
                    tahun_terbit_id : {
                      required : true,
                      normalizer: function( value ) {
                        return $.trim( value );
                        }
                    }
                },
                messages : {
                    judul_buku : 'Tidak boleh kosong',
                    jenis_buku_id : 'Tidak boleh kosong',
                    pengarang_id : 'Tidak boleh kosong',
                    penerbit_id : 'Tidak boleh kosong',
                    tahun_terbit_id : 'Tidak boleh kosong'
                },
                
                highlight: function(element) {
                    $(element).removeClass('is-valid').addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                },

                submitHandler: function (form) {
                    $('#tombol-ubah').html('Menyimpan..');
                    let id = $('#id_ubah').val();
                    $.ajax({
                        data: $('#form-ubah')
                            .serialize(), 
                        url: 'buku/' + id + '', 
                        type: "PUT", 
                        dataType: 'json', 
                        success: function (data) { 
                            $('.form-control').removeClass('is-valid');
                            $('#modal-ubah').modal('hide'); 
                            $('#tombol-ubah').html('Simpan');
                            var oTable = $('#table_buku').dataTable(); 
                            oTable.fnDraw(false); 
                            iziToast.success({  
                                title: 'Data Berhasil Disimpan',
                                message: '{{ Session('
                                success ')}}',
                                position: 'topRight'
                            });
                        },
                        error: function (data) {  
                            console.log('Error:', data);
                            $('#tombol-ubah').html('Simpan');
                        }
                    });
                }
            })
            
        }

        
        $(document).on('click', '.btn-hapus-buku', function () {
        dataId = $(this).attr('id');
        $('#konfirmasi-modal-buku').modal('show');
        });
         
        $('#tombol-buku-hapus').click(function () {
          $('#tombol-buku-hapus').html('Menghapus..');
            $.ajax({
                url: "buku/" + dataId,  
                type: 'delete',
                success: function (data) { 
                  $('#tombol-buku-hapus').html('Hapus');
                    setTimeout(function () {
                        $('#konfirmasi-modal-buku').modal('hide'); 
                        var oTable = $('#table_buku').dataTable();
                        oTable.fnDraw(false); 
                    });
                    iziToast.warning({  
                        title: 'Data Berhasil Dihapus',
                        message: '{{ Session('
                        delete ')}}',
                        position: 'topRight'
                    });
                }
            })
        });

    </script>