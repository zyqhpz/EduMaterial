<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduMaterial | Material</title>
    <link rel="stylesheet" type="text/css" href="../../src/css/header.css">
    <link rel="stylesheet" type="text/css" href="../../src/css/material.css">
    <link rel="icon" href="../../src/image/menu/logo.svg">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <nav id="header">
        <a href="/index.php" class="logo">EduMaterial</a>
        <div class="toggle"></div>
        <ul class="navigation">
            <li><a href="../../index.php">Home</a></li>
            <li><a href="../../page/donate/donate.php">Donate</a></li>
            <li><a href="math.php" class="active">Material</a></li>
            <li><a href="../../page/about-us/about_us.php">About Us</a></li>
            <?php
            if (isset($_SESSION['user_id'])) {
                if ($_SESSION['items']['Role'] == 1) {
            ?>
            <li><a id="log" href="../../page/dashboard/donator.php"><i class="fas fa-user"></i></a>
            <?php }
                else {
            ?>
            <li><a id="log" href="../../page/dashboard/admin.php"><i class="fas fa-user"></i></a>
            <?php } 
            }
            else {
            ?>
            <li><a href="../../page/login/login.php">Login</a></li>
            <?php
            }
            ?>
                <ul>
                    <li><a href="../login/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</head>