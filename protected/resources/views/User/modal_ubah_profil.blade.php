
<!-- MULAI MODAL FORM UBAH-->
<div class="modal fade" id="modal-ubah-profil" aria-hidden="true">
<div class="modal-dialog ">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-judul_ubah"></h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="form-ubah-profil" role="form" class="form-horizontal" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-12">
                        <input type="hidden" name="id" id="id_profil">
                        <div class="form-group">
                            <label class="col-sm-12 control-label">Nama</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name_profil" name="name"
                                    value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="email_profil" name="email"
                                    value="">
                            </div>
                        </div>

                        <div class="form-group" id="form-password_profil" style="display:none;">
                            <label class="col-sm-12 control-label">Password</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="password" name="password"
                                    value="">
                            </div>
                        </div>

                        <div class="form-group" id="form-password-konfirm_profil" style="display:none;">
                            <label class="col-sm-12 control-label">Konfirmasi Password</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="password_confirm" name="password_confirm"
                                    value="">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <a href="javascript:void(0)" id="lihatPassword_profil">Password</a>
                            <a href="javascript:void(0)"id="tutup_profil" style="display:none;">Tutup</a>
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

    $("#lihatPassword_profil").click(function(){
        $('#form-password_profil').show();
        $('#form-password-konfirm_profil').show();
        $('#lihatPassword_profil').hide();
        $('#tutup_profil').show();
    });

    $("#tutup_profil").click(function(){
        $('#form-password_profil').hide();
        $('#form-password-konfirm_profil').hide();
        $('#lihatPassword_profil').show();
        $('#tutup_profil').hide();
    });


    if ($("#form-ubah-profil").length > 0) {
        $("#form-ubah-profil").validate({
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
                  minlength : 6,
                  normalizer: function( value ) {
                    return $.trim( value );
                    }
                },
                password_confirm : {
                  required : true,
                  equalTo: "#password",
                  normalizer: function( value ) {
                    return $.trim( value );
                    },
                },
              
            },
            messages : {
                name : 'Tidak boleh kosong',
                email : 'Tidak boleh kosong',
                password : {
                    required : 'Tidak boleh kosong',
                    minlength : 'Minimal 6 karakter'
                        },
                password_confirm: {
                    required : 'Tidak boleh kosong',
                    equalTo : 'Password tidak sama'
                        }
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
                    data: $('#form-ubah-profil')
                            .serialize(), 
                    url: "{{ route('user.profil') }}",  
                    type: "POST",  
                    enctype: "multipart/form-data",
                    dataType: 'json', 
                    success: function (data) { 
                        $("#form-ubah-profil").validate().resetForm();
                        $('.form-control').removeClass('is-valid');
                        $('#form-ubah-profil').trigger("reset");  
                        $('#modal-ubah-profil').modal('hide'); 
                        $('#tombol-simpan_ubah').html('Simpan');  
                        var oTable = $('#table_user').dataTable();  
                        oTable.fnDraw(false); 
                        iziToast.success({ 
                            title: 'Data Berhasil Diubah',
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

    $('body').on('click', '.tombol-ubah-profil', function () {
        let data_id = $(this).attr('id');
        console.log(data_id);
        $.get('user/' + data_id + '/edit', function (data) {
            $('#modal-judul_ubah').html("Ubah Profil");
            $('#modal-ubah-profil').modal('show');    
            $('#id_profil').val(data.id);          
            $('#name_profil').val(data.name);
            $('#email_profil').val(data.email);
            $("#form-ubah-profil").validate().resetForm();
            $('.form-control').removeClass('is-valid');
            $('.form-control').removeClass('is-invalid');

        })
    });


</script>