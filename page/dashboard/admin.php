<?php
    include('edit-donator.php');
    session_start();

    $mysqli = new mysqli('localhost', 'root', '', 'webapp') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM user") or die($mysqli->error);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduMaterial | Admin</title>
    <link rel="stylesheet" type="text/css" href="../../src/css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="../../src/css/donate.css">
    <link rel="stylesheet" type="text/css" href="../../src/css/dashboard.css?v=<?php echo time(); ?>">

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
                    <li><a href="../login/login.php">Logout</a></li>
                    <?php session_reset(); ?>
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
        <?php
        $uName;
        if (isset($_SESSION['user_id'])):
            while ($row = $result->fetch_assoc()):
                if ($row['user_id'] == $_SESSION['user_id']) {
                    $uName = $row['user_firstname'];
                }
            endwhile;
        ?>
        <p>Welcome <strong><?php echo $uName?></strong> </p>
        <h1>Admin Dashboard</h1>
        <?php endif?>
        <h2>Donator Namelist</h2>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $mysqli = new mysqli('localhost', 'root', '', 'webapp') or die(mysqli_error($mysqli));
                $result = $mysqli->query("SELECT * FROM user") or die($mysqli->error);
                while ($row = $result->fetch_assoc()): 
                ?>
                <tr>
                    <tr id="<?php echo $row['user_id'];?>"></tr>
                    <td data-label="Type"><?php echo ucfirst($row['user_firstname'] . " " . $row['user_lastname'])?></td>
                    <td data-label="Email"><?php echo $row['user_email']?> </td>
                    <td style="display: none;"><?php echo $row['user_role']?></td>
                    <?php 
                        $id = $row['user_role'];
                        if ($id == 1)
                            $id = "Donator";
                        else
                            $id = "Admin";    
                    ?>
                    <td data-label="Role"><?php echo $id; ?> </td>
                    <td data-label="Action">
                        <a class="modal-trigger" data-role="update" href="#" data-id="<?php echo $row['user_id']; ?>">
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
        <div class="overlay modal-close"></div>
        <div class="modal-container" id="edit-form">
            <span class="close" ><a class="modal-close" href="#">&times;</a></span>
            <div class="modal-title">Edit Donator</div>
            <br>
            <div class="modal-body">
                <form action="#" method="POST">
                    <input type="hidden" id="userID" name="id" value="<?php echo $id; ?>">
                    <label for="fname">First Name</label>
                    <input id="fname" type="text" name="fname" value="<?php echo $fname; ?>" placeholder="First Name">
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>" placeholder="Last Name">
                                     
                    <label for="role">Role</label>
                    <select id="role" name="role">
                        <option value="none" selected disabled hidden>Select user role</option>
                        <option <?php if ($role == '1') echo "selected"; ?> value="1">Donator</option>
                        <option <?php if ($role == '0') echo "selected"; ?> value="0">Admin</option>
                    </select>
                    <div class="modal-footer">
                        <input type="submit" value="Update" name="update">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        
        $(document).ready(function() {

            $(document).on('click', 'a[data-role=update]', function() {
                var currentRow=$(this).closest("tr");
                var r = $(this).closest("tr");
                var id = $(this).data('id');
                
                var name = currentRow.find("td:eq(0)").text().split(' ');
                var email = currentRow.find("td:eq(1)").text();
                var role = currentRow.find("td:eq(2)").text();
                console.log(role);
                var fname = name[0];
                var lname = name[1];

                $('#userID').val(id);
                $('#fname').val(fname);
                $('#lname').val(lname);
                $('#role').val(role);
            });
            $('#update').click(function() {
                var id = $('#userID').val();
                var fname = $('#fname').val();
                var lname = $('#lname').val();
                var role = $('#role').val();

                $.ajax({
                    url     : 'edit-donator.php',
                    method  : 'post',
                    data    : {fname: fname, lname: lname, role: role, id: id},
                    success : function(response) {
                        console.log(response);
                    }
                })
            });
        });
    </script>

    <script src="../../src/js/header.js"></script>
    <script src="../../src/js/modal.js"></script>
</body>
</html>