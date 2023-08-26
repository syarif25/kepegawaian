 <!-- Container-fluid starts-->
<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
            <div class="col-6">
                <!-- <h4>Basic DataTables</h4> -->
                <button class="btn btn-pill btn-outline-primary btn-air-primary" href="#" onclick="tambah_magang()">Tambah Data</button>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">                                       
                    <svg class="stroke-icon">
                        <use href="<?php echo base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                    </svg></a></li>
                <li class="breadcrumb-item">Master</li>
                <li class="breadcrumb-item active">Data Magang</li>
                </ol>
            </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0 card-no-border">
                    <h4>Data Magang</h4>
                    <!-- <span>DataTablesdded to the table, as shown in this example.</span> -->
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="tabel_view">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Penempatan</th>
                                <th>Mulai Tugas</th>
                                <th>No Surat Yayasan</th>
                                <th>Tgl Pengesahan</th>
                                <th>Yang Mengesahkan</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>