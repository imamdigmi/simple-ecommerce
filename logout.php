<?php

session_start();
unset($_SESSION['is_pelanggan']);
header('Location: index.php');