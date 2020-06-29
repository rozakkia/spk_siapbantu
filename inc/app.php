<?php

function connect(){
    $conn = mysqli_connect('localhost', 'root', '', 'spk_siapbantu');
    if ($conn == false) {
        echo mysqli_connect_error();
        die();
    } else {
        return $conn;
    }
}

function query($sql){
    $conn = connect();
    return mysqli_query($conn, $sql);
}


//Function Create
function createKartuKeluarga(){
    $process = [
        'kk' => $_POST['kartu-keluarga'],
        'nama' => $_POST['nama-lengkap'],
        'jumlah' => $_POST['jumlah'],
        'stat' => $_POST['stat'],
        'jumlah' => $_POST['jumlah'],
        'pekerjaan' => $_POST['pekerjaan'],
        'gaji' => $_POST['gaji_bersih'],
        'tinggal' => $_POST['tinggal'],
        'tg' => $_POST['tg_harian'],
        'tgg' => $_POST['tg_hutang'],
    ];

    $sql = "insert into tbkartukeluarga(idkk, nama, pekerjaan, gaji, status_kk, jumlah_anggota, tanggungan_harian, tanggungan_hutang, kondisi_rumah) 
    values('" . $process['kk'] . "','" . $process['nama'] . "','" . $process['pekerjaan'] . "','" . $process['gaji'] . "'
            ,'" . $process['stat'] . "','" . $process['jumlah'] . "','" . $process['tg'] . "','" . $process['tgg'] . "'
            ,'" . $process['tinggal'] . "')";
    $process = query($sql);
    return $process;
}

//Function Read
function readKartuKeluarga(){
    $sql = "select * from tbkartukeluarga";
    $data = query($sql);
    return $data;
}

function readKartuKeluarga_detail($id){
    $sql = "select * from tbkartukeluarga where idkk=$id";
    $data = query($sql);
    return $data;
}

function saw_readKartuKeluarga(){
    $sql = "select idkk,pekerjaan,gaji,status_kk,jumlah_anggota,tanggungan_harian,tanggungan_hutang,kondisi_rumah from tbkartukeluarga";
    $data = query($sql);
    return $data;
}

?>