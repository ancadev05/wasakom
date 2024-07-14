<?php

// format uang indonesia
function format_uang($angka)
{
  return number_format($angka, 0, ',', '.');
}

// format rupiah angka terbilang
function terbilang($nilai) {
  if($nilai<0) {
      $hasil = "minus ". trim(ke_kata($nilai));
  } else {
      $hasil = trim(ke_kata($nilai));
  }
  return $hasil;
}

function ke_kata($nilai) {
  $nilai = abs($nilai);
  $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  $temp = "";
  if ($nilai < 12) {
      $temp = " ". $huruf[$nilai];
  } else if ($nilai <20) {
      $temp = ke_kata($nilai - 10). " belas";
  } else if ($nilai < 100) {
      $temp = ke_kata($nilai/10)." puluh". ke_kata($nilai % 10);
  } else if ($nilai < 200) {
      $temp = " seratus" . ke_kata($nilai - 100);
  } else if ($nilai < 1000) {
      $temp = ke_kata($nilai/100) . " ratus" . ke_kata($nilai % 100);
  } else if ($nilai < 2000) {
      $temp = " seribu" . ke_kata($nilai - 1000);
  } else if ($nilai < 1000000) {
      $temp = ke_kata($nilai/1000) . " ribu" . ke_kata($nilai % 1000);
  } else if ($nilai < 1000000000) {
      $temp = ke_kata($nilai/1000000) . " juta" . ke_kata($nilai % 1000000);
  } else if ($nilai < 1000000000000) {
      $temp = ke_kata($nilai/1000000000) . " milyar" . ke_kata(fmod($nilai,1000000000));
  } else if ($nilai < 1000000000000000) {
      $temp = ke_kata($nilai/1000000000000) . " triliun" . ke_kata(fmod($nilai,1000000000000));
  }     
  return $temp;
}

// membuat format hari tanggal indonesia
function hariTanggalIndonesia($tanggal){
  // format input tanggal date('Y-m-d')
  // Array hari dan bulan
  $hari = array ( 1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
  $bulan = array (1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
  
  // Memecah tanggal untuk mendapatkan hari, bulan, dan tahun
  $split = explode('-', $tanggal);
  
  // Mengubah string menjadi integer untuk mendapatkan nama hari dan nama bulan
  $numHari = date('N', strtotime($tanggal));
  $numBulan = (int) $split[1];
  
  // Menggabungkan hasil format tanggal
  return $hari[$numHari] . ', ' . $split[2] . ' ' . $bulan[$numBulan] . ' ' . $split[0];
}

// membuat format hari tanggal indonesia
function tanggalIndonesia($tanggal){
  // format input tanggal date('Y-m-d')
  // Array hari dan bulan
  $hari = array ( 1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
  $bulan = array (1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
  
  // Memecah tanggal untuk mendapatkan hari, bulan, dan tahun
  $split = explode('-', $tanggal);
  
  // Mengubah string menjadi integer untuk mendapatkan nama hari dan nama bulan
  $numHari = date('N', strtotime($tanggal));
  $numBulan = (int) $split[1];
  
  // Menggabungkan hasil format tanggal
  return $split[2] . ' ' . $bulan[$numBulan] . ' ' . $split[0];
}

// mengambil huruf pertama di setiap kata
function ambilHurufAwal($string) {
  // Memecah string menjadi array kata
  $kata = explode(" ", $string);
  $hasil = "";

  // Iterasi melalui setiap kata dan ambil huruf pertama
  foreach ($kata as $k) {
      $hasil .= $k[0];
  }

  return $hasil;
}

