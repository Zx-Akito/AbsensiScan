<?php
    date_default_timezone_set("Asia/Bangkok");
    // error_reporting(0);
    session_start();
    
    
    include ("app/db.php"); // Koneksi Database
    include ("app/function.php"); // Fungsi
    include ("app/routing.php"); // Penghubung Halaman
?>