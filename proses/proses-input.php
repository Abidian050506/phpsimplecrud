<?php

// Memasukkan file class-mahasiswa.php untuk mengakses class Mahasiswa
include '../config/class-mahasiswa.php';
// Membuat objek dari class Mahasiswa
$customer = new Customer();
// Mengambil data customer dari form input menggunakan metode POST dan menyimpannya dalam array
$dataCustomer = [
    'ktp' => $_POST['ktp'],
    'nama' => $_POST['nama'],
    'alamat' => $_POST['alamat'],
    'telp' => $_POST['telp'],
    'email' => $_POST['email'],
    'mobil' => $_POST['mobil'],
    'sewa' => $_POST['sewa'],
    'kembali' => $_POST['kembali'],
    'status' => $_POST['status']
];
// Memanggil method inputcustomer untuk memasukkan data customer dengan parameter array $dataCustomer
$input = $customer->inputCustomer($dataCustomer);
// Mengecek apakah proses input berhasil atau tidak - true/false
if($input){
    // Jika berhasil, redirect ke halaman data-list.php dengan status inputsuccess
    header("Location: ../data-list.php?status=inputsuccess");
} else {
    // Jika gagal, redirect ke halaman data-input.php dengan status failed
    header("Location: ../data-input.php?status=failed");
}

?>