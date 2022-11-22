<?php
session_start();
if (isset($_SESSION["login"])) {
    header ("location: ../admin/home_admin.php");
    exit;
}

if ($_POST) {
    $username=$_POST['username'];
    $password=$_POST['password'];
    if (empty($username)) {
     echo "<script>alert('Username tidak boleh kosong'); location.href='login_petugas.php';</script>";
    }elseif (empty($password)) {
     echo "<script>alert('Password tidak boleh kosong'); location.href='login_petugas.php';</script>";
    }else {
     include "koneksi.php";
     $qry_login=mysqli_query($koneksi, "select * from petugas where username='".$username."' and password='".md5($password)."'");
        if (mysqli_num_rows($qry_login)>0) {
            $dt_login=mysqli_fetch_array($qry_login);
            if ($dt_login['level']=="admin"){
                session_start();
                $_SESSION['admin']=true;
                $_SESSION['username']=$dt_login['username'];
                $_SESSION['password']=$dt_login['password'];
                $_SESSION["login"]=true;
                header ("location: ../admin/home_admin.php");
 
 
            }elseif($dt_login['level']=="petugas"){
                session_start();	 
                $_SESSION['petugas']=true;
                $_SESSION['username']=$dt_login['username'];
                $_SESSION['password']=$dt_login['password'];
                $_SESSION["login"]=true;
                header ("location: ../admin/home_petugas.php");


            }else {
                echo "<script>alert('Username dan password tidak benar');location.href='login_petugas.php';</script>";
            }  
        }
    }
}
?>