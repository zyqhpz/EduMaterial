<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduMaterial | Donator</title>
    <link rel="stylesheet" type="text/css" href="../../src/css/header.css">
    <link rel="stylesheet" type="text/css" href="../../src/css/donate.css">
    <link rel="stylesheet" type="text/css" href="../../src/css/dashboard.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    
    <nav id="header">
        <a href="../../index.php" class="logo">EduMaterial</a>
        <div class="toggle"></div>
        <ul class="navigation">
            <li><a href="../../index.php">Home</a></li>
            <li><a href="../../page/donate/donate.php">Donate</a></li>
            <li><a href="../../page/material/math.php">Material</a></li>
            <li><a class="active" href="../../page/about-us/about_us.php">About Us</a></li>
            <li><a id="log" href="#"><i class="fas fa-user"></i></a>
                <ul>
                    <li><a href="../../page/login/login.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</head>
<body>
    <div class="sidebar">
        <h1 id="title">Donator Dashboard</h1>
        <hr>  
        <ul id="subject-list">
            <li class="active">
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span class="link-text">Manage Materials</span>
                </a>
            </li>
            <!-- <li>
                <a href="">
                    <i class="fas fa-address-book"></i>
                    <span class="link-text">Manage Info</span>
                </a>
            </li> -->
        </ul>
    </div>
    <div class="main">
        <h1>Donator Dashboard</h1>
        <h2>Material List</h2>
        <?php require_once 'process.php'; ?>
        <?php
            $mysqli = new mysqli('localhost', 'root', '', 'webapp') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM material INNER JOIN category ON material.category_id = category.category_id") or die($mysqli->error);
        ?>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Material Name</th>
                    <th>Categories</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td data-label="Material Name"><?php echo $row['material_name']?></td>
                    <td><?php echo $row['category_name']?> </td>
                    <td data-label="Type"><?php echo ucfirst($row['material_type'])?></td>
                    <td data-label="Edit">
                        <a href="donator.php?edit=<?php echo $row['material_id']; ?>">
                            <button onclick="hideForm()" type="button" class="edit-btn">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <a href="process.php?delete=<?php echo $row['material_id']; ?>">
                        <button type="button" class="delete-btn">
                            <i class="fas fa-trash"></i>
                        </button>
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <button onclick="hideForm()">click</button>
        <div class="container" id="edit_form">
            <form action="process.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="mat-name">Material Name</label>
                <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Put your material name here..">

                <label for="desc">Material Description</label>
                <input name="desc" type="text" id="desc" name="desc" value="<?php echo $desc; ?>" placeholder="Write description.." style="height:100px"></input>
                
                <label for="category">Category</label>
                <select id="category" name="category">
                    <option value="none" selected disabled hidden>Select material category</option>
                    <option <?php if ($category == 1) echo "selected"; ?> value="1">Mathematics</option>
                    <option <?php if ($category == 2) echo "selected"; ?> value="2">Science</option>
                    <option <?php if ($category == 3) echo "selected"; ?> value="3">Computer Science</option>
                    <option <?php if ($category == 4) echo "selected"; ?> value="4">Philosophy</option>
                    <option <?php if ($category == 5) echo "selected"; ?> value="5">Art</option>
                </select>
                
                <label for="mat-type">Material Type</label>
                <select id="mat-type" name="type">
                    <option value="none" selected disabled hidden>Select material type</option>
                    <option <?php if ($type == 'video') echo "selected"; ?> value="video">Video</option>
                    <option <?php if ($type == 'ebook') echo "selected"; ?> value="ebook">E-Book</option>
                </select>
            
                <label for="mat-file">Material File</label>
                <input name="file" type="text" value="<?php echo $file; ?>" placeholder="Put the material link here..">
                <br>

                <input type="submit" value="Update" name="update">
          
            </form>
          </div>
    </div>
    <script>
       function hideForm() {
            var  x = document.getElementById("edit_form");
            if (x.style.display === "none")
                x.style.display = "block";
            else
                x.style.display = "none";
        }
    </script>
    <script src="/src/js/header.js"></script>
</body>
</html>