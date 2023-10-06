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
        // Check for success or error flash messages
        var successMessage = "<?php echo $this->session->flashdata('success'); ?>";
        var errorMessage = "<?php echo $this->session->flashdata('error'); ?>";

        if (successMessage) {
            // Display a success toast notification
            Toastify({
                text: successMessage,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#33cc33",
            }).showToast();
        } else if (errorMessage) {
            // Display an error toast notification
            Toastify({
                text: errorMessage,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#ff0000", // You can change the background color for errors
            }).showToast();
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('berkasform');
        const inputs = form.querySelectorAll('input');
        const simpanButton = document.getElementById('btnSave');

        function checkInputsValidity() {
        let allValid = true;
        inputs.forEach(input => {
            if (!input.checkValidity()) {
            allValid = false;
            }
        });
        return allValid;
        }

        inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (!input.checkValidity()) {
            input.classList.add('is-invalid');
            } else {
            input.classList.remove('is-invalid');
            }

            // Memeriksa validitas semua input setiap kali ada perubahan
            // simpanButton.disabled = !checkInputsValidity();
        });
        });

        // form.addEventListener('submit', function(event) {
        //   if (!checkInputsValidity()) {
        //     event.preventDefault();
        //     inputs.forEach(input => {
        //       if (!input.checkValidity()) {
        //         input.classList.add('is-invalid');
        //       }
        //     });
        //   }
        // });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const form_tulis = document.getElementById('form_tulis');
        const inputs_tulis = form_tulis.querySelectorAll('input');
        const simpanButton_tulis = document.getElementById('btnSaveTulis');

        function checkInputsValidity() {
        let allValid = true;
        inputs_tulis.forEach(input => {
            if (!input.checkValidity()) {
            allValid = false;
            }
        });
        return allValid;
        }

        inputs_tulis.forEach(input => {
        input.addEventListener('blur', function() {
            if (!input.checkValidity()) {
            input.classList.add('is-invalid');
            } else {
            input.classList.remove('is-invalid');
            }

            // Memeriksa validitas semua input setiap kali ada perubahan
            simpanButton_tulis.disabled = !checkInputsValidity();
        });
        });

        form_tulis.addEventListener('submit', function(event) {
          if (!checkInputsValidity()) {
            event.preventDefault();
            inputs_tulis.forEach(input => {
              if (!input.checkValidity()) {
                input.classList.add('is-invalid');
              }
            });
          }
        });
    });

  
    var save_method; //for save method string
    var table;


    $(function () {
      // $("#example1").DataTable();
    table =   $('#tabel_view').DataTable({
        "ajax": {
            "url": "<?php echo site_url('seleksi/data_list')?>",
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
    
    table_wawancara =   $('#tabel_view_wawancara').DataTable({
        "ajax": {
            "url": "<?php echo site_url('seleksi/data_list_wawancara')?>",
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


        table_tulis =   $('#tabel_view_tulis').DataTable({
        "ajax": {
            "url": "<?php echo site_url('seleksi/data_list_tulis')?>",
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

   
    function save()
    {
        $('#btnSave').text('Proses menyimpan...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;
        if(save_method == 'berkas') {
            url = "<?php echo site_url('seleksi/update_berkas')?>";
            var pesan = ' Edit data';
            var formData = new FormData($('#berkasform')[0]);
        } else if(save_method == 'wawancara') {
            url = "<?php echo site_url('seleksi/update_wawancara')?>";
            var pesan = ' Edit data';
            var formData = new FormData($('#form_wawancara')[0]);
        } else {
            url = "<?php echo site_url('seleksi/update_tulis')?>";
            var pesan = ' Edit data';
            var formData = new FormData($('#form_tulis')[0]);
        }
      
        
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
                    $('#modal_seleksi_berkas').modal('hide');
                    $('#modal_seleksi_tulis').modal('hide');
                    $('#modal_wawancara').modal('hide');
                    reload_table();
                    reload_table_tulis();
                    reload_table_wawancara();
                    Toastify({
                    text: "Berhasil " + pesan,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#33cc33",
                }).showToast();
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

    function edit_seleksi_berkas(id)
    {
        save_method = 'berkas';
        $('#berkasform')[0].reset(); // reset form on modals


        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('pelamar/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
            $('[name="id_pelamar"]').val(data.id_pelamar);
            $('[name="nama_pelamar"]').val(data.nama_pelamar);
            $('[name="rencana_jabatan"]').val(data.rencana_jabatan);
            $('[name="nilai"]').val(data.penilaian_berkas);
            $('[name="tanggal_test_berkas"]').val(data.tanggal_test_berkas);
            $('#modal_seleksi_berkas').modal('show'); // show bootstrap modal when complete loaded
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function edit_seleksi_tulis(id)
    {
        save_method = 'tulis';
        $('#form_tulis')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('pelamar/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
            $('[name="id_pelamar"]').val(data.id_pelamar);
            $('[name="nama_pelamar"]').val(data.nama_pelamar);
            $('[name="rencana_jabatan"]').val(data.rencana_jabatan);
            $('[name="nilai_test_tulis"]').val(data.nilai_test_tulis);
            $('[name="tanggal_test_tulis"]').val(data.tanggal_lamaran);
            $('#modal_seleksi_tulis').modal('show'); // show bootstrap modal when complete loaded
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function edit_wawancara(id)
    {
        save_method = 'wawancara';
        $('#form_wawancara')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('pelamar/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
            $('[name="id_pelamar"]').val(data.id_pelamar);
            $('[name="nama_pelamar"]').val(data.nama_pelamar);
            $('[name="rencana_jabatan"]').val(data.rencana_jabatan);
            $('[name="nilai_wawancara"]').val(data.nilai_wawancara);
            $('[name="tanggal_wawancara"]').val(data.tanggal_wawancara);
            $('#modal_wawancara').modal('show'); // show bootstrap modal when complete loaded
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

    function reload_table_tulis()
    {
        table_tulis.ajax.reload(null,false); //reload datatable ajax 
    }

    function reload_table_wawancara()
    {
        table_wawancara.ajax.reload(null,false); //reload datatable ajax 
    }

</script>
<!-- Berkas modal-->
<div id="modal_seleksi_berkas" class="modal fade bd-example-modal-sm"  tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card height-equal">
                    <div class="card-header">
                        <h4>Seleksi Berkas</h4>
                    </div>
                  <div class="card-body custom-input">
                    <form action="#" id="berkasform" class="row g-3">
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="nama_pelamar">Nama Lengkap</label>
                        <input type="hidden" name="id_pelamar">
                        <input class="form-control" readonly id="nama_pelamar" name="nama_pelamar" type="text" placeholder="Nama Lengkap" required="">
                        <div id="error_nama" class="invalid-feedback">Nama Lengkap harus diisi.</div>    
                    </div>
                     <div class="col-6"> 
                        <label class="form-label fw-bold" for="rencana_jabatan">Rencana Jabatan</label>
                        <input class="form-control" readonly id="rencana_jabatan" name="rencana_jabatan" type="text" placeholder="Rencana Jabatan" required="">
                        <div id="error_jabatan" class="invalid-feedback">Nama Lengkap harus diisi.</div>    
                    </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="nilai">Nilai</label>
                        <input class="form-control" id="nilai" name="nilai" type="number" placeholder="" required=""> 
                        <div id="error_nilai_berkas" class="invalid-feedback">Nilai harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="file_berkas">File Berkas</label>
                        <input class="form-control" id="file_berkas" name="file_berkas" type="file"  required=""> 
                        <!-- <div id="error_file_berkas" class="invalid-feedback">File Berkas harus diisi.</div>   -->
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="tanggal_test_berkas">Tanggal Test</label>
                        <input class="form-control" id="tanggal_test_berkas" name="tanggal_test_berkas" type="date"  required="">
                        <div id="error_tanggal" class="invalid-feedback">Tanggal harus diisi.</div>   
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

<!-- Test Tulis modal-->
<div id="modal_seleksi_tulis" class="modal fade bd-example-modal-sm"  tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card height-equal">
                    <div class="card-header">
                        <h4>Seleksi Tulis</h4>
                    </div>
                  <div class="card-body custom-input">
                    <form action="#" id="form_tulis" class="row g-3">
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="nama_pelamar">Nama Lengkap</label>
                        <input type="hidden" name="id_pelamar">
                        <input class="form-control" readonly id="nama_pelamar" name="nama_pelamar" type="text" placeholder="Nama Lengkap" required="">
                      </div>
                     <div class="col-6"> 
                        <label class="form-label fw-bold" for="rencana_jabatan">Rencana Jabatan</label>
                        <input class="form-control" readonly id="rencana_jabatan" name="rencana_jabatan" type="text" placeholder="Rencana Jabatan" required="">
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="nilai_test_tulis">Nilai</label>
                        <input class="form-control" id="nilai_test_tulis" name="nilai_test_tulis" type="number" required=""> 
                        <div id="error_nilai" class="invalid-feedback">Nilai harus diisi.</div>    
                    </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="tanggal_test_tulis">Tanggal</label>
                        <input class="form-control" id="tanggal_test_tulis" name="tanggal_test_tulis" type="date"  required=""> 
                        <div id="error_tanggal_tulis" class="invalid-feedback">Tanggal harus diisi.</div>    
                    </div>
                      <div class="col-12">
                        <button class="btn btn-primary" type="button" id="btnSaveTulis" onclick="save()">Simpan</button>
                      </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>

<!-- Wawancara modal-->
<div id="modal_wawancara" class="modal fade bd-example-modal-sm"  tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card height-equal">
                    <div class="card-header">
                        <h4>Seleksi Wawancara</h4>
                    </div>
                  <div class="card-body custom-input">
                    <form action="#" id="form_wawancara" class="row g-3">
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="nama_pelamar">Nama Lengkap</label>
                        <input type="hidden" name="id_pelamar">
                        <input class="form-control" readonly id="nama_pelamar" name="nama_pelamar" type="text" placeholder="Nama Lengkap" required="">
                        <div id="error_nama_pelamar" class="invalid-feedback">Nama Lengkap harus diisi.</div>    
                    </div>
                     <div class="col-6"> 
                        <label class="form-label fw-bold" for="rencana_jabatan">Rencana Jabatan</label>
                        <input class="form-control" readonly id="rencana_jabatan" name="rencana_jabatan" type="text" placeholder="Rencana Jabatan" required="">
                        <div id="error_rencana_jabatan" class="invalid-feedback">Nama Lengkap harus diisi.</div>    
                    </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="nilai_wawancara">Nilai</label>
                        <input class="form-control" id="nilai_wawancara" name="nilai_wawancara" type="number" placeholder="" required=""> 
                        <div id="error_nilai" class="invalid-feedback">Nilai harus diisi.</div>    
                    </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="tanggal_wawancara">Tanggal</label>
                        <input class="form-control" id="tanggal_wawancara" name="tanggal_wawancara" type="date"  required=""> 
                        <div id="error_nilai" class="invalid-feedback">Tanggal harus diisi.</div>   
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