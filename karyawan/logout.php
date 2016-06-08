<?php

session_start();
unset($_SESSION['is_karyawan']);
header('Location: login.php');