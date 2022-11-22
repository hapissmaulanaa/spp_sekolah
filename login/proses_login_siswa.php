<?php
session_start();
if (isset($_SESSION["login"])) {
    header ("location: ../siswa/home_siswa.php");
    exit;
}

if ($_POST) {
    $email=$_POST['email'];
    $nama=$_POST['nama'];
    $password=$_POST['password'];
    if (empty($email)) {
     echo "<script>alert('email tidak boleh kosong'); location.href='login_siswa.php';</script>";
    }elseif (empty($password)) {
     echo "<script>alert('Password tidak boleh kosong'); location.href='login_siswa.php';</script>";
    }else {
        include "koneksi.php";
        $qry_login_siswa=mysqli_query($koneksi, "select * from siswa where email='".$email."' and password='".md5($password)."'");
        if (mysqli_num_rows($qry_login_siswa)>0) {
            $dt_login_siswa=mysqli_fetch_array($qry_login_siswa);
            session_start();
            $_SESSION['siswa']=true;
            $_SESSION['nama']=$dt_login_siswa['nama'];
            $_SESSION['email']=$dt_login_siswa['email'];
            $_SESSION['password']=$dt_login_siswa['password'];
            $_SESSION['id_spp']=$dt_login_siswa['id_spp'];
            $_SESSION['id_kelas']=$dt_login_siswa['id_kelas'];
            $_SESSION['nisn']=$dt_login_siswa['nisn'];
            $_SESSION["login"]=true;
            header ("location: ../siswa/home_siswa.php");
        }else {
            echo "<script>alert('email dan password tidak benar');location.href='login_siswa.php';</script>";
        }
    }
}
?>