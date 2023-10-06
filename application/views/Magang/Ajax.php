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
    <script src="<?php echo base_url() ?>assets/js/notify/custom-notify.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?php echo base_url() ?>assets/js/script.js"></script>
    <script src="<?php echo base_url() ?>assets/js/theme-customizer/customizer.js"></script>
    <!-- Plugin used-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- Script untuk menampilkan notifikasi jika ada -->
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
    const form = document.getElementById('Magangform');
    const inputs = form.querySelectorAll('input');
    const simpanButton = document.getElementById('btnSave');
    const modal = document.getElementById('myModal');

    // Function to check the validity of all inputs
    function checkInputsValidity() {
        let allValid = true;
        inputs.forEach(input => {
            if (!input.checkValidity()) {
                allValid = false;
            }
        });
        return allValid;
    }

    // Function to enable or disable the Simpan button
    function updateSimpanButtonState() {
        simpanButton.disabled = !checkInputsValidity();
    }

    // Check the validity of inputs when they lose focus
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (!input.checkValidity()) {
                input.classList.add('is-invalid');
            } else {
                input.classList.remove('is-invalid');
            }

            updateSimpanButtonState();
        });
    });

    // Handle form submission
    form.addEventListener('submit', function(event) {
        if (!checkInputsValidity()) {
            event.preventDefault();
            inputs.forEach(input => {
                if (!input.checkValidity()) {
                    input.classList.add('is-invalid');
                }
            });
        }
    });

    // Initialize the state of the Simpan button when the modal is shown
    modal.addEventListener('show.bs.modal', function () {
        updateSimpanButtonState();
    });

    // Reset the form and input states when the modal is closed
    modal.addEventListener('hidden.bs.modal', function () {
        form.reset();
        inputs.forEach(input => {
            input.classList.remove('is-invalid');
        });
        updateSimpanButtonState();
    });
});

   
    var save_method; //for save method string
    var table;


    $(function () {
      // $("#example1").DataTable();
    table =   $('#tabel_view').DataTable({
        "ajax": {
            "url": "<?php echo site_url('magang/data_list')?>",
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

    function tambah_magang() {
         $('#Magangform')[0].reset(); // reset form on modals
         save_method = 'add';
        $('#modal_magang').modal('show');    
    }

    function save()
    {
        $('#btnSave').text('Proses menyimpan...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;
        if(save_method == 'add') {
            url = "<?php echo site_url('Magang/ajax_add')?>";
            var pesan = ' Menambah data';
        } else {
            url = "<?php echo site_url('Magang/ajax_update')?>";
            var pesan = ' Edit data';
        }

        var formData = new FormData($('#Magangform')[0]);
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
                    $('#modal_magang').modal('hide');
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

    function edit_magang(id)
    {
        save_method = 'update';
        $('#Magangform')[0].reset(); // reset form on modals


        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('magang/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
            $('[name="id_magang"]').val(data.id_magang);
            $('[name="nik"]').val(data.nik);
            $('[name="no_sk_magang"]').val(data.no_sk_magang);
            $('[name="penempatan_magang"]').val(data.penempatan_magang);
            $('[name="tgl_mulai"]').val(data.tgl_mulai);
            $('[name="no_surat_yayasan"]').val(data.no_surat_yayasan);
            $('[name="tgl_pengesahan"]').val(data.tgl_pengesahan);
            $('[name="yang_mengesahkan"]').val(data.yang_mengesahkan);
            $('#modal_magang').modal('show'); // show bootstrap modal when complete loaded
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
<div id="modal_magang" class="modal fade bd-example-modal-sm"  tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card height-equal">
                    <div class="card-header">
                        <h4>Data Lembaga</h4>
                    </div>
                  <div class="card-body custom-input">
                    <form action="#" id="Magangform" class="row g-3">
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="nama_lembaga">Nama Lengkap</label>
                        <input type="hidden" name="id_magang">
                        <select name="nik" id="" class="form-control">
                            <option value=""></option>
                            <?php $data = $this->db->get('pelamar')->result();
                                foreach($data as $umana){
                            ?>
                            <option value="<?php echo $umana->nik; ?>"><?php echo $umana->nama_pelamar; ?></option>
                        <?php } ?>
                        </select>  
                        <div id="error_nama" class="invalid-feedback">Nama harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="no_sk_magang">No SK Magang</label>
                        <input class="form-control" id="no_sk_magang" name="no_sk_magang" type="text" required="">
                        <div id="error_no_sk" class="invalid-feedback">No SK harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="penempatan_magang">Penempatan Magang</label>
                        <input class="form-control" id="penempatan_magang" name="penempatan_magang" type="text"  required="">
                        <div id="error_penempatan" class="invalid-feedback">Penempatan harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="tgl_mulai">Tanggal Mulai</label>
                        <input class="form-control" id="tgl_mulai" name="tgl_mulai" type="date"  required="">
                        <div id="error_tanggal" class="invalid-feedback">Tanggal harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="no_surat_yayasan">No Surat Yayasan</label>
                        <input class="form-control" id="no_surat_yayasan" name="no_surat_yayasan" type="text"required="">
                        <div id="error_surat" class="invalid-feedback">No Surat harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="tgl_pengesahan">Tanggal Pengesahan</label>
                        <input class="form-control" id="tgl_pengesahan" name="tgl_pengesahan" type="date" required=""> 
                        <div id="error_tanggal" class="invalid-feedback">Tanggal harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="yang_mengesahkan">yang Mengesahkan</label>
                        <input class="form-control" id="yang_mengesahkan" name="yang_mengesahkan" type="text" required=""> 
                        <div id="error_yang_menge" class="invalid-feedback"> harus diisi.</div>  
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