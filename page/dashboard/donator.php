<?php
    include('edit-material.php');
?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <nav id="header">
        <a href="../../index.php" class="logo">EduMaterial</a>
        <div class="toggle"></div>
        <ul class="navigation">
            <li><a href="../../index.php">Home</a></li>
            <li><a href="../../page/donate/donate.php">Donate</a></li>
            <li><a href="../../page/material/math.php">Material</a></li>
            <li><a href="../../page/about-us/about_us.php">About Us</a></li>
            <li><a class="active" id="log" href="#"><i class="fas fa-user"></i></a>
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
                while ($row = $result->fetch_assoc()): 
                    if ($row['user_id'] == 101) {
                ?>
                <tr>
                    <tr id="<?php echo $row['material_id'];?>"></tr>
                    <td data-target="fname" data-label="Material Name"><?php echo $row['material_name']?></td>
                    <td data-label="Category"><?php echo $row['category_name']?></td>
                    <td data-target="type" data-label="Type"><?php echo ucfirst($row['material_type'])?></td>
                    <td data-target="file" style="display: none;"><?php echo $row['material_file']?></td>
                    <td data-target="desc" style="display: none;"><?php echo $row['material_description']?></td>
                    <td data-label="Edit">
                        <a href="#" class="modal-trigger" data-role="update" data-id="<?php echo $row['material_id'];?>">
                        <!-- <a href="donator.php?editM=<?php echo $row['material_id'];?>"> -->
                            <button id="myBtn" type="button" class="edit-btn"  >
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <a href="process.php?deleteM=<?php echo $row['material_id']; ?>">
                        <button type="button" class="delete-btn">
                            <i class="fas fa-trash"></i>
                        </button>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                 endwhile; ?>
            </tbody>
        </table>
        <!-- <script>
            $(document).ready(function() {
                $("button")
            })
        </script> -->

        <div class="overlay modal-close"></div>
        <div class="modal-container" id="edit-form">
            <span class="close" ><a class="modal-close" href="#">&times;</a></span>
            <div class="modal-title">Edit Material</div>
            <br>
            <div class="modal-body">
                <form action="#" method="POST">
                    
                    <input type="hidden" name="id" id="matID" value="<?php echo $id; ?>">
                    <label for="mat-name">Material Name</label>
                    <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Put your material name here..">

                    <label for="desc">Material Description</label>
                    <input name="desc" type="text" id="desc" name="desc" value="<?php echo $desc; ?>" placeholder="Write description.." style="height:50px"></input>
                    
                    <label for="category">Category</label>
                    <select id="category" name="category">
                        <option value="none" selected disabled hidden>Select material category</option>
                        <option <?php if ($category == 1) echo "selected"; ?> value="1">Mathematics</option>
                        <option <?php if ($category == 2) echo "selected"; ?> value="2">Science</option>
                        <option <?php if ($category == 3) echo "selected"; ?> value="3">Computer Science</option>
                        <option <?php if ($category == 4) echo "selected"; ?> value="4">Philosophy</option>
                        <option <?php if ($category == 5) echo "selected"; ?> value="5">Art</option>
                    </select>
                    
                    <label for="type">Material Type</label>
                    <select id="type" name="type">
                        <option value="none" selected disabled hidden>Select material type</option>
                        <option <?php if ($type == 'video') echo "selected"; ?> value="video">Video</option>
                        <option <?php if ($type == 'ebook') echo "selected"; ?> value="ebook">E-Book</option>
                    </select>
                
                    <label for="file">Material File</label>
                    <input id="file" name="file" type="text" value="<?php echo $file; ?>" placeholder="Put the material link here.."></input>

                    <div class="modal-footer">
                        <input id="update" type="submit" value="Update" name="update">
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script>

        $(document).ready(function() {

            $(document).on('click', 'a[data-role=update]', function() {
                var currentRow=$(this).closest("tr"); 
                var id = $(this).data('id');

               // var n = $('#' + id).children(td[data-target]);
                var name = currentRow.find("td:eq(0)").text(); // get current row 1st TD value 
                var cat = currentRow.find("td:eq(1)").text();
                var type = currentRow.find("td:eq(2)").text().toLowerCase();
                var file = currentRow.find("td:eq(3)").text();
                var desc = currentRow.find("td:eq(4)").text();

                switch (cat) {
                case 'Mathematics':
                    cat = 1;
                    break;
                case 'Science':
                    cat = 2;
                    break;
                case 'Computer Science':
                    cat = 3;
                    break;
                case 'Philosophy':
                    cat = 4;
                    break;
                case 'Art':
                    cat = 5;
                    break;
                default:
                    cat = " ";
                } 
                $('#matID').val(id);
                $('#name').val(name);
                $('#desc').val(desc);
                $('#type').val(type);
                $('#file').val(file);
                $('#category').val(cat);
            });
            
            $('#update').click(function() {
                var id = $('#matID').val();
                var name = $('#name').val();
                var desc = $('#desc').val();
                var type = $('#type').val();
                var file = $('#file').val();
                var cat = $('#category').val();

                switch (cat) {
                case 'Mathematics':
                    cat = 1;
                    break;
                case 'Science':
                    cat = 2;
                    break;
                case 'Computer Science':
                    cat = 3;
                    break;
                case 'Philosophy':
                    cat = 4;
                    break;
                case 'Art':
                    cat = 5;
                    break;
                default:
                    cat = " ";
                }

                $.ajax({
                    url     : 'edit-material.php',
                    method  : 'post',
                    data    : {name: name, desc: desc, cat: cat, file: file, type: type, id: id},
                    success : function(response) {
                        console.log(response);
                    }
                })
            });
        });
    </script>
    <script src="../../src/js/modal.js"></script>
    <script src="../../src/js/header.js"></script>
</body>
</html>