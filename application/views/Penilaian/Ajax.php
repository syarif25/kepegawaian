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
    <!-- Script untuk menampilkan notifikasi jika ada -->
    <?php if ($this->session->flashdata('message')): ?>
        <script>
            $(document).ready(function() {
                $.toast({
                    text: '<?php echo $this->session->flashdata('message'); ?>',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 3000, // Durasi notifikasi ditampilkan (ms)
                    stack: 6 // Maksimum notifikasi yang ditumpuk
                });
            });
        </script>
    <?php endif; ?>

    <script>
   
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
         $('#form')[0].reset(); // reset form on modals
         save_method = 'add';
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
        } else {
            url = "<?php echo site_url('Penilaian_magang/ajax_update')?>";
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
                    $('#modal_penilaian_magang').modal('hide');
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

    function edit_penilaian_magang(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals


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
                        <h4>Penilaian Magang</h4>
                    </div>
                  <div class="card-body custom-input">
                    <form action="#" id="form" class="row g-3">
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
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="nilai_bulan2">Nilai Bulan 2</label>
                        <input class="form-control" id="nilai_bulan2" name="nilai_bulan2" type="number"  required="">
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="nilai_bulan3">Nilai Bulan 3</label>
                        <input class="form-control" id="nilai_bulan3" name="nilai_bulan3" type="number"  required="">
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="tes_mengajar">Tes Mengajar</label>
                        <input class="form-control" id="tes_mengajar" name="tes_mengajar" type="number"required="">
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="total_nilai">Total Nilai</label>
                        <input class="form-control" id="total_nilai" name="total_nilai" type="number"required="">
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="status_lanjut">Status Lanjut</label>
                        <select name="status_lanjut" class="form-control">
                            <option value=""></option>
                            <option>Lanjut Karyawan Tetap</option>
                            <option>Tidak</option>
                        </select>
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="keputusan">Keputusan</label>
                        <input class="form-control" id="keputusan" name="keputusan" type="text" required=""> 
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="keterangan">Keterangan</label>
                        <input class="form-control" id="keterangan" name="keterangan" type="text" required=""> 
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="tgl_penilaian">Tgl Penilaian</label>
                        <input class="form-control" id="tgl_penilaian" name="tgl_penilaian" type="date" required=""> 
                      </div>
                      <div class="col-6"> 
                        <label class="form-label fw-bold" for="yang_menilai">Yang Menilai</label>
                        <input class="form-control" id="yang_menilai" name="yang_menilai" type="text" required=""> 
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