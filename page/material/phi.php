<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduMaterial | Material</title>
    <link rel="stylesheet" type="text/css" href="../../src/css/header.css">
    <link rel="stylesheet" type="text/css" href="../../src/css/material.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <nav id="header">
        <a href="../../index.php" class="logo">EduMaterial</a>
        <div class="toggle"></div>
        <ul class="navigation">
            <li><a href="../../index.php">Home</a></li>
            <li><a href="../../page/donate/donate.php">Donate</a></li>
            <li><a href="../../math.php" class="active">Material</a></li>
            <li><a href="../../page/about-us/about_us.php">About Us</a></li>
            <li><a href="../../page/login/login.php">Login</a></li>
        </ul>
    </nav>
</head>
<body>
    <div class="sidebar">
        <h1 id="title">Subjects</h1>
        <ul id="subject-list"> 
            <li>
                <a href="math.php">
                    <i class="fas fa-calculator"></i>
                    <span class="link-text">Mathematics</span>
                </a>
            </li>
            <li>
                <a href="sci.php">
                    <i class="fas fa-flask"></i>
                    <span class="link-text">Science</span>
                </a>
            <li>
                <a href="cs.php">
                    <i class="fas fa-laptop-code"></i>
                    <span class="link-text">Computer Science</span>
                </a>
            </li>
            <li class="active">
                <a href="phi.php">
                    <i class="fas fa-book"></i>
                    <span class="link-text">Philosophy</span>
                </a>
            </li>
            <li>
                <a href="art.php">
                    <i class="fas fa-paint-brush"></i>
                    <span class="link-text">Art</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="main">
        <h2>Philosophy</h2>
        <div class="topic-list">
            <div id="video">
                <ul>
                    <h3>Videos</h3>
                    <li><a href="https://www.youtube.com/watch?v=kBdfcR-8hEY&list=PL72C62342291D5DAE" target="_blank">Philosophy Lecture: Justice</a> by Mr. A</li>
                    <li><a href="https://www.youtube.com/watch?v=BNYJQaZUDrI&list=PL8dPuuaLjXtNgK6MZucdYldNkMybYIHKR" target="_blank">Philosophy Crash Course</a> by Mrs. B</li>
                    <li><a href="https://www.youtube.com/watch?v=_tCl66AbkqI" target="_blank">Philosophy for Beginners</a> by Ms. C</li>
                </ul>
            </div>
            <div id="book">
                <ul>
                    <h3>E-Book</h3>
                    <li><a href="https://openlibrary-repo.ecampusontario.ca/jspui/bitstream/123456789/475/2/Intro-to-Phil-full-text.pdf" target="_blank">An Introduction to Philosophy</a> by Mr. A</li>
                    <li><a href="http://www.mesacc.edu/~barsp59601/text/101/notes/textbook.pdf" target="_blank">Philosophy 101: Introduction to Western Philosophy</a> by Mrs. B</li>
                    <li><a href="https://global.oup.com/us/companion.websites/9780199812998/studentresources/pdf/perry_glossary.pdf" target="_blank">Glossary of Philosophical Terms</a> by Ms. C</li>
                </ul>
            </div>
        </div>
        <div class=topic-list>
            <div id="video">
                <ul>
                <h3>Video</h3>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "webapp");

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }
                // $sql = "SELECT * FROM material, user";

                $sql = "SELECT * FROM material INNER JOIN user ON material.user_id = user.user_id";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $link = $row["material_file"];
                        $type = $row["material_type"];
                        $title = $row["material_name"];
                        $category = $row["category_id"];
                        $donator = ucfirst($row["user_firstname"]) . " " . ucfirst($row["user_lastname"]);
                        
                        if ($type == "video" and $category == 4) {         
                        echo "<li>
                                <a target=_blank href=" . $link. ">$title</a>" . " by ". $donator ." <br> &emsp; <strong> Description </strong> : " . $row["material_description"] .
                            "</li>";
                        }  
                    }
                } else { echo "0 results"; }
                // $conn->close();
                ?>
                </ul>
            </div>
            <div id="book">
                <ul>
                <h3>E-Book</h3>
                <?php

                $conn = mysqli_connect("localhost", "root", "", "webapp");

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }
                // $sql = "SELECT * FROM material, user";

                // $sql = "SELECT * FROM material INNER JOIN user ON material.user_id = user.user_id";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $link = $row["material_file"];
                        $type = $row["material_type"];
                        $title = $row["material_name"];
                        $category = $row["category_id"];
                        $donator = ucfirst($row["user_firstname"]) . " " . ucfirst($row["user_lastname"]);
                        
                        if ($type == "ebook" and $category == 4) {         
                        echo "<li>
                                <a target=_blank href=" . $link. ">$title</a>" . " by ". $donator ." <br> &emsp; <strong> Description </strong> : " . $row["material_description"] .
                            "</li>";
                        }  
                    }
                } else { echo "0 results"; }
                // $conn->close();
                ?>
                </ul>
            </div>
        </div>
    </div>
    <script src="../../src/js/header.js"></script>
</body>
</html>