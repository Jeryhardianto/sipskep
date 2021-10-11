<?php 
ob_start(); 
//cek apakah ada session id jka tidak ada jalankan session start
if (!session_id()) {
    session_start();
}
require_once './app/init.php';

$app = new App();