<?php

// Membuat koneksi ke database
$koneksi = new Mysqli("localhost", "root", "idiot", "uni-solo");

// Jika koneksi gagal
if (!$koneksi) {
    echo "<h3>ERROR: Koneksi database gagal!</h3>";
}