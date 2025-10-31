<?php

// Memasukkan file konfigurasi database
include_once 'db-config.php';

class MasterData extends Database {

    // Method untuk mendapatkan daftar program studi
    public function getProdi(){
        $query = "SELECT * FROM tb_mobil";
        $result = $this->conn->query($query);
        $prodi = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $prodi[] = [
                    'id' => $row['kode_mobil'],
                    'nama' => $row['nama_mobil'] 
                ];
            }
        }
        return $prodi;
    }


    // Method untuk mendapatkan daftar status mahasiswa menggunakan array statis
    public function getStatus(){
        return [
            ['id' => 1, 'nama' => 'Lunas'],
            ['id' => 2, 'nama' => 'Belum Lunas'],
        ];
    }

    // Method untuk input data program studi
    public function inputProdi($data){
        $kodeProdi = $data['kode'];
        $namaProdi = $data['nama'];
        $query = "INSERT INTO tb_mobil (kode_mobil, nama_mobil) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("ss", $kodeProdi, $namaProdi);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk mendapatkan data program studi berdasarkan kode
    public function getUpdateProdi($id){
        $query = "SELECT * FROM tb_mobil WHERE kode_mobil = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $prodi = null;
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $prodi = [
                'id' => $row['kode_mobil'],
                'nama' => $row['nama_mobil'],
            ];
        }
        $stmt->close();
        return $prodi;
    }

    // Method untuk mengedit data program studi
    public function updateProdi($data){
        $kodeProdi = $data['kode'];
        $namaProdi = $data['nama'];
        $query = "UPDATE tb_mobil SET nama_mobil = ? WHERE kode_mobil = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("ss", $namaProdi, $kodeProdi);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk menghapus data program studi
    public function deleteProdi($id){
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




}

?>