<?php
    session_start();
    if ( empty($_SESSION['uname']) ) {
        header('location:./');
    } else {
        require_once ('../core.php');
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

    <title>Lowongan Kerja | Administrator</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bootstrap/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bootstrap/datatables/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Bootstrap datetimepicker CSS -->
    <link href="../dist/bootstrap-datepicker/bootstrap-datepicker3.min.css" rel="stylesheet">

    <!-- Wysihtml5 -->
    <link href="../dist/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css">

    <!-- Sweet alert -->
    <link href="../dist/sweetalert/sweetalert.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="../bootstrap/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bootstrap/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bootstrap/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../bootstrap/datatables/js/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Bootstrap Datetimepicker JS-->
    <script src="../dist/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

    <!-- Sweet alert -->
    <script src="../dist/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <!-- Logout Warning -->
    <script src="../dist/logoutwarning.js"></script>

    <script src="../dist/ckeditor/ckeditor.js"></script>
    <script src="../dist/ckeditor/samples/js/sample.js"></script>

    <!-- <script src="https://cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script> -->

</head>

<body>

    <div id="wrapper">

        <?php require_once('menu.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        if(isset($_GET['p']) && strlen($_GET['p']) > 0) {
                            $p=str_replace(".","/",$_GET['p']).".php";
                        } else {
                            $p="dashboard.php";    
                        } if(file_exists("modul/".$p)) {
                            include("modul/".$p);    
                        } else {
                            include("dashboard.php");   
                        }  
                    ?>
                </div>
            </div>
        </div>

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
