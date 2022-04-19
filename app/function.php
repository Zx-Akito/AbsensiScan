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

        $q1=AmbilData ("absensi","username_siswa='$var01'");
        $waktu_masuk= $q1['jam_aturan_masuk'];
        $waktu_pulang= $q1['jam_aturan_pulang'];

        $ambil=mysqli_query($koneksi,"SELECT * FROM absensi WHERE username_siswa='$var01' AND DATE(tanggal)=DATE(NOW())");
        if(mysqli_num_rows($ambil) > 0)
        {
            if($var04 < $waktu_pulang)
            {
                echo "<div class='alert alert-danger'>Belum Waktu Pulang</div>";
            }
            else
            {
                $q = "UPDATE absensi SET absensi_pulang='$var04' WHERE username_siswa='$var01'";
            }
        }
        else
        {
            if($var04 > $waktu_masuk)
            {
                $q = "INSERT INTO absensi (username_siswa,id_kelas,tanggal,absensi_masuk) values ('$var01','$var02','$var03','$var04')";
            }
            else
            {
                $q = "INSERT INTO absensi (username_siswa,id_kelas,tanggal,absensi_masuk) values ('$var01','$var02','$var03','$var04')";
                echo "<div class='alert alert-warning'>Anda Telat</div>";
            }
        }
        $hasil=mysqli_query($koneksi,$q);
        if($hasil)
        {
                echo "<div class='alert alert-success'>Absen Berhasil</div>";
        }
    }

    function Kelas($data)
    {
        switch($data)
        {
            case "1":return "RPL";break;
            case "2":return "TKJ";break;
        }
    }
?>