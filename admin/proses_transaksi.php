<?php 
    include 'koneksi.php';
    session_start();
  if($_POST['id_pembayaran']){
    $id_pembayaran = $_POST['id_pembayaran'];
    $nisn = $_POST['nisn'];
    // $qry=mysqli_query($conn,"select * from petugas where username = '".$_SESSION['username']."'");
    // $dt_admin=mysqli_fetch_array($qry);
    // $id_petugas = $dt_admin['id_petugas'];
    $tgl_bayar = date('Y-m-d');

    $bayar = mysqli_query($koneksi ,"UPDATE pembayaran SET 
            jatuh_tempo = '$tgl_bayar',
            keterangan = 'lunas'
            WHERE pembayaran.id_pembayaran = '$id_pembayaran'") or die (mysqli_error($koneksi));

    if($bayar){
        header('location: ../admin/search/searchspp.php?search='.$nisn.'');
    }else{
        echo "
			<script>
			alert('gagal')
			</script>
			";
    }
}
?>