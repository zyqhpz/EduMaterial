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