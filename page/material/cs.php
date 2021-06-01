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
        <a href="/index.php" class="logo">EduMaterial</a>
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
            <li class="active">
                <a href="cs.php">
                    <i class="fas fa-laptop-code"></i>
                    <span class="link-text">Computer Science</span>
                </a>
            </li>
            <li>
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
        <h2>Computer Science</h2>
        <div class="topic-list">
            <div id="video">
                <ul>
                    <h3>Videos</h3>
                    <li><a href="https://www.youtube.com/watch?v=rfscVS0vtbw" target="_blank">Python</a> by Mr. A</li>
                    <li><a href="https://www.youtube.com/watch?v=vLnPwxZdW4Y" target="_blank">C++</a> by Mrs. B</li>
                    <li><a href="https://www.youtube.com/watch?v=PkZNo7MFNFg" target="_blank">Javascript Tutorial</a> by Ms. C</li>
                </ul>
            </div>
            <div id="book">
                <ul>
                    <h3>E-Book</h3>
                    <li><a href="https://www.greenteapress.com/thinkpython/thinkpython.pdf" target="_blank">Python for Computer Scientist</a> by Mr. A</li>
                    <li><a href="https://www.cplusplus.com/files/tutorial.pdf" target="_blank">C++ Tutorial</a> by Mrs. B</li>
                    <li><a href="https://eloquentjavascript.net/Eloquent_JavaScript.pdf" target="_blank">Javascript 3rd Edition</a> by Ms. C</li>
                </ul>
            </div>
        </div>
    </div>
    <script src="/src/js/header.js"></script>
</body>
</html>