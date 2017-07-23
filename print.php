<?php

	session_start();
    // include 'core.php';
    require( dirname( __FILE__ ) . '/fungsi.php' );

    if (empty($_SESSION['uac']) ) {

        header('location:login.php') ;
    
    } else {
    	
        // require( dirname( __FILE__ ) . 'core.php' );
        include 'core.php';
    }

    if (isset($_GET['p']) && strlen($_GET['p']) > 0 ) {
	
	   $p = str_replace(".","/",$_GET['p']).".php";
    
    } else {
	
	   $p = "home.php";
    }
    
    if(file_exists("modul/".$p) )
    
    {
	   include ("modul/".$p);
    
    } else {
	
	   include ("modul/home.php");
    
    }
?>