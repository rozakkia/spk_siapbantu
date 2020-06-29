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

<!-- Page Kependudukan Detail -->
    <div class="content">
        <div class="col-md-12">
            <div class="block block-themed">
                <div class="block-header bg-gd-emerald">
                    <div class="block-options">
                        <a type="button" class="btn btn-alt-info mr-20" href="utama">
                            <i class="si si-arrow-left mr-5"></i>Kembali
                        </a>
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
                                            <?php echo $data_KepalaKeluarga['jumlah_anggota']  ?>
                                        </td>
                                        <td class="text-center">
                                            
                                            <a href="kependudukan?detail= <?php echo base64_encode($data_KepalaKeluarga['idkk']) ?>" target="_blank" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Lihat Detail">
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
    </div>
<!-- END Kependudukan Detail -->



<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>
<?php require 'inc/_global/views/footer_end.php'; ?>