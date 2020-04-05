   <!-- MULAI MODAL FORM TAMBAH-->
   <div class="modal fade" id="modal-tahun_terbit-tambah" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-tahun_terbit-judul"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form-tahun_terbit-tambah" name="form-tambah-edit" class="form-horizontal">
                    
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Nama</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control input_form" id="nama" name="tahun_terbit"
                                            value="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block" id="tombol-tahun_terbit-simpan"
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

   <!-- MULAI MODAL FORM TAMBAH-->
   <div class="modal fade" id="modal-tahun_terbit-ubah" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-tahun_terbit-judul_edit"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form-tahun_terbit-ubah" name="form-tambah-edit" class="form-horizontal">
                    
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="hidden" name="id" id="id-tahun_terbit-edit">
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Nama</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nama-tahun_terbit-edit" name="tahun_terbit"
                                            value="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block" id="tombol-tahun_terbit-edit"
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

    <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal-tahun_terbit" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body text-center">
                    <img src="{{ asset('assets/admin/dist/img/warning.png') }}" width="190px" alt="">
                    <h5><b>Anda yakin ini menghapus?</b></h5>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-tahun_terbit-hapus">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- AKHIR MODAL -->

    <script>
        $('#tombol-tahun_terbit').click(function () {
        console.log
        tes = $(this).attr('id');   
        //   if(tes === "tombol-jenis"){
        //     $('.input_form').attr("name", "jenis_buku");
        //     we = $('.input_form').attr("name");
        //   }
        $('#id').val('');  
        $('#modal-tahun_terbit-judul').html("Tambah Data");  
        $('#modal-tahun_terbit-tambah').modal('show');  
        });

        if ($("#form-tahun_terbit-tambah").length > 0) {
            $("#form-tahun_terbit-tambah").validate({
                rules : {
                    tahun_terbit : {
                      required : true,
                      normalizer: function( value ) {
                        return $.trim( value );
                    }

                  }
                },
                messages : {
                    tahun_terbit : 'Tidak boleh kosong'
                },
                
                highlight: function(element) {
                    $(element).removeClass('is-valid').addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                },

                submitHandler: function (form) {
                    $('#tombol-tahun_terbit-simpan').html('Menyimpan..');
                    $.ajax({
                        data: $('#form-tahun_terbit-tambah')
                            .serialize(),  
                        url: "{{ route('tahun-terbit.store') }}",  
                        type: "POST",  
                        dataType: 'json', 
                        success: function (data) { 
                            $("#form-tahun_terbit-tambah").validate().resetForm();
                            $('.form-control').removeClass('is-valid');
                            $('#form-tahun_terbit-tambah').trigger("reset");  
                            $('#modal-tahun_terbit-tambah').modal('hide'); 
                            $('#tombol-tahun_terbit-simpan').html('Simpan');  
                            var oTable = $('#table_tahun_terbit').dataTable();  
                            oTable.fnDraw(false); 
                            iziToast.success({ 
                                title: 'Data Berhasil Disimpan',
                                message: '{{ Session('success')}}',
                                position: 'topRight'
                            });
                        },
                        error: function (data) { 
                            console.log('Error:', data);
                            $('#tombol-tahun_terbit-simpan').html('Simpan');
                        },
                    })
                }
            })
        }

        $('body').on('click', '.btn-tahun_terbit-edit', function () {
            var data_id = $(this).data('id');
            $.get('tahun-terbit/' + data_id + '/edit', function (data) {
                $('#modal-tahun_terbit-judul_edit').html("Ubah Data");
                $('#modal-tahun_terbit-ubah').modal('show');              
                $('#id-tahun_terbit-edit').val(data.id);
                $('#nama-tahun_terbit-edit').val(data.tahun_terbit);
                $("#form-tahun_terbit-ubah").validate().resetForm();
                $('.form-control').removeClass('is-valid');
                $('.form-control').removeClass('is-invalid');
            })
        });

        if ($("#form-tahun_terbit-ubah").length > 0) {
            $("#form-tahun_terbit-ubah").validate({

                rules : {
                    tahun_terbit : {
                      required : true,
                      normalizer: function( value ) {
                        return $.trim( value );
                    }

                  }
                },
                messages : {
                    tahun_terbit : 'Tidak boleh kosong'
                },
                
                highlight: function(element) {
                    $(element).removeClass('is-valid').addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                },

                submitHandler: function (form) {
                    $('#tombol-tahun_terbit-edit').html('Menyimpan..');
                    $.ajax({
                        data: $('#form-tahun_terbit-ubah')
                            .serialize(), 
                        url: "{{ route('tahun-terbit.store') }}", 
                        type: "POST", 
                        dataType: 'json', 
                        success: function (data) { 
                            $('.form-control').removeClass('is-valid');
                            $('#modal-tahun_terbit-ubah').modal('hide'); 
                            $('#tombol-tahun_terbit-edit').html('Simpan');
                            var oTable = $('#table_tahun_terbit').dataTable(); 
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
                            $('#tombol-tahun_terbit-edit').html('Simpan');
                        }
                    });
                }
            })
            
        }

        
        $(document).on('click', '.btn-tahun_terbit-hapus', function () {
        dataId = $(this).attr('id');
        $('#konfirmasi-modal-tahun_terbit').modal('show');
        });
         
        $('#tombol-tahun_terbit-hapus').click(function () {
          $('#tombol-tahun_terbit-hapus').html('Menghapus..');
            $.ajax({
                url: "tahun-terbit/" + dataId,  
                type: 'delete',
                success: function (data) { 
                  $('#tombol-tahun_terbit-hapus').html('Hapus');
                    setTimeout(function () {
                        $('#konfirmasi-modal-tahun_terbit').modal('hide'); 
                        var oTable = $('#table_tahun_terbit').dataTable();
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