   <!-- MULAI MODAL FORM TAMBAH-->
   <div class="modal fade" id="modal-penerbit-tambah" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-penerbit-judul"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form-penerbit-tambah" name="form-tambah-edit" class="form-horizontal">
                    
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Nama</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control input_form" id="nama" name="penerbit"
                                            value="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block" id="tombol-penerbit-simpan"
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
   <div class="modal fade" id="modal-penerbit-ubah" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-penerbit-judul_edit"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form-penerbit-ubah" name="form-tambah-edit" class="form-horizontal">
                    
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="hidden" name="id" id="id-penerbit-edit">
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Nama</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nama-penerbit-edit" name="penerbit"
                                            value="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block" id="tombol-penerbit-edit"
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

    <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal-penerbit" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body text-center">
                    <img src="{{ asset('assets/admin/dist/img/warning.png') }}" width="190px" alt="">
                    <h5><b>Anda yakin ini menghapus?</b></h5>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-penerbit-hapus">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- AKHIR MODAL -->

    <script>
        $('#tombol-penerbit').click(function () {
        console.log
        tes = $(this).attr('id');   
        $('#id').val('');  
        $('#modal-penerbit-judul').html("Tambah Data");  
        $('#modal-penerbit-tambah').modal('show');  
        });

        if ($("#form-penerbit-tambah").length > 0) {
            $("#form-penerbit-tambah").validate({
                rules : {
                    penerbit : {
                      required : true,
                      normalizer: function( value ) {
                        return $.trim( value );
                    }

                  }
                },
                messages : {
                    penerbit : 'Tidak boleh kosong'
                },
                
                highlight: function(element) {
                    $(element).removeClass('is-valid').addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                },

                submitHandler: function (form) {
                    $('#tombol-penerbit-simpan').html('Menyimpan..');
                    $.ajax({
                        data: $('#form-penerbit-tambah')
                            .serialize(),  
                        url: "{{ route('penerbit.store') }}",  
                        type: "POST",  
                        dataType: 'json', 
                        success: function (data) { 
                            $("#form-penerbit-tambah").validate().resetForm();
                            $('.form-control').removeClass('is-valid');
                            $('#form-penerbit-tambah').trigger("reset");  
                            $('#modal-penerbit-tambah').modal('hide'); 
                            $('#tombol-penerbit-simpan').html('Simpan');  
                            var oTable = $('#table_penerbit').dataTable();  
                            oTable.fnDraw(false); 
                            iziToast.success({ 
                                title: 'Data Berhasil Disimpan',
                                message: '{{ Session('success')}}',
                                position: 'topRight'
                            });
                        },
                        error: function (data) { 
                            console.log('Error:', data);
                            $('#tombol-penerbit-simpan').html('Simpan');
                        },
                    })
                }
            })
        }

        $('body').on('click', '.btn-penerbit-edit', function () {
            var data_id = $(this).data('id');
            $.get('penerbit/' + data_id + '/edit', function (data) {
                $('#modal-penerbit-judul_edit').html("Ubah Data");
                $('#modal-penerbit-ubah').modal('show');              
                $('#id-penerbit-edit').val(data.id);
                $('#nama-penerbit-edit').val(data.penerbit);
                $("#form-penerbit-ubah").validate().resetForm();
                $('.form-control').removeClass('is-valid');
                $('.form-control').removeClass('is-invalid');
            })
        });

        if ($("#form-penerbit-ubah").length > 0) {
            $("#form-penerbit-ubah").validate({

                rules : {
                    penerbit : {
                      required : true,
                      normalizer: function( value ) {
                        return $.trim( value );
                    }

                  }
                },
                messages : {
                    penerbit : 'Tidak boleh kosong'
                },
                
                highlight: function(element) {
                    $(element).removeClass('is-valid').addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                },

                submitHandler: function (form) {
                    $('#tombol-penerbit-edit').html('Menyimpan..');
                    $.ajax({
                        data: $('#form-penerbit-ubah')
                            .serialize(), 
                        url: "{{ route('penerbit.store') }}", 
                        type: "POST", 
                        dataType: 'json', 
                        success: function (data) { 
                            $('.form-control').removeClass('is-valid');
                            $('#modal-penerbit-ubah').modal('hide'); 
                            $('#tombol-penerbit-edit').html('Simpan');
                            var oTable = $('#table_penerbit').dataTable(); 
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
                            $('#tombol-penerbit-edit').html('Simpan');
                        }
                    });
                }
            })
            
        }

        
        $(document).on('click', '.btn-penerbit-hapus', function () {
        dataId = $(this).attr('id');
        $('#konfirmasi-modal-penerbit').modal('show');
        });
         
        $('#tombol-penerbit-hapus').click(function () {
          $('#tombol-penerbit-hapus').html('Menghapus..');
            $.ajax({
                url: "penerbit/" + dataId,  
                type: 'delete',
                success: function (data) { 
                  $('#tombol-penerbit-hapus').html('Hapus');
                    setTimeout(function () {
                        $('#konfirmasi-modal-penerbit').modal('hide'); 
                        var oTable = $('#table_penerbit').dataTable();
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