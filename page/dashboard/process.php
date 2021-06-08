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
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

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

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    $mysqli->query("DELETE FROM material WHERE material_id=$id") or die(mysqli->error);
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    
    header("location: donator.php");
}

// $sql = "SELECT * FROM material INNER JOIN user ON material.user_id = user.user_id";

// $result = $conn->query($sql);
?>