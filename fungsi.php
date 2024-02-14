<?php
    $koneksi = mysqli_connect("localhost", "root", "", "wis") or die();

    function tampil($query){
        global $koneksi;

        $result = mysqli_query($koneksi, $query);
        $rows = [];

        while($data = mysqli_fetch_assoc($result)){
            $rows[] = $data;
        }

        return $rows;
    }
    
    
    function publik($data){
        
        global $koneksi;
        
        $nama = $data['nama'];
        $kritik = $data['kritik'];
        $query="INSERT INTO pengaduan (nama_pengadu, kritik_saran) VALUE('$nama','$kritik')";
        mysqli_query($koneksi,$query);
        
        return mysqli_affected_rows($koneksi);
    }
    
    function hapus_kritik($id){
        
        global $koneksi;
        
        $query = "DELETE FROM pengaduan WHERE id = $id";
        
        mysqli_query($koneksi, $query);
        
        return mysqli_affected_rows($koneksi);
        
    }
    
    function hapus_kab($id){
        
        global $koneksi;
        

        mysqli_query($koneksi, "DELETE FROM kabupaten WHERE id = $id");
	    return mysqli_affected_rows($koneksi);
        
        
    }
    function hapus_wis($id){
        
        global $koneksi;
        

        mysqli_query($koneksi, "DELETE FROM wisata WHERE id = $id");
	    return mysqli_affected_rows($koneksi);
        
        
    }
    
    function edit_kab($data) {
        
        global $koneksi;
        
        $id = $data['id'];
        
        $nama_kecamatan = htmlspecialchars($data['nama_kecamatan']);
        $jumlah_p = htmlspecialchars($data['jumlah_penduduk']);
        $luas_wilayah = htmlspecialchars($data['luas_wilayah']);
        $jumlah_desa = htmlspecialchars($data['luas_wilayah']);
        $jumlah_l = htmlspecialchars($data['jumlah_kelurahaan']);
        
        $query = "UPDATE kabupaten SET nama_kecamatan = '$nama_kecamatan', jumlah_penduduk = '$jumlah_p', luas_wilayah = '$luas_wilayah', jumlah_desa = '$jumlah_desa' , jumlah_kelurahaan = '$jumlah_l' WHERE id = '$id'";
        mysqli_query($koneksi, $query);
        
        return mysqli_affected_rows($koneksi);
        
    }
    
    function tambah_kab($data) {
        global $koneksi;
    
        $nama_kecamatan = htmlspecialchars($data["nama_kecamatan"]);
        $jumlah_penduduk = htmlspecialchars($data["jumlah_penduduk"]);
        $luas_wilayah = htmlspecialchars($data["luas_wilayah"]);
        $jumlah_desa = htmlspecialchars($data["jumlah_desa"]);
        $jumlah_kelurahan = htmlspecialchars($data["jumlah_kelurahan"]);
    
    
        $query = "INSERT INTO kabupaten
                    VALUES
                  ('', '$nama_kecamatan', '$jumlah_penduduk', '$luas_wilayah', '$jumlah_kelurahan', '$gambar')
                ";
        mysqli_query($koneksi, $query);
    
        return mysqli_affected_rows($koneksi);
    }

    function edit_wis($data) {

        global $koneksi;

        $id = $data['id'];

        $nama_wisata = $data['nama_wisata'];
        $lokasi_wisata = $data['lokasi_wisata'];
        $deskripsi_wisata = $data['deskripsi_wisata'];

        $query = "UPDATE wisata SET nama_wisata = '$nama_wisata', lokasi_wisata = '$lokasi_wisata', deskripsi_wisata = '$deskripsi_wisata' WHERE id = '$id'";
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);


    }
    function tambah_wis($data) {
        global $koneksi;
    
        // upload gambar
        $foto_wisata = upload();
        if (!$foto_wisata) {
            return false;
        }
        $foto2_wisata = upload2();
        if (!$foto2_wisata) {
            return false;
        }
    
        $nama_wisata = htmlspecialchars($data["nama_wisata"]);
        $lokasi_wisata = htmlspecialchars($data["lokasi_wisata"]);
        $deskripsi_wisata = htmlspecialchars($data["deskripsi_wisata"]);
        
        // Omit the 'id' column from the SQL query
        $query = "INSERT INTO wisata (foto_wisata, foto2_wisata, nama_wisata, lokasi_wisata, deskripsi_wisata)
          VALUES ('$foto_wisata', '$foto2_wisata', '$nama_wisata', '$lokasi_wisata', '$deskripsi_wisata')";
    
        mysqli_query($koneksi, $query);
    
        return mysqli_affected_rows($koneksi);
    }

    function upload() {
        // var_dump($_FILES['foto_wisata']);
        // die();

        $namaFile = $_FILES['foto_wisata']['name'];
        $ukuranFile = $_FILES['foto_wisata']['size'];
        $error = $_FILES['foto_wisata']['error'];
        $tmpName = $_FILES['foto_wisata']['tmp_name'];
    
        // cek apakah tidak ada gambar yang diupload
        if( $error === 4 ) {
            echo "<script>
                    alert('pilih gambar terlebih dahulu!');
                  </script>";
            return false;
        }
    
        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'webp'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
            echo "<script>
                    alert('yang anda upload bukan gambar!');
                </script>";
            return false;
        }
    
        // generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        $dir = '../image/'.$namaFileBaru;
    
        move_uploaded_file($tmpName,$dir);
    
        return $namaFileBaru;
    }
    function upload2() {

        $namaFile = $_FILES['foto2_wisata']['name'];
        $ukuranFile = $_FILES['foto2_wisata']['size'];
        $error = $_FILES['foto2_wisata']['error'];
        $tmpName = $_FILES['foto2_wisata']['tmp_name'];
    
        // cek apakah tidak ada gambar yang diupload
        if( $error === 4 ) {
            echo "<script>
                    alert('pilih gambar terlebih dahulu!');
                  </script>";
            return false;
        }

        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'webp'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
            echo "<script>
                    alert('yang anda upload bukan gambar!');
                </script>";
            return false;
        }

        // generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        $dir = '../image';
    
        move_uploaded_file($tmpName,$dir.'/'.$namaFileBaru);
            
        return $namaFileBaru;    

    
    }
    

   

?>