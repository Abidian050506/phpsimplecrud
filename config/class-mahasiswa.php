<?php 

// Memasukkan file konfigurasi database
include_once 'db-config.php';

class Customer extends Database {

    // Method untuk input data customer
    public function inputCustomer($data){
        // Mengambil data dari parameter $data
        $ktp      = $data['ktp'];
        $nama     = $data['nama'];
        $alamat    = $data['alamat'];
        $telp   = $data['telp'];
        $email = $data['email'];
        $mobil    = $data['mobil'];
        $sewa     = $data['sewa'];
        $kembali     = $data['kembali'];
        $status   = $data['status'];
        // Menyiapkan query SQL untuk insert data menggunakan prepared statement
        $query = "INSERT INTO tb_customer (ktp_cstmr, nama_cstmr, alamat, telp, email, mobil, tgl_sewa, tgl_kembali, status_pembayaran) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        // Mengecek apakah statement berhasil disiapkan
        if(!$stmt){
            return false;
        }
        // Memasukkan parameter ke statement
        $stmt->bind_param("sssssssss", $ktp, $nama, $alamat, $telp, $email, $mobil, $sewa, $kembali, $status);
        $result = $stmt->execute();
        $stmt->close();
        // Mengembalikan hasil eksekusi query
        return $result;
    }

    // Method untuk mengambil semua data customer
    public function getAllCustomer(){
        // Menyiapkan query SQL untuk mengambil data customer beserta mobil
        $query = "SELECT id_cstmr, ktp_cstmr, nama_cstmr, alamat, telp, email, mobil, tgl_sewa, tgl_kembali, status_pembayaran 
                  FROM tb_customer
                  LEFT JOIN tb_mobil ON nama_mobil = kode_mobil";
        $result = $this->conn->query($query);
        // Menyiapkan array kosong untuk menyimpan data customer
        $customer = [];
        // Mengecek apakah ada data yang ditemukan
        if($result->num_rows > 0){
            // Mengambil setiap baris data dan memasukkannya ke dalam array
            while($row = $result->fetch_assoc()) {
                $customer[] = [
                    'id' => $row['id_cstmr'],
                    'ktp' => $row['ktp_cstmr'],
                    'nama' => $row['nama_cstmr'],
                    'alamat' => $row['alamat'],
                    'telp' => $row['telp'],
                    'email' => $row['email'],
                    'mobil' => $row['mobil'],
                    'sewa' => $row['tgl_sewa'],
                    'kembali' => $row['tgl_kembali'],
                    'status' => $row['status_pembayaran']
                ];
            }
        }
        // Mengembalikan array data cutomer
        return $customer;
    }

    // Method untuk mengambil data customer berdasarkan ID
    public function getUpdateCustomer($id){
        // Menyiapkan query SQL untuk mengambil data customer berdasarkan ID menggunakan prepared statement
        $query = "SELECT * FROM tb_customer WHERE id_cstmr = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = false;
        if($result->num_rows > 0){
            // Mengambil data customer  
            $row = $result->fetch_assoc();
            // Menyimpan data dalam array
            $data = [
                    'id' => $row['id_cstmr'],
                    'ktp' => $row['ktp_cstmr'],
                    'nama' => $row['nama_cstmr'],
                    'alamat' => $row['alamat'],
                    'telp' => $row['telp'],
                    'email' => $row['email'],
                    'mobil' => $row['mobil'],
                    'sewa' => $row['tgl_sewa'],
                    'kembali' => $row['tgl_kembali'],
                    'status' => $row['status_pembayaran']
            ];
        }
        $stmt->close();
        // Mengembalikan data customer
        return $data;
    }

    // Method untuk mengedit data customer
    public function editCustomer($data){
        // Mengambil data dari parameter $data
        $ktp      = $data['ktp'];
        $nama     = $data['nama'];
        $alamat    = $data['alamat'];
        $telp   = $data['telp'];
        $email = $data['email'];
        $mobil    = $data['mobil'];
        $sewa     = $data['sewa'];
        $kembali     = $data['kembali'];
        $status   = $data['status'];
        // Menyiapkan query SQL untuk update data menggunakan prepared statement
        $query = "UPDATE tb_customer SET ktp_cstmr = ?, nama_cstmr = ?, alamat = ?, telp = ?, email = ?, mobil = ?, tgl_sewa = ?, tgl_kembali = ?, status_pembayaran = ? WHERE id_cstmr = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        // Memasukkan parameter ke statement
        $stmt->bind_param("sssssssssi", $ktp, $nama, $alamat, $telp, $email, $mobil, $sewa, $kembali, $status, $id);
        $result = $stmt->execute();
        $stmt->close();
        // Mengembalikan hasil eksekusi query
        return $result;
    }

    // Method untuk menghapus data customer
    public function deleteCustomer($id){
        // Menyiapkan query SQL untuk delete data menggunakan prepared statement
        $query = "DELETE FROM tb_customer WHERE id_cstmr = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        // Mengembalikan hasil eksekusi query
        return $result;
    }

    // Method untuk mencari data customer berdasarkan kata kunci
    public function searchCustomer($kataKunci){
        // Menyiapkan LIKE query untuk pencarian
        $likeQuery = "%".$kataKunci."%";
        // Menyiapkan query SQL untuk pencarian data customer menggunakan prepared statement
        $query = "SELECT id_cstmr, ktp_cstmr, nama_cstmr, alamat, telp, email, mobil, tgl_sewa, tgl_kembali, status_pembayaran 
                  FROM tb_customer
                  LEFT JOIN tb_mobil ON nama_mobil = kode_mobil
                  WHERE ktp_cstmr LIKE ? OR nama_cstmr LIKE ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            // Mengembalikan array kosong jika statement gagal disiapkan
            return [];
        }
        // Memasukkan parameter ke statement
        $stmt->bind_param("ss", $likeQuery, $likeQuery);
        $stmt->execute();
        $result = $stmt->get_result();
        // Menyiapkan array kosong untuk menyimpan data mahasiswa
        $customer = [];
        if($result->num_rows > 0){
            // Mengambil setiap baris data dan memasukkannya ke dalam array
            while($row = $result->fetch_assoc()) {
                // Menyimpan data mahasiswa dalam array
                $customer[] = [
                    'id' => $row['id_cstmr'],
                    'ktp' => $row['ktp_cstmr'],
                    'nama' => $row['nama_cstmr'],
                    'alamat' => $row['alamat'],
                    'telp' => $row['telp'],
                    'email' => $row['email'],
                    'mobil' => $row['mobil'],
                    'sewa' => $row['tgl_sewa'],
                    'kembali' => $row['tgl_kembali'],
                    'status' => $row['status_pembayaran']
                ];
            }
        }
        $stmt->close();
        // Mengembalikan array data mahasiswa yang ditemukan
        return $customer;
    }

}

?>