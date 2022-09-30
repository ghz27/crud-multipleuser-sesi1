<?php
session_start();
if (isset($_SESSION['admin_username'])) {
    header("location:dashboard.php");
}
include("../inc/koneksi.php");

$username = "";
$password = "";
$err = "";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == '' or $password == '') {
        $err .= "<div style='margin-top: 5px;' class='alert alert-sm alert-danger'>
                Masukan Username dan Password anda! 
                </div>";
    }
    if (empty($err)) {
        $sql1 = "select * from admin where username = '$username'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);
        if ($r1['password'] != md5($password)) {
            $err .= "<div style='margin-top: 5px;' class='alert alert-danger'>Akun tidak ditemukan</div>";
        }
    }
    if (empty($err)) {
        $id_login = $r1['id_login'];
        $sql1 = "select * from admin_akses where id_login = '$id_login'";
        $q1 = mysqli_query($koneksi,$sql1);
        while($r1 = mysqli_fetch_array($q1)) {
            $akses[] = $r1['id_akses']; //admin, user
        }
        if (empty($akses)) {
            $err .= "<div style='margin-top: 5px;' class='alert alert-sm alert-danger'>
                    Anda tidak mempunyai akses ke halaman ini! 
                    </div>";
        }
    }
    if (empty($err)) {
        $_SESSION['admin_username'] = $username;
        $_SESSION['admin_akses'] = $akses;
        header("location:dashboard.php");
        exit();
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="../dist/css/style.css">
</head>

<body>
    <div class="global-container">
        <div class="card login-form shadow">
            <div class="mycard-body">
                <h1 class="card-title text-center">LOGIN</h1>
            </div>
            <div class="card-text">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="InputUsername" class="form-label">Username</label>
                        <input type="text" value="<?php echo $username ?>" class="form-control form-control-lg" id="InputUsername" name="username" placeholder="Masukan Username">
                    </div>
                    <div class="mb-3">
                        <label for="InputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control form-control-lg" id="InputPassword" name="password" placeholder="Masukan Password">
                    </div>
                    <div class="d-grid">
                        <input type="submit" value="Masuk" name="login" class="btn btn-success btn-lg">
                    </div>
                </form>
            </div>
            <?php
            if ($err) {
                echo $err;
            }
            ?>
        </div>
    </div>


    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>