<?php
session_start();
require 'conn.php';
mysql_connect("localhost","root");
mysql_select_db("db_klinik");
 
if ( isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM t_user WHERE username = '$username' AND password = '$password'";
    //echo $query;
    $sql = mysqli_query($koneksi,$query);
    $hasil = mysqli_fetch_array($sql);
    $level_user = $hasil['level_user'];
    $nama = $hasil['nama'];
    
    


    if (!isset($hasil) ) {
      header('location: login.php?error='.base64_encode('Username dan Password Invalid!!!'));
      exit();
    } else {
      $_SESSION['user_login'] = $level_user;
      $_SESSION['sess_id']    = $id_user;
      $_SESSION['nama']       = $nama;

      header('location:modul/on-'.$level_user);
      exit();
    }
 
   
} else {
    header('location:login.php');
    exit();
}