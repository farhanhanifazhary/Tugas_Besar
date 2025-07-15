<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "db_kursus_farhan";

    $koneksi = new mysqli($server, $user, $password, $db);

    if($koneksi->connect_error) {
        die("Koneksi error: " . $koneksi->connect_error);
    }

    $koneksi->query("SET lc_time_names = 'id_ID'");

?>