<?php

// Memasukkan file class-mahasiswa.php untuk mengakses class Mahasiswa
include_once '../config/class-mahasiswa.php';
// Membuat objek dari class Mahasiswa
$customer = new Customer();
// Mengambil data customer dari form edit menggunakan metode POST dan menyimpannya dalam array
$dataCustomer = [
    'id' => $_POST['id'],
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
// Memanggil method editcustomer untuk mengupdate data customer dengan parameter array $datacustomer
$edit = $customer->editCustomer($dataCustomer);
// Mengecek apakah proses edit berhasil atau tidak - true/false
if($edit){
    // Jika berhasil, redirect ke halaman data-list.php dengan status editsuccess
    header("Location: ../data-list.php?status=editsuccess");
} else {
    // Jika gagal, redirect ke halaman data-edit.php dengan status failed dan membawa id customer
    header("Location: ../data-edit.php?id=".$dataCustomer['id']."&status=failed");
}

?>