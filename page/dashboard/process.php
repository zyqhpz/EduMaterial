<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'webapp') or die(mysqli_error($mysqli));

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
    }
}

if (isset($_GET['deleteM'])) {
    $id = $_GET['deleteM'];
    
    $mysqli->query("DELETE FROM material WHERE material_id=$id") or die(mysqli->error);
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    
    header("location: donator.php");
}

if (isset($_GET['deleteD'])) {
    $id = $_GET['deleteD'];
    
    $mysqli->query("DELETE FROM user WHERE user_id=$id") or die(mysqli->error);
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    
    header("location: admin.php");
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $type = $_POST['type'];
    $file = $_POST['file'];
    $category = $_POST['category'];

    $syntax = "INSERT INTO material (material_name, material_description, category_id, material_type, material_file, user_id) VALUES ( '$name', '$desc', $category, '$type','$file', $id);";

    $mysqli->query($syntax) or die($mysqli->error);
    
    // $_SESSION['message'] = "Record has been updated!";
    // $_SESSION['msg_type'] = "success";

    header("location: ../donate/donate.php");

    echo "<div>Success</div>";
}
?>