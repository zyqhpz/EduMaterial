<?php

session_start();


// $conn = mysqli_connect("localhost", "root", "", "webapp");

$mysqli = new mysqli('localhost', 'root', '', 'webapp') or die(mysqli_error($mysqli));


// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

$id = 0;
$name = '';
$desc = '';
$file = '';
$type = '';
$category= '';

$fname = '';
$lname = '';
$role = '';

$edit = false;

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $type = $_POST['type'];
    $file = $_POST['file'];
    $category = $_POST['category'];

    $mysqli->query("UPDATE material SET material_name='$name', material_description='$desc', material_file='$file', material_type='$type', category_id='$category' WHERE material_id=$id") or die($mysqli->error);
    
    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "success";

    header("location: donator.php");

    echo "<div>Success</div>";
}
if (isset($_POST['updateD'])) {
    $idU = $_POST['idU'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $role = $_POST['role'];
    $mysqli->query("UPDATE user SET user_firstname='$fname', user_lastname='$lname', user_role='$role' WHERE user_id LIKE $idU") or die($mysqli->error);
    
    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "success";

    header("location: admin.php");

    echo "<div>Success</div>";
}

if (isset($_GET['editM'])) {
    $id = $_GET['editM'];

    $edit = true;
    
    $sql = "SELECT * FROM material WHERE material_id=$id";
    
    $result = $mysqli->query($sql) or die($mysqli->error());
    if ($result->num_rows > 0) {
        $row = $result->fetch_array();
        $name = $row['material_name'];
        $desc = $row['material_description'];
        $category = $row['category_id'];
        $type = $row['material_type'];
        $file = $row['material_file'];
    }

    // $mysqli->query("UPDATE material(material_name, material_description, material_file) VALUES('$name', '$desc', '$type', '$file')") or die(mysqli->error);
    
    // $_SESSION['message'] = "Record has been updated!";
    // $_SESSION['msg_type'] = "success";

   // header("location: donator.php");
}

if (isset($_GET['editD'])) {
    $idU = $_GET['editD'];

    $edit = true;
    
    $sql = "SELECT * FROM user WHERE user_id=$idU";
    
    $result = $mysqli->query($sql) or die($mysqli->error());

    if ($result->num_rows > 0) {
        $row = $result->fetch_array();
        $fname = $row['user_firstname'];
        $lname = $row['user_lastname'];
        $role = $row['user_role'];
       // $desc = $row['material_description'];
       // $category = $row['category_id'];
       // $type = $row['material_type'];
        //$file = $row['material_file'];
    }

    // $mysqli->query("UPDATE material(material_name, material_description, material_file) VALUES('$name', '$desc', '$type', '$file')") or die(mysqli->error);
    
    // $_SESSION['message'] = "Record has been updated!";
    // $_SESSION['msg_type'] = "success";

   // header("location: donator.php");
}

if (isset($_GET['deleteM'])) {
    $id = $_GET['deleteM'];
    
    $mysqli->query("DELETE FROM material WHERE material_id=$id") or die(mysqli->error);
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    
    header("location: donator.php");
}

// $sql = "SELECT * FROM material INNER JOIN user ON material.user_id = user.user_id";

// $result = $conn->query($sql);
if (isset($_GET['deleteD'])) {
    $id = $_GET['deleteD'];
    
    $mysqli->query("DELETE FROM user WHERE user_id=$id") or die(mysqli->error);
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    
    header("location: admin.php");
}
?>