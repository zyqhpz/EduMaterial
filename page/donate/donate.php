<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduMaterial | Donate</title>
    <link rel="stylesheet" type="text/css" href="/src/css/header.css">
    <link rel="stylesheet" type="text/css" href="\src\css\donate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    
    <nav id="header">
        <a href="/index.php" class="logo">EduMaterial</a>
        <div class="toggle"></div>
        <ul class="navigation">
            <li><a href="/index.php">Home</a></li>
            <li><a class="active" href="#">Donate</a></li>
            <li><a href="/page/material/math.php">Material</a></li>
            <li><a href="/page/about-us/about_us.php">About Us</a></li>
            <li><a id="log" href="#"><i class="fas fa-user"></i></a>
                <ul>
                    <li><a href="/page/login/login.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</head>
<body>
    <div class="main">
        <h1>Donate Form</h1>
        <div class="container">
            <!-- <form action="action_page.php"> -->
            <form action="#">
          
              <label for="mat-name">Material Name</label>
              <input type="text" placeholder="Put your material name here..">

              <label for="subject">Material Description</label>
              <textarea id="subject" name="subject" placeholder="Write description.." style="height:100px"></textarea>
              
              <label for="category">Category</label>
              <select id="category" name="category">
                <option value="math">Mathematics</option>
                <option value="science">Science</option>
                <option value="comp-sci">Computer Science</option>
                <option value="philo">Philosophy</option>
                <option value="art">Art</option>
              </select>
          
              <label for="mat-type">Material Type</label>
              <select id="mat-type" name="mat-type">
                <option value="video">Video</option>
                <option value="ebook">E-Book</option>
              </select>
          
              <label for="mat-file">Upload Material</label>
              <input type="file" id="mat-file" name="filename">
              <br>

              <input type="submit" value="Submit">
          
            </form>
          </div> 
    </div>
    <script src="/src/js/header.js"></script>
</body>
</html>