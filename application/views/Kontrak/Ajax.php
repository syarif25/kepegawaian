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
   document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formKontrak');
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
     $('#modal_kontrak').on('show.bs.modal', function () {
            simpanButton.disabled = !checkInputsValidity();
        });
  });

    var save_method; //for save method string
    var table;


    $(function () {
      // $("#example1").DataTable();
    table =   $('#tabel_view').DataTable({
        "ajax": {
            "url": "<?php echo site_url('kontrak_kerja/data_list')?>",
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

    function tambah_kontrak() {
         $('#formKontrak')[0].reset(); // reset form on modals
         save_method = 'add';
        $('#modal_kontrak').modal('show');    
    }

    function save()
    {
        $('#btnSave').text('Proses menyimpan...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;
        if(save_method == 'add') {
            url = "<?php echo site_url('kontrak_kerja/ajax_add')?>";
            var pesan = ' Menambah data';
        } else {
            url = "<?php echo site_url('kontrak_kerja/ajax_update')?>";
            var pesan = ' Edit data';
        }

        var formData = new FormData($('#formKontrak')[0]);
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
                    $('#modal_kontrak').modal('hide');
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

    function edit_kontrak(id)
    {
        save_method = 'update';
        $('#formKontrak')[0].reset(); // reset form on modal

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('kontrak_kerja/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
            $('[name="id_kontrak"]').val(data.id_kontrak);
            $('[name="nik"]').val(data.nik);
            $('[name="no_sk_kerja"]').val(data.no_sk_kerja);
            $('[name="penempatan"]').val(data.penempatan);
            $('[name="tgl_mulai_tugas"]').val(data.tgl_mulai_tugas);
            $('[name="no_surat_yayasan"]').val(data.no_surat_yayasan);
            $('[name="tgl_pengesahan"]').val(data.tgl_pengesahan);
            $('[name="yang_mengesahkan"]').val(data.yang_mengesahkan);
            $('[name="status"]').val(data.status);
            $('[name="jabatan"]').val(data.jabatan);
            $('[name="nidn"]').val(data.nidn);
            $('[name="jabatan_struktural"]').val(data.jabatan_struktural);
            $('[name="jabatan_akademik"]').val(data.jabatan_akademik);
            $('[name="tgl_awal_mengabdi"]').val(data.tgl_awal_mengabdi);
            $('[name="gaji"]').val(data.gaji);
            $('[name="awal_kontrak"]').val(data.awal_kontrak);
            $('[name="akhir_kontrak"]').val(data.akhir_kontrak);
            $('#modal_kontrak').modal('show'); // show bootstrap modal when complete loaded
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
<div id="modal_kontrak" class="modal fade bd-example-modal-sm"  tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card height-equal">
                    <div class="card-header">
                        <h4>Data Kontrak Kerja</h4>
                    </div>
                  <div class="card-body custom-input">
                    <form action="#" id="formKontrak" class="row g-3">
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="nama_lembaga">Nama Lengkap</label>
                        <input type="hidden" name="id_kontrak">
                        <select name="nik" id="" class="form-control">
                            <option value=""></option>
                            <?php $data = $this->db->get('pelamar')->result();
                                foreach($data as $umana){
                            ?>
                            <option value="<?php echo $umana->nik; ?>"><?php echo $umana->nama_pelamar; ?></option>
                        <?php } ?>
                        </select>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="no_sk_kerja">No SK Kerja</label>
                        <input class="form-control" id="no_sk_kerja" name="no_sk_kerja" type="text" required="">
                        <div id="error_nosk" class="invalid-feedback"> harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="penempatan">Penempatan</label>
                        <input class="form-control" id="penempatan" name="penempatan" type="text"  required="">
                        <div id="error_penempatan" class="invalid-feedback"> harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="tgl_mulai_tugas">Tanggal Mulai</label>
                        <input class="form-control" id="tgl_mulai_tugas" name="tgl_mulai_tugas" type="date"  required="">
                        <div id="error_tglmulai" class="invalid-feedback"> harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="no_surat_yayasan">No Surat Yayasan</label>
                        <input class="form-control" id="no_surat_yayasan" name="no_surat_yayasan" type="text"required="">
                        <div id="error_noyayasan" class="invalid-feedback"> harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="tgl_pengesahan">Tanggal Pengesahan</label>
                        <input class="form-control" id="tgl_pengesahan" name="tgl_pengesahan" type="date" required=""> 
                        <div id="error_tglpengesahan" class="invalid-feedback"> harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="yang_mengesahkan">yang Mengesahkan</label>
                        <input class="form-control" id="yang_mengesahkan" name="yang_mengesahkan" type="text" required=""> 
                        <div id="error_mengesahkan" class="invalid-feedback"> harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="status">Status</label>
                        <select id="status" name="status" class="form-control">
                            <option value=""></option>
                            <option>Aktif</option>
                            <option>Cuti</option>
                        </select>
                        <div id="error_status" class="invalid-feedback"> harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="jabatan">Jabatan</label>
                        <select class="form-control" id="jabatan" name="jabatan">
                          <option value=""></option>
                          <option >Dosen</option>
                          <option >Tendik</option>
                        </select>
                        <div id="error_jabatan" class="invalid-feedback"> harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="nidn">NIDN</label>
                        <input class="form-control" id="nidn" name="nidn" type="text" required=""> 
                        <div id="error_nidn" class="invalid-feedback"> harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="jabatan_struktural">Jabatan Struktural</label>
                        <input class="form-control" id="jabatan_struktural" name="jabatan_struktural" type="text" required=""> 
                        <div id="error_stuktural" class="invalid-feedback"> harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="jabatan_akademik">Jabatan Akademik</label>
                        <input class="form-control" id="jabatan_akademik" name="jabatan_akademik" type="text" required=""> 
                        <div id="error_akademik" class="invalid-feedback"> harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="tgl_awal_mengabdi">Tanggal Awal Mengabdi</label>
                        <input class="form-control" id="tgl_awal_mengabdi" name="tgl_awal_mengabdi" type="date" required=""> 
                        <div id="error_awal" class="invalid-feedback"> harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="gaji">Gaji</label>
                        <input class="form-control" id="gaji" name="gaji" type="number" required=""> 
                        <div id="error_gaji" class="invalid-feedback"> harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="awal_kontrak">Awal Kontrak</label>
                        <input class="form-control" id="awal_kontrak" name="awal_kontrak" type="date" required=""> 
                        <div id="error_kontrak" class="invalid-feedback"> harus diisi.</div>  
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="akhir_kontrak">Akhir Kontrak</label>
                        <input class="form-control" id="akhir_kontrak" name="akhir_kontrak" type="date" required=""> 
                        <div id="error_akhirkontrak" class="invalid-feedback"> harus diisi.</div>  
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