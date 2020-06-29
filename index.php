<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/dashboards/minimal/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>
<?php
if(isset($_POST['btn_tambah-kartukeluarga'])){
    $process = createKartuKeluarga();
    if($process){
        $msg_title = "Kartu Keluarga Ditambahkan";
        $msg_type = "success"; 
        $url_encyrpt = base64_encode($_POST['kartu-keluarga']);
        $url_redirect = "window.location.replace('beranda');"; 
        require_once("msg_alert.php");
        echo $msg_alert;
    }else{
        $msg_title = "Gagal";
        $msg_type = "error";
        $url_redirect = "window.location.replace('beranda');";
        require_once("msg_alert.php");
        echo $msg_alert;
    }
}

?>

<!-- Header -->
<div class="bg-white">
    <div class="content content-full">
        <div class="pt-50 pb-30 text-center">
            <h1 class="font-w300 mb-10">#LawanCOVID-19</h1>
            <h2 class="h4 text-muted font-w300 mb-0">Sistem Informasi Penyebaran Bantuan Langsung Tunai</h2>
        </div>
    </div>
</div>
<!-- END Header -->

<!-- Page Content -->
<div class="content">
    <div class="col-md-12">
        <div class="block block-themed">
            <div class="block-header bg-gd-emerald">
                <h3 class="block-title">Data Kependudukan: <span class="badge badge-success badge-pill"><span class="font-w700">20 </span>
                    <span class="text-muted text-white font-w300">KK</span></span>
                </h3>
                <div class="block-options">
                    <button type="button" class="btn btn-alt-info mr-20" data-toggle="modal" data-target="#modal-tambahkk">
                        <i class="si si-plus mr-5"></i>Tambah Data
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <h2 class="mt-20 h4 text-center text-muted font-w300 mb-0">KEPENDUDUKAN</h2>
                <h1 class="mb-30 font-w300 text-center mb-0">Data Kartu Keluarga</h1>
                <!-- Dynamic Table Full -->
                    <div class="block-content block-content-full">
                        <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center"></th>
                                    <th>Nomor Kartu Keluarga</th>
                                    <th>Kepala Keluarga</th>
                                    <th class="d-none d-sm-table-cell" style="width: 20%;">Status</th>
                                    <th class="text-center" style="width: 15%;">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $read_KepalaKeluarga = readKartuKeluarga();
                                    $no = 1;
                                    while ($data_KepalaKeluarga = mysqli_fetch_assoc($read_KepalaKeluarga) ){
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $no ?></td>
                                    <td class="font-w600"><?php echo $data_KepalaKeluarga['idkk'] ?></td>
                                    <td class="font-w600"><?php echo $data_KepalaKeluarga['nama'] ?></td>
                                    <td class="d-none d-sm-table-cell">
                                        <?php echo $data_KepalaKeluarga['nama']  ?>
                                    </td>
                                    <td class="text-center">
                                        
                                        <a href="kependudukan?detail= <?php echo base64_encode($data_KepalaKeluarga['idkk']) ?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Lihat Detail">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                <!-- END Dynamic Table Full -->
            </div>
        </div>
    </div>
    <br>
    <div class="col-md-12">
        <div class="block block-mode-hidden">
            <div class="block-header block-header-default">
                <h3 class="block-title">Tentang SIPBantu</h3>
                <div class="block-options">
                    <!-- To toggle block's content, just add the following properties to your button: data-toggle="block-option" data-action="content_toggle" -->
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <div id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="block block-bordered block-rounded mb-2">
                        <div class="block-header" role="tab" id="accordion_h1">
                            <a class="font-w600" data-toggle="collapse" data-parent="#accordion" href="#accordion_q1" aria-expanded="true" aria-controls="accordion_q1">1. Mengenal Lebih Dalam</a>
                        </div>
                        <div id="accordion_q1" class="collapse show" role="tabpanel" aria-labelledby="accordion_h1" data-parent="#accordion">
                            <div class="block-content">
                                <p class="text-align-justify">
                                    SIPBantu atau Sistem Informasi Penyebaran Bantuan Langsung Tunai 
                                    adalah sistem pendukung keputusan guna membantu penyaluran Bantuan Langsung Tunai dari Pemerintah saat pandemi Covid-19. Kalkulasi pada Sistem Informasi ini 
                                    menggunakan algoritma Simple Additive Weighting (SAW) menggunakan variabel yang ditentukan guna memaksimalkan penyaluran bantuan kepada keluarga yang tepat.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="block block-bordered block-rounded mb-2">
                        <div class="block-header" role="tab" id="accordion_h2">
                            <a class="font-w600" data-toggle="collapse" data-parent="#accordion" href="#accordion_q2" aria-expanded="true" aria-controls="accordion_q2">2. Penjelasan Penggunaan</a>
                        </div>
                        <div id="accordion_q2" class="collapse" role="tabpanel" aria-labelledby="accordion_h2" data-parent="#accordion">
                            <div class="block-content">
                                <?php $cb->get_text('small'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="block block-bordered block-rounded mb-2">
                        <div class="block-header" role="tab" id="accordion_h3">
                            <a class="font-w600" data-toggle="collapse" data-parent="#accordion" href="#accordion_q3" aria-expanded="true" aria-controls="accordion_q3">3. Tentang Pembuat</a>
                        </div>
                        <div id="accordion_q3" class="collapse" role="tabpanel" aria-labelledby="accordion_h3" data-parent="#accordion">
                            <div class="block-content">
                                Sistem Informasi Penyebaran Bantuan Langsung Tunai (SIPBantu) dibuat menggunakan HTML 5, Bootstrap 4, JQuery, dan PHP 7 oleh Rozak Ilham Aditya mahasiswa S1 Teknik Informatika 
                                Jurusan Ilmu Komputer Universitas Negeri Semarang.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

<?php require 'inc/_global/views/page_end.php'; ?>

<!-- Tambah Kartu Keluarga Modal -->
    <div class="modal fade" id="modal-tambahkk" tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-gd-lake">
                        <h3 class="block-title">Kartu Keluarga</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <h2 class="mt-20 h4 text-center text-muted font-w300 mb-0">Tambah Baru</h2>
                        <h1 class="mb-30 font-w300 text-center mb-0">Kartu Keluarga</h1>
                        <div class="row justify-content-center">
                            <div class="col-xl-10">
                                <!-- jQuery Validation functionality is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form class="js-validation-kartukeluarga" action="" method="post">
                                    <div class="row"> 
                                        <div class="form-group col-12">
                                            <div class="form-material">
                                                <input type="number" class="form-control" name="kartu-keluarga" placeholder="e.g. 330220#########">
                                                <label for="kartu-keluarga">No. Kartu Keluarga</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-8">
                                            <div class="form-material">
                                                <input type="text" class="form-control" name="nama-lengkap" placeholder="Masukkan nama lengkap...">
                                                <label for="nama-lengkap">Nama Kepala Keluarga</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-4">
                                            <div class="form-material">
                                                <input type="number" class="form-control" name="jumlah" placeholder="Anggota keluarga...">
                                                <label for="nama-lengkap">Jumlah</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-lg-12 col-form-label" for="kartu-keluarga">Status Kepala Keluarga</label>
                                            <div class="col-12">
                                                <label class="css-control css-control-primary css-radio">
                                                    <input type="radio" class="css-control-input" name="stat" value="2">
                                                    <span class="css-control-indicator"></span> Duda
                                                </label>
                                                <label class="css-control css-control-primary css-radio">
                                                    <input type="radio" class="css-control-input" name="stat" value="3">
                                                    <span class="css-control-indicator"></span> Janda
                                                </label>
                                                <label class="css-control css-control-primary css-radio">
                                                    <input type="radio" class="css-control-input" name="stat" value="1">
                                                    <span class="css-control-indicator"></span> Lengkap
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-material">
                                                    <select class="js-select2 form-control" id="pekerjaan" name="pekerjaan" style="width: 100%;" data-placeholder="Pilih salah satu...">
                                                        <option></option>
                                                        <option value="3">Karyawan Swasta</option>
                                                        <option value="1">Pegawai Pemerintah</option>
                                                        <option value="4">Serabutan</option>
                                                        <option value="2">Wirausaha</option>
                                                        <option value="5">Tidak Bekerja</option>
                                                    </select>
                                                    <label for="val-select2">Pekerjaan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-material">
                                                    <select class="js-select2 form-control" id="gaji_bersih" name="gaji_bersih" style="width: 100%;" data-placeholder="Pilih salah satu...">
                                                        <option></option>
                                                        <option value="1">dibawah 1.300.000</option>
                                                        <option value="2">1.400.000 - 2.300.000</option>
                                                        <option value="3">2.400.000 - 3.500.000</option>
                                                        <option value="4">3.500.000 - 4.000.000</option>
                                                        <option value="5">Diatas 5.000.000</option>
                                                    </select>
                                                    <label for="val-select2">Gaji Bersih /Bulan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-material">
                                            <select class="js-select2 form-control" id="tinggal" name="tinggal" style="width: 100%;" data-placeholder="Pilih salah satu...">
                                                <option></option>
                                                <option value="1">Sangat Layak</option>
                                                <option value="2">Layak</option>
                                                <option value="3">Tidak Layak</option>
                                            </select>
                                            <label for="val-select2">Kondisi Tempat Tinggal</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                        <h2 class="mt-10 h6 text-center text-muted font-w300 mb-5">Tanggungan Bulanan</h2>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-material">
                                                    <select class="js-select2 form-control" id="tg_harian" name="tg_harian" style="width: 100%;" data-placeholder="Pilih salah satu...">
                                                        <option></option>
                                                        <option value="1">dibawah 1.300.000</option>
                                                        <option value="2">1.400.000 - 2.300.000</option>
                                                        <option value="3">2.400.000 - 3.500.000</option>
                                                        <option value="4">3.500.000 - 4.000.000</option>
                                                        <option value="5">Diatas 5.000.000</option>
                                                    </select>
                                                    <label for="val-select2">Harian /Bulan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-material">
                                                    <select class="js-select2 form-control" id="tg_hutang" name="tg_hutang" style="width: 100%;" data-placeholder="Pilih salah satu...">
                                                        <option></option>
                                                        <option value="1">0</option>
                                                        <option value="2">dibawah 1.300.000</option>
                                                        <option value="3">1.400.000 - 2.300.000</option>
                                                        <option value="4">2.400.000 - 3.500.000</option>
                                                        <option value="5">3.500.000 - 4.000.000</option>
                                                        <option value="6">Diatas 5.000.000</option>
                                                    </select>
                                                    <label for="val-select2">Hutang, Kredit, dll</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="btn_tambah-kartukeluarga" class="btn btn-square btn-hero btn-alt-success" data-toggle="click-ripple" style="width:100%">Tambah Baru</button>
                                    </div>
                                </form>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- END Tambah Kartu Keluarga Modal -->




<?php require 'inc/_global/views/footer_start.php'; ?>
<?php require 'inc/_global/views/footer_end.php'; ?>