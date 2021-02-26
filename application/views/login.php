<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url("assets/vendor/fontawesome-free/css/all.min.css")?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/sweetalert2/sweetalert2.min.css') ?>">

    <!-- Custom styles for this template-->
    <link href="<?=base_url("assets/css/sb-admin-2.min.css")?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                            </div>
                            <form action="<?= base_url("index.php/login/login")?>" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username"
                                        placeholder="Masukkan Username" autocomplete='off' required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Masukkan Password" autocomplete='off'required>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
     <!-- Bootstrap core JavaScript-->
     <script src="<?=base_url("assets/vendor/jquery/jquery.min.js")?>"></script>
    <script src="<?=base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js")?>"></script>    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?=base_url("assets/vendor/jquery-easing/jquery.easing.min.js")?>"></script>
    

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url("assets/js/sb-admin-2.min.js")?>"></script>
    <script>
        var username = '<?= $this->session->flashdata('status-login'); ?>';
        var password = '<?= $this->session->flashdata('status-login'); ?>';
        var false_login = '<?= $this->session->flashdata('status-login'); ?>';
        if(username == "Username"){
            Swal.fire({
                    title: "Gagal Login",
                    text: "Username Tidak Ditemukan",
                    type: "error",
                    timer: 1500
                });
        }
        if(password == "Password"){
            Swal.fire({
                    title: "Gagal Login",
                    text: "Password Salah",
                    type: "error",
                    timer: 1500
                });
        }
        if(false_login == "False"){
            Swal.fire({
                    title: "Gagal",
                    text: "Silakan Login Terlebih Dahulu",
                    type: "error",
                    timer: 1500
                });
        }
    </script>
</body>
</html>