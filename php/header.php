<?php
include_once 'includes/dbh.inc.php';
include_once 'includes/functions.inc.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title>test systeem</title>

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                crossorigin="anonymous">
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        
    </head>
    <body>
    
    <div class="container">
        <nav>

        <a href="/index.php"><img class="logo" src="/fotos/logo.png" alt="Blogs logo"></a>
          <ul>
              <!-- <li><a href="/index.php">Home</a></li>
              <li><a href="/php/login.php">Login</a></li>
              <li><a href="/includes/logout.inc.php">Log out</a></li> -->


                <?php
                        echo "<li><a href='/index.php'>Home</a></li>";

                    if(isset($_SESSION["useruid"])){
                        echo "<li><a href='/includes/logout.inc.php'>Log out</a></li>";
                    }else{
                        echo "<li><a href='/php/login.php'>Log in</a></li>";
                    }
                ?>
          </ul>

        </nav>