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
    const form = document.getElementById('form_penilaian');
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
        simpanButton.disabled = !checkInputsValidity();
      });
    });

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

     // Disable "Simpan" button when modal is shown with empty inputs
     $('#modal_penilaian_magang').on('show.bs.modal', function () {
            simpanButton.disabled = !checkInputsValidity();
        });
  });



    var save_method; //for save method string
    var table;


    $(function () {
      // $("#example1").DataTable();
    table =   $('#tabel_view').DataTable({
        "ajax": {
            "url": "<?php echo site_url('penilaian_magang/data_list')?>",
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

    function tambah_penilaian() {
      email.style.display = 'none';
         $('#form_penilaian')[0].reset(); // reset form on modals
         save_method = 'add';
         $('#title').text('Tambah Penilaian Magang'); //change
        $('#modal_penilaian_magang').modal('show');    
    }

    function save()
    {
        $('#btnSave').text('Proses menyimpan...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;
        if(save_method == 'add') {
            url = "<?php echo site_url('Penilaian_magang/ajax_add')?>";
            var pesan = ' Menambah data';
        }else if(save_method == 'email'){
          url = "<?php echo site_url('Penilaian_magang/kirim_email')?>";
            var pesan = ' Kirim Email';
        } else {
            url = "<?php echo site_url('Penilaian_magang/ajax_update')?>";
            var pesan = ' Edit data';
        }

        var formData = new FormData($('#form_penilaian')[0]);
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
                    $('#modal_penilaian_magang').modal('hide');
                    reload_table();
                    Toastify({
                        text: "Berhasil " + pesan,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#33cc33",
                    }).showToast();
                } else {
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

    function edit_penilaian_magang(id)
    {
      email.style.display = 'none';
        save_method = 'update';
        $('#form_penilaian')[0].reset(); // reset form on modals


        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('penilaian_magang/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
            $('[name="id_penilaian"]').val(data.id_penilaian);
            $('[name="id_magang"]').val(data.id_magang);
            $('[name="nilai_bulan1"]').val(data.nilai_bulan1);
            $('[name="nilai_bulan2"]').val(data.nilai_bulan2);
            $('[name="nilai_bulan3"]').val(data.nilai_bulan3);
            $('[name="tes_mengajar"]').val(data.tes_mengajar);
            $('[name="total_nilai"]').val(data.total_nilai);
            $('[name="status_lanjut"]').val(data.status_lanjut);
            $('[name="keterangan"]').val(data.keterangan);
            $('[name="keputusan"]').val(data.keputusan);
            $('[name="tgl_penilaian"]').val(data.tgl_penilaian);
            $('[name="yang_menilai"]').val(data.yang_menilai);
            $('#title').text('Edit Penilaian Magang'); //change 
            $('#modal_penilaian_magang').modal('show'); // show bootstrap modal when complete loaded
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function kirim_email(id)
    {
        save_method = 'email';
        $('#form_penilaian')[0].reset(); // reset form on modals
        email.style.display = 'blok';

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('penilaian_magang/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
            $('[name="id_penilaian"]').val(data.id_penilaian);
            $('[name="id_magang"]').val(data.id_magang);
            $('[name="nilai_bulan1"]').val(data.nilai_bulan1);
            $('[name="nilai_bulan2"]').val(data.nilai_bulan2);
            $('[name="nilai_bulan3"]').val(data.nilai_bulan3);
            $('[name="tes_mengajar"]').val(data.tes_mengajar);
            $('[name="total_nilai"]').val(data.total_nilai);
            $('[name="status_lanjut"]').val(data.status_lanjut);
            $('[name="keterangan"]').val(data.keterangan);
            $('[name="keputusan"]').val(data.keputusan);
            $('[name="tgl_penilaian"]').val(data.tgl_penilaian);
            $('[name="yang_menilai"]').val(data.yang_menilai);
            $('[name="email"]').val(data.email);
            $('[name="nama_pelamar"]').val(data.nama_pelamar);
            $('#title').text('Kirim Email'); //change 
            $('#btnSave').text('Kirim Email'); //change
            $('#modal_penilaian_magang').modal('show'); // show bootstrap modal when complete loaded
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
<div id="modal_penilaian_magang" class="modal fade bd-example-modal-sm"  tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card height-equal">
                    <div class="card-header">
                        <!-- <h4>Penilaian Magang</h4> -->
                        <h4 id="title"></h4>
                    </div>
                  <div class="card-body custom-input">
                    <form action="#" id="form_penilaian" class="row g-3">
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="nama_lembaga">Nama Lengkap</label>
                        <input type="hidden" name="id_penilaian">
                        <select name="id_magang" id="" class="form-control">
                            <option value=""></option>
                            <?php $data = $this->db->query('select id_magang, nama_pelamar from magang, pelamar where magang.nik = pelamar.nik')->result();
                                foreach($data as $umana){
                            ?>
                            <option value="<?php echo $umana->id_magang; ?>"><?php echo $umana->nama_pelamar; ?></option>
                        <?php } ?>
                        </select>  
                    </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="nilai_bulan1">Nilai Bulan 1</label>
                        <input class="form-control" id="nilai_bulan1" name="nilai_bulan1" type="number" required="">
                        <div id="error_nilai1" class="invalid-feedback">Nilai harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="nilai_bulan2">Nilai Bulan 2</label>
                        <input class="form-control" id="nilai_bulan2" name="nilai_bulan2" type="number"  required="">
                        <div id="error_nilai2" class="invalid-feedback">Nilai harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="nilai_bulan3">Nilai Bulan 3</label>
                        <input class="form-control" id="nilai_bulan3" name="nilai_bulan3" type="number"  required="">
                        <div id="error_nilai3" class="invalid-feedback">Nilai harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="tes_mengajar">Tes Mengajar</label>
                        <input class="form-control" id="tes_mengajar" name="tes_mengajar" type="number"required="">
                        <div id="error_tes_mengajar" class="invalid-feedback"> harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="total_nilai">Total Nilai</label>
                        <input class="form-control" id="total_nilai" name="total_nilai" type="number"required="">
                        <div id="error_nilai_total" class="invalid-feedback">Total Nilai harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="status_lanjut">Status Lanjut</label>
                        <select name="status_lanjut" class="form-control">
                            <option value=""></option>
                            <option>Lanjut Karyawan Tetap</option>
                            <option>Tidak</option>
                        </select>
                        <div id="error_status" class="invalid-feedback">status harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="keputusan">Keputusan</label>
                        <input class="form-control" id="keputusan" name="keputusan" type="text" required=""> 
                        <div id="error_keputusan" class="invalid-feedback">Keputusan harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="keterangan">Keterangan</label>
                        <input class="form-control" id="keterangan" name="keterangan" type="text" required=""> 
                        <div id="error_keterangan" class="invalid-feedback">Keterangan harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="tgl_penilaian">Tgl Penilaian</label>
                        <input class="form-control" id="tgl_penilaian" name="tgl_penilaian" type="date" required=""> 
                        <div id="error_tgl" class="invalid-feedback"> harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="yang_menilai">Yang Menilai</label>
                        <input class="form-control" id="yang_menilai" name="yang_menilai" type="text" required=""> 
                        <div id="error_menilai" class="invalid-feedback">harus diisi.</div>  
                      </div>
                      <div class="col-6" id="email"> 
                        <label class="form-label fw-bold" for="email">Email</label>
                        <input type="text" name="email">
                        <input type="text" name="nama_pelamar">
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