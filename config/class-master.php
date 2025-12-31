<?php

// Memasukkan file konfigurasi database
include_once 'db-config.php';

class MasterData extends Database {

    // Method untuk mendapatkan daftar mobil
    public function getMobil(){
        $query = "SELECT * FROM tb_mobil";
        $result = $this->conn->query($query);
        $mobil = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $mobil[] = [
                    'id' => $row['kode_mobil'],
                    'nama' => $row['nama_mobil'],
                    'harga' => $row['harga_mobil']
                ];
            }
        }
        return $mobil;
    }

    // Method untuk mendapatkan daftar status pembayaran menggunakan array statis
    public function getStatus(){
        return [
            ['id' => 1, 'nama' => 'Lunas'],
            ['id' => 2, 'nama' => 'Belum Bayar'],
            ['id' => 3, 'nama' => 'Sudah DP'],
            ['id' => 4, 'nama' => 'Denda']
        ];
    }

    // Method untuk input data mobil
    public function inputMobil($data){
        $kodeMobil = $data['kode'];
        $namaMobil = $data['nama'];
        $hargaMobil = $data['harga'];
        $query = "INSERT INTO tb_mobil (kode_mobil, nama_mobil, harga_mobil) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("sss", $kodeMobil, $namaMobil, $hargaMobil);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk mendapatkan data mobil berdasarkan kode
    public function getUpdateMobil($id){
        $query = "SELECT * FROM tb_mobil WHERE kode_mobil = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $mobil = null;
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $mobil = [
                'id' => $row['kode_mobil'],
                'nama' => $row['nama_mobil'],
                'harga' => $row['harga_mobil']
            ];
        }
        $stmt->close();
        return $mobil;
    }

    // Method untuk mengedit data mobil
    public function updateMobil($data){
        $kodeMobil = $data['kode'];
        $namaMobil = $data['nama'];
        $hargaMobil = $data['harga'];
        $query = "UPDATE tb_mobil SET nama_mobil = ?, harga_mobil = ? WHERE kode_mobil = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("sss", $namaMobil, $hargaMobil, $kodeMobil);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk menghapus data mobil
    public function deleteMobil($id){
        $query = "DELETE FROM tb_mobil WHERE kode_mobil = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("s", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk mendapatkan daftar transaksi/pembayaran
    
    public function getTransaksi(){
        $query = "SELECT 
                t.id_transaksi, 
                c.id_cstmr, 
                m.kode_mobil, 
                c.tgl_sewa, 
                c.tgl_kembali,
                t.harga_mobil
              FROM tb_transaksi t
              LEFT JOIN tb_customer c ON t.id_cstmr = c.id_cstmr
              LEFT JOIN tb_mobil m ON t.kode_mobil = m.kode_mobil";
        $result = $this->conn->query($query);
        $transaksi = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $transaksi[] = [
                    'id' => $row['id_cstmr'],
                    'kode' => $row['kode_mobil'],
                    'tgl_sewa' => $row['tgl_sewa'],
                    'tgl_kembali' => $row['tgl_kembali'],
                    'harga' => $row['harga_mobil']

                ];
            }
        }
        return $transaksi;
    }
}

?>