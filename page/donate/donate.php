<?php 
// include('../login/proc.php');
session_start();
    $uID;
    if (isset($_SESSION['user_id']))
        $uID = $_SESSION['user_id'];
    else
        $uID = NULL;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduMaterial | Donate</title>
    <link rel="stylesheet" type="text/css" href="../../src/css/header.css">
    <link rel="stylesheet" type="text/css" href="..\..\src\css\donate.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    
    <nav id="header">
        <a href="/index.php" class="logo">EduMaterial</a>
        <div class="toggle"></div>
        <ul class="navigation">
            <li><a href="../../index.php">Home</a></li>
            <li><a class="active" href="#">Donate</a></li>
            <li><a href="../../page/material/math.php">Material</a></li>
            <li><a href="../../page/about-us/about_us.php">About Us</a></li>
            <!-- click to dashboard based on user_role / donator or admin -->
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
<body>
    <div class="main">
        <h1>Donate Form</h1>
        <div class="container">
        <?php require_once '../dashboard/process.php'; ?>
        <?php
            $mysqli = new mysqli('localhost', 'root', '', 'webapp') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM material") or die($mysqli->error);
        ?>
        <script>
            console.log(<?php echo $uID; ?>);
        </script>
            <form action="../dashboard/process.php" method="POST">
            <input type="hidden" name="id" value=<?php echo $uID ?>>
          
              <label for="name">Material Name</label>
              <input type="text" name="name" placeholder="Put your material name here..">

              <label for="subject">Material Description</label>
              <textarea id="subject" name="desc" placeholder="Write description.." style="height:100px"></textarea>
              
              <label for="category">Category</label>
              <select id="category" name="category">
                <option value="none" selected disabled hidden>Select material category</option>
                <option value="1">Mathematics</option>
                <option value="2">Science</option>
                <option value="3">Computer Science</option>
                <option value="4">Philosophy</option>
                <option value="5">Art</option>
              </select>
              
              <label for="mat-type">Material Type</label>
              <select id="mat-type" name="type">
                <option value="none" selected disabled hidden>Select material type</option>
                <option value="video">Video</option>
                <option value="ebook">E-Book</option>
              </select>
          
              <label for="mat-file">Material File</label>
              <input type="text" name="file" placeholder="Put the material link here..">
              <br>

              <input type="submit" value="Submit" name="submit">
          
            </form>
          </div>
    </div>
    <script src="../../src/js/header.js"></script>
</body>
</html>