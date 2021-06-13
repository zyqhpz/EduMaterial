<?php
    //session_start();

$mysqli = new mysqli('localhost', 'root', '', 'webapp') or die(mysqli_error($mysqli));


if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $category = $_POST['category'];
    $file = $_POST['file'];
    $type = $_POST['type'];
    $id = $_POST['id'];

    $sql =  "UPDATE material SET material_name='$name', material_description='$desc', material_file='$file', material_type='$type', category_id=$category WHERE material_id=$id";

$res = $mysqli->query($sql) or die($mysqli->error);

    //$_SESSION['msg'] = "Record has been updated!";

    if ($res) {
        return 'data updated';
    }
}
?>