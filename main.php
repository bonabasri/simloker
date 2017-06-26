<?php     
    session_start();
    require_once ('core.php');
    if  ( empty($_SESSION['uname']))  
    {
        header('location:./');
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

        <!-- MetisMenu CSS -->
    <link href="bootstrap/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="bootstrap/datatables/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Timeline CSS -->
    <link href="dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="css/blog-home.css" rel="stylesheet"> -->

    <!-- Bootstrap datetimepicker CSS -->
    <link href="dist/bootstrap-datepicker/bootstrap-datepicker3.min.css" rel="stylesheet">

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
                <a class="navbar-brand" href="#">LOWONGAN KERJA</a>
            </div>
    <?php
    if ($_SESSION['uac'] === 'ADM') {
    ?>
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
                        <a href="?p=lowongan.view">Pasang Lowongan</a>
                    </li>
                    <li>
                        <a href="?p=logout">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        
    <?php 
        } elseif($_SESSION['uac'] === 'PELAMAR') {
    ?>
            <div class="collapse pull-right navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="?p=home">Beranda</a>
                    </li>
                    <li>
                        <a href="#">Lowongan Kerja</a>
                    </li>
                    <li>
                        <a href="?p=pelamar.profil">Profile</a>
                    </li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['uname']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Ganti Password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="?p=logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </ul>
            </div>
    <?php 
        } elseif ($_SESSION['uac'] === 'PERUSAHAAN') {
    ?>
            <div class="collapse pull-right navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="?p=home">Beranda</a>
                    </li>
                    <li>
                        <a href="?p=lowongan.view">Postingan</a>
                    </li>
                    <li>
                        <a href="?p=lowongan.add">Pasang Lowongan</a>
                    </li>
                    <li>
                        <a href="?p=perusahaan.profil">Profil</a>
                    </li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['uname']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Ganti Password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="?p=logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                </ul>
            </div>
        </div>
        <!-- /.container -->
    <?php 
        }
    ?>
    </nav>

    <!-- Page Content -->
    <div class="container bg-white col-lg-11 col-lg-offset-1">

        <div class="row">
        <div class="col-lg-10">
            <?php
                if ($_SESSION['uac'] === 'PERUSAHAAN') 
                {
                    if( isset($_GET['p']) && strlen($_GET['p']) > 0 )
                    {
                        $p = str_replace(".","/",$_GET['p']).".php";
                    } else {
                        $p = "perusahaan/profil.php";    
                    } if( file_exists("modul/".$p) )
                    {
                        include("modul/".$p);
                    } else {
                        include("perusahaan/profil.php");
                    }
                } 
                else if($_SESSION['uac'] === 'PELAMAR') 
                {
                    if( isset($_GET['p']) && strlen($_GET['p']) > 0 )
                    {
                        $p = str_replace(".","/",$_GET['p']).".php";
                    } else {
                        $p = "pelamar/profil.php";    
                    } if( file_exists("modul/".$p) )
                    {
                        include("modul/".$p);
                    } else {
                        include("pelamar/profil.php");
                    }
                }  
            ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <!-- <footer> -->
            <!-- <div class="row"> -->
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            <!-- </div> -->
            <!-- /.row -->
        <!-- </footer> -->

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/login.js"></script>


    <!-- Metis Menu Plugin JavaScript -->
    <script src="bootstrap/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bootstrap/datatables/js/jquery.dataTables.min.js"></script>
    <script src="bootstrap/datatables/js/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Bootstrap Datetimepicker JS-->
    <script src="dist/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

    <script src="dist/ckeditor/ckeditor.js"></script>
    <script src="dist/ckeditor/samples/js/sample.js"></script>

    <script>
            $('#dataTables-example').DataTable({
                    responsive: true
            });

            $('#datepicker').datepicker({
                //dateFormat: "dd/MM/yy",
                //autoclose:true
                changeMonth: true,
                yearRange: "-30:+0",
                format: "dd-mm-yyyy",
                calendarWeeks: true,
                todayBtn: "linked",
                changeYear: true
            });

            CKEDITOR.replace( 'editor' );
            
    </script>

</body>

</html>
