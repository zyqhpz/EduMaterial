<?php
    include('h.php');
?>
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
        <!-- <div class="topic-list">
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
        </div> -->
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
                        
                        if ($type == "video" and $category == 3) {         
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
                        
                        if ($type == "ebook" and $category == 3) {         
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