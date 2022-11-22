<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Data petugas</h3>
    <br>
    <table>
        <thead>
            <td>No.</td>
            <td>Username</td>
            <td>Nama Petugas</td>
            <td>Aksi</td>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $qry_petugas=mysqli_query($koneksi, "select * from petugas");
            $no=0;
            while ($data_petugas=mysqli_fetch_array($qry_petugas)) {
                $no++;
            ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$data_petugas['username']?></td>
                <td><?=$data_petugas['nama_petugas']?></td>
                <td><a href="ubah_petugas.php?id_petugas=<?=$data_petugas['id_petugas']?>">Ubah</a> | <a href="hapus_petugas.php?id_petugas=<?=$data_petugas['id_petugas']?>">Hapus</a></td><?php
            }
                ?>
            </tr>
        </tbody>
    </table>
</body>
</html>