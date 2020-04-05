   <!-- MULAI MODAL FORM TAMBAH-->
   <div class="modal fade" id="modal-pengarang-tambah" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-pengarang-judul"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form-pengarang-tambah" name="form-tambah-edit" class="form-horizontal">
                    
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Nama</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control input_form" id="nama" name="pengarang"
                                            value="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block" id="tombol-pengarang-simpan"
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
   <div class="modal fade" id="modal-pengarang-ubah" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-pengarang-judul_edit"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form-pengarang-ubah" name="form-tambah-edit" class="form-horizontal">
                    
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="hidden" name="id" id="id-pengarang-edit">
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Nama</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nama-pengarang-edit" name="pengarang"
                                            value="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block" id="tombol-pengarang-edit"
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

    <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal-pengarang" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body text-center">
                    <img src="{{ asset('assets/admin/dist/img/warning.png') }}" width="190px" alt="">
                    <h5><b>Anda yakin ini menghapus?</b></h5>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-pengarang-hapus">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- AKHIR MODAL -->

    <script>
        $('#tombol-pengarang').click(function () {
        tes = $(this).attr('id');   
        //   if(tes === "tombol-jenis"){
        //     $('.input_form').attr("name", "jenis_buku");
        //     we = $('.input_form').attr("name");
        //   }
        $('#id').val('');  
        $('#modal-pengarang-judul').html("Tambah Data");
        $('#modal-pengarang-tambah').modal('show');  
        });

        if ($("#form-pengarang-tambah").length > 0) {
            $("#form-pengarang-tambah").validate({
                rules : {
                    pengarang : {
                      required : true,
                      normalizer: function( value ) {
                        return $.trim( value );
                    }
                  }
                },
                messages : {
                    pengarang : 'Tidak boleh kosong'
                },
                
                highlight: function(element) {
                    $(element).removeClass('is-valid').addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                },

                submitHandler: function (form) {
                    $('#tombol-pengarang-simpan').html('Menyimpan..');
                    $.ajax({
                        data: $('#form-pengarang-tambah')
                            .serialize(),  
                        url: "{{ route('pengarang.store') }}",  
                        type: "POST",  
                        dataType: 'json', 
                        success: function (data) { 
                            $("#form-pengarang-tambah").validate().resetForm();
                            $('.form-control').removeClass('is-valid');
                            $('#form-pengarang-tambah').trigger("reset");  
                            $('#modal-pengarang-tambah').modal('hide'); 
                            $('#tombol-pengarang-simpan').html('Simpan');  
                            var oTable = $('#table_pengarang').dataTable();  
                            oTable.fnDraw(false); 
                            iziToast.success({ 
                                title: 'Data Berhasil Disimpan',
                                message: '{{ Session('success')}}',
                                position: 'topRight'
                            });
                            validator.resetForm();
                        },
                        error: function (data) { 
                            console.log('Error:', data);
                            $('#tombol-pengarang-simpan').html('Simpan');
                        },
                    })
                }
            })
        }

        $('body').on('click', '.btn-pengarang-edit', function () {
            var data_id = $(this).data('id');
            $.get('pengarang/' + data_id + '/edit', function (data) {
                $('#modal-pengarang-judul_edit').html("Ubah Data");
                $('#modal-pengarang-ubah').modal('show');              
                $('#id-pengarang-edit').val(data.id);
                $('#nama-pengarang-edit').val(data.pengarang);
                $("#form-pengarang-edit").validate().resetForm();
                $('.form-control').removeClass('is-valid');
                $('.form-control').removeClass('is-invalid');
            })
        });

        if ($("#form-pengarang-ubah").length > 0) {
            $("#form-pengarang-ubah").validate({

                rules : {
                    pengarang : {
                      required : true,
                      normalizer: function( value ) {
                        return $.trim( value );
                    }

                  }
                },
                messages : {
                    pengarang : 'Tidak boleh kosong'
                },
                
                highlight: function(element) {
                    $(element).removeClass('is-valid').addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                },

                submitHandler: function (form) {
                    $('#tombol-pengarang-edit').html('Menyimpan..');
                    $.ajax({
                        data: $('#form-pengarang-ubah')
                            .serialize(), 
                        url: "{{ route('pengarang.store') }}", 
                        type: "POST", 
                        dataType: 'json', 
                        success: function (data) { 
                            $('.form-control').removeClass('is-valid');
                            $('#modal-pengarang-ubah').modal('hide'); 
                            $('#tombol-pengarang-edit').html('Simpan');
                            var oTable = $('#table_pengarang').dataTable(); 
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
                            $('#tombol-pengarang-edit').html('Simpan');
                        }
                    });
                }
            })
            
        }

        
        $(document).on('click', '.btn-pengarang-hapus', function () {
        dataId = $(this).attr('id');
        $('#konfirmasi-modal-pengarang').modal('show');
        });
         
        $('#tombol-pengarang-hapus').click(function () {
          $('#tombol-pengarang-hapus').html('Menghapus..');
            $.ajax({
                url: "pengarang/" + dataId,  
                type: 'delete',
                success: function (data) { 
                  $('#tombol-pengarang-hapus').html('Hapus');
                    setTimeout(function () {
                        $('#konfirmasi-modal-pengarang').modal('hide'); 
                        var oTable = $('#table_pengarang').dataTable();
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