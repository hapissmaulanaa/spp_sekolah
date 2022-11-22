<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan']=="gagal") {
            echo "<div class='alert'>Email dan password tidak sesuai</div>";
        }
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="mx-auto mt-5">
                <img src="img/illustration/logo_nama-hitam.jpg" alt="" width="200">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-7 mt-5">
                <img src="img/illustration/layer_login.png" alt="" width="400" class="mt-5">
            </div>
            <div class="col-md-5 mt-5">
                <div class="card shadow-sm p-3 border-radius-10 border-0 mt-5">
                    <div class="card-body">
                        <h4>Login Siswa</h4>
                        <!-- Masukkan nama -->
                        <form action="proses_login_siswa.php" method="post" class="mt-4">
                            <div class="form-group">
                                <input type="text" class="form-control btn-outline-theme" name="email" placeholder="Email">
                            </div>
                            <!-- Masukkan password -->
                            <div class="input-group">
                                <input type="password" name="password" id="" placeholder="Password" class="form-control btn-outline-theme">
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="ml-auto mt-2 text-theme">
                                        <small>
                                        <a href="">Forgot password ?</a>
                                        </small>
                                    </div>
                                </div>
                            </div>    
                            <button type="submit" class="btn btn-primary btn-block p-2 mt-2 btn-color-theme">Login</button>
                        </form>
                        <div class="option-level mt-3 text-center">
                            <span>Login Sebagai? </span>
                            <a  class="active"href="login_siswa.php">Siswa</a>
                            <span class="or">|</span>
                            <a  class="underlineHover" href="login_petugas.php">Admin/Petugas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>