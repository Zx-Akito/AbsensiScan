<?php

    function AmbilData($tabel,$kunci)
    {
        global $koneksi;

        $query = "SELECT * FROM $tabel WHERE $kunci";
        $query = mysqli_query ($koneksi,$query);
        return mysqli_fetch_assoc ($query);
    }

    function Absen($var01,$var02,$var03,$var04)
    {
        global $koneksi;

        $ambil=mysqli_query($koneksi,"SELECT * FROM absensi WHERE username_siswa='$var01' AND DATE(tanggal)=DATE(NOW())");
        if(mysqli_num_rows($ambil) > 0)
        {
            $q = "UPDATE absensi SET absensi_pulang='$var04' WHERE username_siswa='$var01'";
        }
        else
        {
            $q = "INSERT INTO absensi (username_siswa,id_kelas,tanggal,absensi_masuk) values ('$var01','$var02','$var03','$var04')";
        }
        $hasil = mysqli_query($koneksi,$q);

        if ($hasil) {

            echo "<div class='alert alert-success'>Absensi Berhasil</div>";
        }
        else {

            echo "<div class='alert alert-danger'>Absensi Gagal</div>";
        }

        return $alert;
    }

?>