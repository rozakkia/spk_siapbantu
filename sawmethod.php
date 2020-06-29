<?php
require_once 'inc/app.php';

$alternatif = array();
$kriteria = array();
$r = array();

$kriteria[] = 'C1'; //b pekerjaan
$kriteria[] = 'C2'; //c gaji
$kriteria[] = 'C3'; //c stat
$kriteria[] = 'C4'; //b jml
$kriteria[] = 'C5'; //b tg ha
$kriteria[] = 'C6'; //b tg hu
$kriteria[] = 'C7'; //b knds rmh

$read_KepalaKeluarga = saw_readKartuKeluarga();
while ($roww = mysqli_fetch_row($read_KepalaKeluarga) ){
    $alternatif[] = array($roww[0],$roww[1],$roww[2],$roww[3],$roww[4],$roww[5],$roww[6],$roww[7]);
}



$index_alternatif = 0;
foreach ($alternatif as $alt) {
    $index_kriteria = 1;
    foreach ($kriteria as $kr) {
        if ($kr == 'C2' || $kr == 'C3') { //Cost
            $r[$index_alternatif][$index_kriteria] = round(min(array_column($alternatif, $index_kriteria)) / $alternatif[$index_alternatif][$index_kriteria], 2);
        } elseif ($kr == 'C1' || $kr == 'C4' || $kr == 'C5' || $kr == 'C6' || $kr == 'C7') { //Benefit
            $r[$index_alternatif][$index_kriteria] = round($alternatif[$index_alternatif][$index_kriteria] / max(array_column($alternatif, $index_kriteria)), 2);
        }
        $index_kriteria++;
    }
    $index_alternatif++;
}

// bobot W
$w = array(0.3, 0.4, 0.2, 0.2, 0.3 , 0.5 , 0.1);

$index_alternatif = 0;
foreach ($alternatif as $alt) {
    $index_w = 0;
    $index_r = 1;
    $v = 0;
    foreach ($kriteria as $kr) {
        $v += $w[$index_w] * $r[$index_alternatif][$index_r];
        $index_r++;
        $index_w++;
    }
    $nilai_v[$index_alternatif]['alternatif'] = $alt[0];
    $nilai_v[$index_alternatif]['nilai'] = $v;
    $index_alternatif++;
}

usort($nilai_v, function ($a, $b) {
    return $a['nilai'] <=> $b['nilai'];
});

