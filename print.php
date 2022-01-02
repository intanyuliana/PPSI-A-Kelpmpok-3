<?php

	session_start();
    // include 'connect.php';
    require( dirname( __FILE__ ) . '/fungsi.php' );

    if (empty($_SESSION['uac']) ) {

        header('location:login.php') ;
    
    } else {
    	
        // require( dirname( __FILE__ ) . 'connect.php' );
        include 'connect.php';
    }

    if (isset($_GET['p']) && strlen($_GET['p']) > 0 ) {
	
	   $p = str_replace(".","/",$_GET['p']).".php";
    
    } else {
	
	   $p = "home.php";
    }
    
    if(file_exists("process/".$p) )
    
    {
	   include ("process/".$p);
    
    } else {
	
	   include ("process/home.php");
    
    }
?>