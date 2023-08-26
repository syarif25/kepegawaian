    <!-- latest jquery-->
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <!-- Bootstrap js-->
    <script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <!-- <script src="<?php echo base_url() ?>assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/icons/feather-icon/feather-icon.js"></script> -->
    <!-- scrollbar js-->
    <script src="<?php echo base_url() ?>assets/js/scrollbar/simplebar.js"></script>
    <script src="<?php echo base_url() ?>assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="<?php echo base_url() ?>assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="<?php echo base_url() ?>assets/js/sidebar-menu.js"></script>
    <script src="<?php echo base_url() ?>assets/js/slick/slick.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/slick/slick.js"></script>
    <script src="<?php echo base_url() ?>assets/js/header-slick.js"></script>
    <script src="<?php echo base_url() ?>assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/datatable/datatables/datatable.custom.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?php echo base_url() ?>assets/js/script.js"></script>
    <!-- <script src="<?php echo base_url() ?>assets/js/theme-customizer/customizer.js"></script> -->
    <!-- Plugin used-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
    $(document).ready(function() {
        var flashMessage = "<?php echo $this->session->flashdata('success'); ?>";
    console.log("Flash Message: ", flashMessage);
    
        Toastify({
            text: "<?php echo $this->session->flashdata('success'); ?>",
            duration: 3000,
            close: true,
            gravity: "top", // Tampilan toast di bagian bawah
            position: "right", // Tampilan toast di sisi kanan
            backgroundColor: "#33cc33", // Warna latar belakang toast
        }).showToast();
    });

    var save_method; //for save method string
    var table;


    $(function () {
      // $("#example1").DataTable();
    table =   $('#tabel_view').DataTable({
        "ajax": {
            "url": "<?php echo site_url('pelamar/data_list')?>",
            "type": "POST"
        },

        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
        ],  

        "paging": true,
        "searching": true,
        "ordering": true,
        });
    });

    function tambah_pelamar() {
         $('#form')[0].reset(); // reset form on modals
         save_method = 'add';
        $('#modal_pelamar').modal('show');    
    }

    function save()
    {
        $('#btnSave').text('Proses menyimpan...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;
        if(save_method == 'add') {
            url = "<?php echo site_url('pelamar/ajax_add')?>";
            var pesan = ' Menambah data';
        } else {
            url = "<?php echo site_url('pelamar/ajax_update')?>";
            var pesan = ' Edit data';
        }

        var formData = new FormData($('#form')[0]);
        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data)
            {
                if(data.status) //if success close modal and reload ajax table
                {
                    $('#modal_pelamar').modal('hide');
                    reload_table();
                    // notif(pesan);
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 

            }
        }); 
    }

    function edit_pelamar(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals


        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('pelamar/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
            $('[name="id_pelamar"]').val(data.id_pelamar);
            $('[name="nama_pelamar"]').val(data.nama_pelamar);
            $('[name="nik"]').val(data.nik);
            $('[name="tempat_lahir"]').val(data.tempat_lahir);
            $('[name="tanggal_lahir"]').val(data.tanggal_lahir);
            $('[name="rencana_jabatan"]').val(data.rencana_jabatan);
            $('[name="alamat"]').val(data.alamat);
            $('[name="no_hp"]').val(data.no_hp);
            $('[name="email"]').val(data.email);
            $('[name="tanggal_lamaran"]').val(data.tanggal_lamaran);
            $('#modal_pelamar').modal('show'); // show bootstrap modal when complete loaded
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax 
    }

</script>
<!-- Small modal-->
<div id="modal_pelamar" class="modal fade bd-example-modal-sm"  tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card height-equal">
                    <div class="card-header">
                        <h4>Data Pelamar</h4>
                    </div>
                  <div class="card-body custom-input">
                    <form action="#" id="form" class="row g-3">
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="nama_pelamar">Nama Lengkap</label>
                        <input type="hidden" name="id_pelamar">
                        <input class="form-control" id="nama_pelamar" name="nama_pelamar" type="text" placeholder="Nama Lengkap" required="">
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="nik">NIK</label>
                        <input class="form-control" id="nik" name="nik" type="text" placeholder="NIK" required="">
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="tempat_lahir">Tempat Lahir</label>
                        <input class="form-control" id="tempat_lahir" name="tempat_lahir" type="text" placeholder="Tempat Lahir" required="">
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="tanggal_lahir">Tanggal Lahir</label>
                        <input class="form-control" id="tanggal_lahir" name="tanggal_lahir" type="date" required="">
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="rencana_jabatan">Rencana Jabatan</label>
                        <input class="form-control" id="rencana_jabatan" name="rencana_jabatan" type="text" placeholder="Rencana Jabatan" required="">
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="alamat">Alamat</label>
                        <input class="form-control" id="alamat" name="alamat" type="text" placeholder="Alamat" required=""> 
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="no_hp">Nomor HP</label>
                        <input class="form-control" id="no_hp" name="no_hp" type="text" placeholder="No HP" required=""> 
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="email" placeholder="email" required=""> 
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="tanggal_lamaran">Tanggal Lamaran</label>
                        <input class="form-control" id="tanggal_lamaran" name="tanggal_lamaran" type="date" required=""> 
                      </div>
                      <div class="col-12">
                        <button class="btn btn-primary" type="button" id="btnSave" onclick="save()">Simpan</button>
                      </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>