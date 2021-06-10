<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduMaterial | Admin</title>
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
            <li><a href="../../page/about-us/about_us.php">About Us</a></li>
            <li><a class="active" id="log" href="#"><i class="fas fa-user"></i></a>
                <ul>
                    <li><a href="/page/login/login.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</head>
<body>
    <div class="sidebar">
        <h1 id="title">Admin Dashboard</h1>
        <hr>  
        <ul id="subject-list">
            <li class="active">
                <a href="#">
                    <i class="fas fa-user-cog"></i>
                    <span class="link-text">Manage Donator</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="main">
        <h1>Admin Dashboard</h1>
        <h2>Donator Namelist</h2>
        <!-- <table class="styled-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Name">Jake Jaxon</td>
                    <td data-label="Email">jake.jaxon@gmail.com</td>
                    <td data-label="Edit">
                        <button type="button" class="edit-btn">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="delete-btn">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td data-label="Name">Melissa Mei</td>
                    <td data-label="Email">mel.mei@gmail.com</td>
                    <td data-label="Edit">
                        <button type="button" class="edit-btn">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="delete-btn">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td data-label="Name">Dominic Toronto</td>
                    <td data-label="Email">dom.t@gmail.com</td>
                    <td data-label="Edit">
                        <button type="button" class="edit-btn">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="delete-btn">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table> -->
        <?php require_once 'process.php'; ?>
        <?php
            $mysqli = new mysqli('localhost', 'root', '', 'webapp') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM user") or die($mysqli->error);
        ?>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Donator ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while ($row = $result->fetch_assoc()): 
                ?>
                <tr>
                    <td data-label="UserID"><?php echo $row['user_id']?></td>
                    <td data-label="Type"><?php echo ucfirst($row['user_firstname'] . " " . $row['user_lastname'])?></td>
                    <td><?php echo $row['user_email']?> </td>
                    <?php 
                        $id = $row['user_role'];
                        if ($id == 1)
                            $id = "Donator";
                        else
                            $id = "Admin";    
                    ?>
                    <td><?php echo $id; ?> </td>
                    <td data-label="Edit">
                        <a href="admin.php?editD=<?php echo $row['user_id']; ?>">
                            <button id="myBtn" type="button" class="edit-btn">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <a href="process.php?deleteD=<?php echo $row['user_id']; ?>">
                        <button type="button" class="delete-btn">
                            <i class="fas fa-trash"></i>
                        </button>
                        </a>
                    </td>
                </tr>
                <?php
                 endwhile; ?>
            </tbody>
        </table>
        <div id="myModal" class="modal">
            <div class="modal-content" id="edit_form">
            <span class="close">&times;</span>
                <form action="process.php" method="POST">
                    <input type="hidden" name="idU" value="<?php echo $idU; ?>">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" value="<?php echo $fname; ?>" placeholder="First Name">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" value="<?php echo $lname; ?>" placeholder="Last Name">
                                     
                    <label for="user-role">Role</label>
                    <select id="user-role" name="role">
                        <option value="none" selected disabled hidden>Select user role</option>
                        <option <?php if ($role == '1') echo "selected"; ?> value="1">Donator</option>
                        <option <?php if ($role == '0') echo "selected"; ?> value="0">Admin</option>
                    </select>

                    <input type="submit" value="Update" name="updateD">
            
                </form>
            </div>
        </div>
    </div>
    <script src="../../src/js/header.js"></script>
    <script>
                var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var mB = document.querySelector('.edit-btn');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
//     btn.onclick = function() {
//      // modal.style.display = "block";
//    modal.classList.add('show');
//     }

mB.addEventListener('click', () => {
// modal.classList.add('show');
modal.style.display = "block";
});


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}
    </script>
</body>
</html>