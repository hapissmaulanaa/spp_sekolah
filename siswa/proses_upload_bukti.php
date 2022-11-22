<?php
if($_POST) {
    $id_pembayaran=$_GET['id_pembayaran'];
    echo $id_pembayaran;
    $tahun=$_POST['tahun_spp'];
    $foto = basename($_FILES["foto"]["name"]);
    $target_dir = "../admin/img/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(empty($tahun)){
        echo "<script>alert('tahun SPP tidak boleh kosong');location.href='tagihan.php';</script>";
    } elseif(empty($foto)){
        echo "<script>alert('foto produk tidak boleh kosong');location.href='tagihan.php';</script>"; 
    } else {
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if($check == false) {
            echo "<script>alert('File yang dipilih bukan foto.');location.href='tagihan.php';</script>";
            $uploadOk = 0;
        } else {
            $uploadOk = 1;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "<script>alert('File foto sudah ada.');location.href='tagihan.php';</script>";
        $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["foto"]["size"] > 999999999999) {
            echo "<script>alert('File foto terlalu besar');location.href='tagihan.php';</script>";
        $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "<script>alert('Hanya menerima file foto JPG, JPEG, PNG & GIF');location.href='tagihan.php';</script>";
        $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script>alert('File foto tidak terupload');location.href='tagihan.php';</script>";  
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                
                include "koneksi.php";
                
                $insert=mysqli_query($koneksi, "UPDATE pembayaran SET bukti='$foto' WHERE id_pembayaran ='$id_pembayaran'") or die(mysqli_error($koneksi));

                if($insert) {
                    echo "<script>alert('Sukses menambahkan bukti');location.href='tagihan.php';</script>";
                } else {
                    echo "<script>alert('Gagal menambahkan bukti');location.href='tagihan.php';</script>";
                }
            } else {
                echo "<script>alert('Error saat upload file foto');location.href='tagihan.php';</script>";
            }
        }

    }
}
?>