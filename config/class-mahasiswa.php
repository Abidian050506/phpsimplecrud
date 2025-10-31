<?php 

// Memasukkan file konfigurasi database
include_once 'db-config.php';

class Mahasiswa extends Database {

    // Method untuk input data mahasiswa
    public function inputMahasiswa($data){
        // Mengambil data dari parameter $data
        $ktp      = $data['ktp'];
        $nama     = $data['nama'];
        $alamat   = $data['alamat'];
        $telp     = $data['telp'];
        $email    = $data['email'];
        $mobil    = $data['mobil'];
        $sewa     = $data['sewa'];
        $kembali  = $data['kembali'];
        $biaya    = $data['biaya'];
        $status   = $data['status'];
        // Menyiapkan query SQL untuk insert data menggunakan prepared statement
        $query = "INSERT INTO tb_customer (ktp_cstmr, nama_cstmr, alamat, telp, email, mobil, tgl_sewa, tgl_kembali, total_biaya,  status_pembayaran) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        // Mengecek apakah statement berhasil disiapkan
        if(!$stmt){
            return false;
        }
        // Memasukkan parameter ke statement
        $stmt->bind_param("ssssssssss", $ktp, $nama, $alamat, $telp, $email, $mobil, $sewa, $kembali, $biaya, $status);
        $result = $stmt->execute();
        $stmt->close();
        // Mengembalikan hasil eksekusi query
        return $result;
    }

    // Method untuk mengambil semua data mahasiswa
    public function getAllMahasiswa(){
        // Menyiapkan query SQL untuk mengambil data mahasiswa beserta prodi dan provinsi
        $query = "SELECT id_cstmr, ktp_cstmr, nama_cstmr, alamat, telp, email, mobil, tgl_sewa, tgl_kembali, total_biaya, status_pembayaran 
                  FROM tb_customer
                  JOIN tb_mobil ON nama_mobil = kode_mobil";
        $result = $this->conn->query($query);
        // Menyiapkan array kosong untuk menyimpan data mahasiswa
        $mahasiswa = [];
        // Mengecek apakah ada data yang ditemukan
        if($result->num_rows > 0){
            // Mengambil setiap baris data dan memasukkannya ke dalam array
            while($row = $result->fetch_assoc()) {
                $mahasiswa[] = [
                    'id' => $row['id_cstmr'],
                    'ktp' => $row['ktp_cstmr'],
                    'nama' => $row['nama_cstmr'],
                    'alamat' => $row['alamat'],
                    'telp' => $row['telp'],
                    'email' => $row['email'],
                    'mobil' => $row['mobil'],
                    'sewa' => $row['tgl_sewa'],
                    'kembali' => $row['tgl_kembali'],
                    'biaya' => $row['total_biaya'],
                    'status' => $row['status_pembayaran']
                ];
            }
        }
        // Mengembalikan array data mahasiswa
        return $mahasiswa;
    }

    // Method untuk mengambil data mahasiswa berdasarkan ID
    public function getUpdateMahasiswa($id){
        // Menyiapkan query SQL untuk mengambil data mahasiswa berdasarkan ID menggunakan prepared statement
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
            // Mengambil data mahasiswa  
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
                'biaya' => $row['total_biaya'],
                'status' => $row['status_pembayaran']
            ];
        }
        $stmt->close();
        // Mengembalikan data mahasiswa
        return $data;
    }

    // Method untuk mengedit data mahasiswa
    public function editMahasiswa($data){
        // Mengambil data dari parameter $data
        $ktp      = $data['ktp'];
        $nama     = $data['nama'];
        $alamat   = $data['alamat'];
        $telp     = $data['telp'];
        $email    = $data['email'];
        $mobil    = $data['mobil'];
        $sewa     = $data['sewa'];
        $kembali  = $data['kembali'];
        $biaya    = $data['biaya'];
        $status   = $data['status'];
        // Menyiapkan query SQL untuk update data menggunakan prepared statement
        $query = "UPDATE tb_customer SET ktp_cstmr = ?, nama_cstmr = ?, alamat = ?, telp = ?, email = ?, mobil = ?, tgl_sewa = ?, tgl_kembali = ?, total_biaya = ?, status_pembayaran = ? WHERE id_cstmr = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        // Memasukkan parameter ke statement
        $stmt->bind_param("ssssssssss", $ktp, $nama, $alamat, $telp, $email, $mobil, $sewa, $kembali, $biaya, $status, $id);
        $result = $stmt->execute();
        $stmt->close();
        // Mengembalikan hasil eksekusi query
        return $result;
    }

    // Method untuk menghapus data mahasiswa
    public function deleteMahasiswa($id){
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

    // Method untuk mencari data mahasiswa berdasarkan kata kunci
    public function searchMahasiswa($kataKunci){
        // Menyiapkan LIKE query untuk pencarian
        $likeQuery = "%".$kataKunci."%";
        // Menyiapkan query SQL untuk pencarian data mahasiswa menggunakan prepared statement
        $query = "SELECT id_cstmr, ktp_cstmr, nama_cstmr, alamat, telp, email, mobil, tgl_sewa, tgl_kembali, total_biaya, status_pembayaran 
                  FROM tb_customer
                  JOIN tb_mobil ON prodi_mhs = kode_prodi
                  JOIN tb_provinsi ON provinsi = id_provinsi
                  WHERE nim_mhs LIKE ? OR nama_mhs LIKE ?";
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
        $mahasiswa = [];
        if($result->num_rows > 0){
            // Mengambil setiap baris data dan memasukkannya ke dalam array
            while($row = $result->fetch_assoc()) {
                // Menyimpan data mahasiswa dalam array
                $mahasiswa[] = [
                    'id' => $row['id_cstmr'],
                    'ktp' => $row['ktp_cstmr'],
                    'nama' => $row['nama_cstmr'],
                    'alamat' => $row['alamat'],
                    'telp' => $row['telp'],
                    'email' => $row['email'],
                    'mobil' => $row['mobil'],
                    'sewa' => $row['tgl_sewa'],
                    'kembali' => $row['tgl_kembali'],
                    'biaya' => $row['total_biaya'],
                    'status' => $row['metode_pembayaran']
                ];
            }
        }
        $stmt->close();
        // Mengembalikan array data mahasiswa yang ditemukan
        return $mahasiswa;
    }

}

?>