   <!-- MULAI MODAL FORM TAMBAH-->
   <div class="modal fade" id="tambah-modal" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-judul"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form-tambah" name="form-tambah-edit" class="form-horizontal">
                    
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Nama</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control input_form" id="nama" name="jenis_buku"
                                            value="" required>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan"
                                    value="Validate!">Simpan
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
   <div class="modal fade" id="edit-modal" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-judul_edit"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form-edit" name="form-tambah-edit" class="form-horizontal">
                    
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="hidden" name="id" id="id_edit">
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Nama</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nama_edit" name="jenis_buku"
                                            value="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan_edit"
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

    <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body text-center">
                    <img src="{{ asset('assets/admin/dist/img/warning.png') }}" width="190px" alt="">
                    <h5><b>Anda yakin ini menghapus?</b></h5>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- AKHIR MODAL -->

    <script>
            $('#tombol-jenis').click(function () {
            tes = $(this).attr('id');
              
            //   if(tes === "tombol-jenis"){
            //     $('.input_form').attr("name", "jenis_buku");
            //     we = $('.input_form').attr("name");
            //   }

            $('#id').val(''); //valuenya menjadi kosong
            // $('#form-tambah').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Data"); //valuenya tambah pegawai baru
            $('#tambah-modal').modal('show'); //modal tampil
            });

              
            if ($("#form-tambah").length > 0) {

            $("#form-tambah").validate({
                rules : {
                  jenis_buku : {
                      required : true,
                      normalizer: function( value ) { // membuat spasi terbaca kosong
                        return $.trim( value );
                    }
                  }
                },
                messages : {
                  jenis_buku : 'Tidak boleh kosong'
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
                        url: "{{ route('jenis-buku.store') }}",
                        type: "POST", 
                        dataType: 'json', 
                        success: function (data) { 
                            $("#form-tambah").validate().resetForm();
                            $('.form-control').removeClass('is-valid');
                            $('#form-tambah').trigger("reset"); 
                            $('#tambah-modal').modal('hide');
                            $('#tombol-simpan').html('Simpan'); 
                            var oTable = $('#table_jenis').dataTable(); 
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
                        }
                    });
                } 
            });
        }
        

        $('body').on('click', '.btn-edit', function () {
            var data_id = $(this).data('id');
            $.get('jenis-buku/' + data_id + '/edit', function (data) {
                $('#modal-judul_edit').html("Ubah Data");
                $('#edit-modal').modal('show');              
                $('#id_edit').val(data.id);
                $('#nama_edit').val(data.jenis_buku);
                $("#form-edit").validate().resetForm();
                $('.form-control').removeClass('is-valid');
                $('.form-control').removeClass('is-invalid');
            })
        });

        if ($("#form-edit").length > 0) {
            $("#form-edit").validate({
                rules : {
                  jenis_buku : {
                      required : true,
                      normalizer: function( value ) {
                        return $.trim( value );
                    }

                  }
                },
                messages : {
                  jenis_buku : 'Tidak boleh kosong'
                },
                
                highlight: function(element) {
                    $(element).removeClass('is-valid').addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                },

                submitHandler: function (form) {
                    $('#tombol-simpan_edit').html('Menyimpan..');
                    $.ajax({
                        data: $('#form-edit')
                            .serialize(), 
                        url: "{{ route('jenis-buku.store') }}", 
                        type: "POST", 
                        dataType: 'json', 
                        success: function (data) { 
                            $('.form-control').removeClass('is-valid');
                            $('#edit-modal').modal('hide'); 
                            $('#tombol-simpan_edit').html('Simpan'); 
                            var oTable = $('#table_jenis').dataTable(); 
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
                            $('#tombol-simpan_edit').html('Simpan');
                        }
                    });
                }
            })
            
        }


        //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
        $(document).on('click', '.delete', function () {
        dataId = $(this).attr('id');
        $('#konfirmasi-modal').modal('show');
        });
        //jika tombol hapus pada modal konfirmasi di klik maka
        $('#tombol-hapus').click(function () {
          $('#tombol-hapus').html('Menghapus..');
            $.ajax({
                url: "jenis-buku/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                success: function (data) { //jika sukses
                  $('#tombol-hapus').html('Hapus');
                    setTimeout(function () {
                        $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#table_jenis').dataTable();
                        oTable.fnDraw(false); //reset datatable
                    });
                    iziToast.warning({ //tampilkan izitoast warning
                        title: 'Data Berhasil Dihapus',
                        message: '{{ Session('
                        delete ')}}',
                        position: 'topRight'
                    });
                }
            })
        });
    </script>