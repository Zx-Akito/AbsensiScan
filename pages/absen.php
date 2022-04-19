<?php

    $var01 = $_POST['var01'];
    $var03 = date ("Ymd");
    $var04 = date ("H:i:s");
 
    $kunci="username_siswa='$var01'";
    $q=AmbilData ("siswa",$kunci);
    $var02 = $q['id_kelas'];
    $q1=AmbilData ("absensi",$kunci);
    $nama=$q['nama'];
    $kelas=$q['id_kelas'];

    if ($var01!="")
    {
        $ambil=mysqli_query($koneksi,"SELECT * FROM siswa WHERE username_siswa='$var01'");
        if(mysqli_num_rows($ambil) > 0)
        {
            Absen($var01,$var02,$var03,$var04);
        }
        else
        {
            echo "<div class='alert alert-info'>Username tidak di temukan</div>";
        }
    }
    if($var04="")
    {
        $absen="
                <div class='col-3 mx-auto'>
                    <img src='././assets/img/a.webp' alt='user' style='width:100%;'>
                </div>
                <div class='col-5 mx-auto my-3'>
                    <h6>Nama  : </h6>
                    <h6>Kelas :</h6>
                </div>
            ";
    }
    else
    {
        $absen="
                <div class='col-3 mx-auto'>
                    <img src='././assets/img/a.webp' alt='user' style='width:100%;'>
                </div>
                <div class='col-5 mx-auto my-3'>
                    <h6>Nama  : $nama</h6>
                    <h6>Kelas : ".Kelas($kelas)."</h6>
                </div>
            ";
    }
    $template = "absen";
    $title = "Absen";
    $konten ="
    <div class='container-fluid'>
        <div class='col-3 md-8 mx-5 pt-4 mt-5'>
            <h3>Selamat Datang</h3>
            <p>Hallo Kamu Yang Disana !
            Silahkan Absen dibawah terlebih dahulu
            sebelum masuk kelas, Terima Kasih !</p>
        </div>  
        <div class='d-flex justify-content-center'>
            <div class='col-5 mb-5 mt-3'>
                $absen
                <form method='post' autocomplete='off'>
                    <div class='form-group col'>
                        <input type='text' class='form-control' name='var01' autofocus>
                    </div>
                </form>
            </div>
        </div>   
    </div>
    ";
?>