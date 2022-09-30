<?php
session_start();
include("koneksi.php");
if (!isset($_SESSION['admin_username'])) {
    header("location:../page/login.php");
}

// print_r($_SESSION['admin_akses']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../dist/css/style.css">

    <style>
        .mycontainer {
            margin-top: 58px;
            padding: 10px 15px;
            border: solid 1px blue;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">AnjayPHP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu Admin</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="?page=home">Home</a>
                        </li>
                        <?php if(in_array("admin", $_SESSION['admin_akses'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=admin">Admin</a>
                        </li>
                        <?php } ?>
                        <?php if(in_array("user", $_SESSION['admin_akses'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=user">User</a>
                        </li>
                        <?php } ?>

                        <!-- logout -->
                        <li class="nav-item">
                            <a class="nav-link" href="?page=logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<div class="mycontainer">
<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        switch ($page) {
            case 'home':
                include "../page/pages/home.php";
                break;
            case 'admin':
                include "../page/pages/admin.php";
                break;
            case 'user':
                include "../page/pages/user.php";
                break;
            case 'logout':
                include "../page/logout.php";
                break;
            
            default:
            include "../page/pages/home.php";
                break;
        }
    } else {
        include "../page/pages/home.php";
    }
    
    
?>
</div>
