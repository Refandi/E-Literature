   <!-- MULAI MODAL FORM TAMBAH-->
   <div class="modal fade" id="modal-tambah-ubah" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul"></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="form-tambah-ubah" role="form" class="form-horizontal" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">Nama</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="name"
                                        value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12 control-label">Email</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="email"
                                        value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12 control-label">Level</label>
                                <div class="col-sm-12">
                                    <select class="form-control custom-select" name="role">
                                        <option value="" selected disabled>Pilih</option>
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
                                    </select>  
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12 control-label">Password</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="password"
                                        value="">
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
            <h5 class="modal-title" id="modal-judul_ubah"></h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="form-ubah" role="form" class="form-horizontal" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-12">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label class="col-sm-12 control-label">Nama</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="email" name="email"
                                    value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12 control-label">Level</label>
                            <div class="col-sm-12">
                                <select class="form-control custom-select" id="role" name="role">
                                    <option value="" selected disabled>Pilih</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>  
                            </div>
                        </div>

                        <div class="form-group" id="form-password" style="display:none;">
                            <label class="col-sm-12 control-label">Password</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="password" name="password"
                                    value="">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <a href="javascript:void(0)" id="lihatPassword">Password</a>
                            <a href="javascript:void(0)"id="tutup" style="display:none;">Tutup</a>
                            <br><br>
                        </div>

                    </div>

                    <div class="col-sm-offset-2 col-sm-12">
                        <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan_ubah"
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

<div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal-user" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body text-center">
                <img src="{{ asset('assets/admin/dist/img/warning.png') }}" width="190px" alt="">
                <h5><b>Anda yakin ini menghapus?</b></h5>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Hapus</button>
            </div>
        </div>
    </div>
</div>

<!-- AKHIR MODAL -->

<script>

    $("#lihatPassword").click(function(){
        $('#form-password').show();
        $('#lihatPassword').hide();
        $('#tutup').show();
    });

    $("#tutup").click(function(){
        $('#form-password').hide();
        $('#lihatPassword').show();
        $('#tutup').hide();
    });

    $('#tombol-user').click(function () {  
    $('#id').val('');  
    $('#modal-judul').html("Tambah Data"); 
    $('#form-tambah-ubah').validate().resetForm();
    $('#form-tambah-ubah').trigger("reset");
    $('.form-control').removeClass('is-valid');
    $('.form-control').removeClass('is-invalid');
    $('#modal-tambah-ubah').modal('show'); 
    });
    
    if ($("#form-tambah-ubah").length > 0) {
        $("#form-tambah-ubah").validate({
            rules : {
                name : {
                  required : true,
                  normalizer: function( value ) {
                    return $.trim( value );
                    }
                },
                email : {
                  required : true,
                  normalizer: function( value ) {
                    return $.trim( value );
                    }
                },
                password : {
                  required : true,
                  normalizer: function( value ) {
                    return $.trim( value );
                    }
                },
              
            },
            messages : {
                name : 'Tidak boleh kosong',
                email : 'Tidak boleh kosong',
                password : 'Tidak boleh kosong'
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
                    data: $('#form-tambah-ubah')
                            .serialize(), 
                    url: "{{ route('user.store') }}",  
                    type: "POST",  
                    enctype: "multipart/form-data",
                    dataType: 'json', 
                    success: function (data) { 
                        $("#form-tambah-ubah").validate().resetForm();
                        $('.form-control').removeClass('is-valid');
                        $('#form-tambah-ubah').trigger("reset");  
                        $('#modal-tambah-ubah').modal('hide'); 
                        $('#tombol-simpan').html('Simpan');  
                        var oTable = $('#table_user').dataTable();  
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


    if ($("#form-ubah").length > 0) {
        $("#form-ubah").validate({
            rules : {
                name : {
                  required : true,
                  normalizer: function( value ) {
                    return $.trim( value );
                    }
                },
                email : {
                  required : true,
                  normalizer: function( value ) {
                    return $.trim( value );
                    }
                },
                password : {
                  required : true,
                  normalizer: function( value ) {
                    return $.trim( value );
                    }
                },
              
            },
            messages : {
                name : 'Tidak boleh kosong',
                email : 'Tidak boleh kosong',
                password : 'Tidak boleh kosong'
            },
            
            highlight: function(element) {
                $(element).removeClass('is-valid').addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid').addClass('is-valid');
            },

            submitHandler: function (form) {
                $('#tombol-simpan_ubah').html('Menyimpan..');
                $.ajax({
                    data: $('#form-ubah')
                            .serialize(), 
                    url: "{{ route('user.store') }}",  
                    type: "POST",  
                    enctype: "multipart/form-data",
                    dataType: 'json', 
                    success: function (data) { 
                        $("#form-ubah").validate().resetForm();
                        $('.form-control').removeClass('is-valid');
                        $('#form-ubah').trigger("reset");  
                        $('#modal-ubah').modal('hide'); 
                        $('#tombol-simpan_ubah').html('Simpan');  
                        var oTable = $('#table_user').dataTable();  
                        oTable.fnDraw(false); 
                        iziToast.success({ 
                            title: 'Data Berhasil Disimpan',
                            message: '{{ Session('success')}}',
                            position: 'topRight'
                        });
                    },
                    error: function (data) { 
                        console.log('Error:', data);
                        $('#tombol-simpan_ubah').html('Simpan');
                    },
                })
            }
        })
    }

    $('body').on('click', '.btn-ubah-user', function () {
        let data_id = $(this).data('id');
        $.get('user/' + data_id + '/edit', function (data) {
            $('#modal-judul_ubah').html("Ubah Data");
            $('#modal-ubah').modal('show');    
            $('#id').val(data.id);          
            $('#name').val(data.name);
            $('#email').val(data.email);
            $('#role').val(data.role);
            $("#form-ubah").validate().resetForm();
            $('.form-control').removeClass('is-valid');
            $('.form-control').removeClass('is-invalid');

        })
    });

    
    $(document).on('click', '.btn-hapus-user', function () {
    dataId = $(this).attr('id');
    $('#konfirmasi-modal-user').modal('show');
    });
     
    $('#tombol-hapus').click(function () {
      $('#tombol-hapus').html('Menghapus..');
        $.ajax({
            url: "user/" + dataId,  
            type: 'delete',
            success: function (data) { 
              $('#tombol-hapus').html('Hapus');
                setTimeout(function () {
                    $('#konfirmasi-modal-user').modal('hide'); 
                    var oTable = $('#table_user').dataTable();
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