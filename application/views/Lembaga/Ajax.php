    <!-- latest jquery-->
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <!-- Bootstrap js-->
    <script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="<?php echo base_url() ?>assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/icons/feather-icon/feather-icon.js"></script>
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
    <!-- <script src="<?php echo base_url() ?>assets/js/notify/custom-notify.js"></script> -->
    <!-- Plugin used-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <!-- Theme js-->
    <script src="<?php echo base_url() ?>assets/js/script.js"></script>
    <script src="<?php echo base_url() ?>assets/js/theme-customizer/customizer.js"></script>
    <!-- Plugin used-->
    <script>
        <?php if ($this->session->flashdata('success')) { ?>
            toastr.success('<?php echo $this->session->flashdata('success'); ?>');
        <?php } elseif ($this->session->flashdata('error')) { ?>
            toastr.error('<?php echo $this->session->flashdata('error'); ?>');
        <?php } ?>
    </script>

    <script>
      
    var save_method; //for save method string
    var table;


    $(function () {
      // $("#example1").DataTable();
        table =   $('#tabel_view').DataTable({
        "ajax": {
            "url": "<?php echo site_url('lembaga/data_list')?>",
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

    function tambah_lembaga() {
         $('#lembagaForm')[0].reset(); // reset form on modals
         save_method = 'add';
        $('#modal_lembaga').modal('show');    
    }

    function save()
    {
        $('#btnSave').text('Proses menyimpan...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;
        if(save_method == 'add') {
            url = "<?php echo site_url('lembaga/ajax_add')?>";
            var pesan = ' Menambah data';
        } else {
            url = "<?php echo site_url('lembaga/ajax_update')?>";
            var pesan = ' Edit data';
        }

        var formData = new FormData($('#lembagaForm')[0]);
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
                    $('#modal_lembaga').modal('hide');
                    reload_table();
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

    function edit_lembaga(id)
    {
        save_method = 'update';
        $('#lembagaForm')[0].reset(); // reset form on modals


        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('lembaga/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
            $('[name="id_lembaga"]').val(data.id_lembaga);
            $('[name="nama_lembaga"]').val(data.nama_lembaga);
            $('[name="dekan"]').val(data.dekan);
            $('[name="wadek1"]').val(data.wadek1);
            $('[name="wadek2"]').val(data.wadek2);
            $('[name="wadek3"]').val(data.wadek3);
            $('[name="ktu"]').val(data.ktu);
            $('#modal_lembaga').modal('show'); // show bootstrap modal when complete loaded
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

    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('lembagaForm');
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
            input.addEventListener('blur', function () {
                if (!input.checkValidity()) {
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }

                // Memeriksa validitas semua input setiap kali ada perubahan
                simpanButton.disabled = !checkInputsValidity();
            });
        });

        form.addEventListener('submit', function (event) {
            if (!checkInputsValidity()) {
                event.preventDefault();
                inputs.forEach(input => {
                    if (!input.checkValidity()) {
                        input.classList.add('is-invalid');
                    }
                });
            }
        });

         // Disable "Simpan" button when modal is shown with empty inputs
         $('#modal_lembaga').on('show.bs.modal', function () {
            simpanButton.disabled = !checkInputsValidity();
        });
    });
</script>
<!-- Small modal-->
<div id="modal_lembaga" class="modal fade bd-example-modal-sm"  tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card height-equal">
                    <div class="card-header">
                        <h4>Data Lembaga</h4>
                    </div>
                  <div class="card-body custom-input">
                    <form action="#" id="lembagaForm" class="row g-3">
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="nama_lembaga">Nama Lembaga</label>
                        <input type="hidden" name="id_lembaga">
                        <input class="form-control" id="nama_lembaga" name="nama_lembaga" type="text" placeholder="Nama Lembaga" required="">
                        <div id="error_nama_lembaga" class="invalid-feedback">Nama Lembaga harus diisi.</div>  
                    </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="dekan">Nama Dekan</label>
                        <input class="form-control" id="dekan" name="dekan" type="text" placeholder="Nama Dekan" required="">
                        <div id="error_dekan" class="invalid-feedback">Nama Dekan harus diisi.</div>  
                    </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="wadek1">Nama Wadek 1</label>
                        <input class="form-control" id="wadek1" name="wadek1" type="text" placeholder="Nama Wadek 1" required="">
                        <div id="error_wadek1" class="invalid-feedback">Nama Wadek 1 harus diisi.</div>    
                    </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="wadek2">Nama Wadek 2</label>
                        <input class="form-control" id="wadek2" name="wadek2" type="text" placeholder="Nama Wadek 2" required="">
                        <div id="error_wadek2" class="invalid-feedback">Nama Wadek 2 harus diisi.</div>    
                    </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="wadek3">Nama Wadek 3</label>
                        <input class="form-control" id="wadek3" name="wadek3" type="text" placeholder="Nama Wadek 3" required="">
                        <div id="error_wadek3" class="invalid-feedback">Nama Wadek 3 harus diisi.</div>    
                    </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="ktu">Nama KTU</label>
                        <input class="form-control" id="ktu" name="ktu" type="text" placeholder="Nama Ka. TU" required=""> 
                        <div id="error_ktu" class="invalid-feedback">Nama KTU harus diisi.</div>    
                    </div>
                      <div class="col-12">
                        <button class="btn btn-primary" type="submit" id="btnSave" onclick="save()">Simpan</button>
                      </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>