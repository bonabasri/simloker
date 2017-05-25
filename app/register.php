<?php

    // require_once ('../lib/config.php');

    session_start();
    if ($_SESSION['uname']) {
        header('location:app.php');
    } else {
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PSB Online | Login Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bootstrap/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- <link rel="stylesheet" type="text/css" href="../css/login-style.css"> -->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel">
                    <div class="panel-heading" style="text-align: center;">
                        <h1 class="panel-title" style="padding-top:13px;">Sign Up</h1><hr>

                        <div style="color: rgba(102,117,127,0.6);">
                            <?php
                            error_reporting(0);
                            if($_GET['action']=='error'){
                                echo "The username and password did not match.";
                            }
                            ?>
                        </div>
                    
                    <div class="panel-body">
                        <form role="form" method="post" action="auth.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="uname" type="text" placeholder="Username" autocomplete="off" maxlength="32" autofocus required/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="upsw" type="password" placeholder="Password" autocomplete="off" maxlength="32" required/>
                                </div>
                                <div class="form-group">
                                        <select class="form-control" name="role" required/>
                                        <option value="">- Pilih -</option>
                                        <option value="Pelamar">Pelamar</option>
                                        <option value="Perusahaan">Perusahaan</option>
                                        </select>
                                </div>
                                <div class="checkbox" style="text-align: left;">
                                    <label>
                                    <input name="remember" type="checkbox" value="Remember Me">&nbsp;Remember Me
                                    </label>
                                </div><br/>
                                
                                <input type="submit" value="Register" class="btn btn-md btn-primary btn-block"><br/>Punya Akun?
                                <a style="text-decoration:none;" href="index.php"> Masuk </a>
                        
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bootstrap/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bootstrap/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- <script type="text/javascript" src="../js/login.js"></script> -->

</body>

</html>
<?php
}
?>  