<?php 
    ob_start();
    require_once ('core.php');

    session_start();
    if ($_SESSION['uname']) 
    {
        header('location:main.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lowongan Kerja Kabupaten Cilacap</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/login-style.css">

    <!-- Custom Fonts -->
    <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?ref=home">LOWONGAN KERJA</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse pull-right navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="?p=home">Beranda</a>
                    </li>
                    <li>
                        <a href="#">Lowongan Kerja</a>
                    </li>
                    <li>
                        <a href="#">Pasang Lowongan</a>
                    </li>
                    <li>
                        <a href="?p=register">Registrasi</a>
                    </li>
                    <li>
                        <a href="?p=login">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <?php
                if( isset($_GET['p']) && strlen($_GET['p']) > 0 )
                {
                    $p = str_replace(".","/",$_GET['p']).".php";
                } else {
                    $p = "home.php";    
                } if( file_exists("modul/".$p) )
                {
                    include("modul/".$p);
                } else {
                    include("home.php");
                }  
            ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <!-- <footer> -->
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        <!-- </footer> -->

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/login.js"></script>

</body>

</html>
