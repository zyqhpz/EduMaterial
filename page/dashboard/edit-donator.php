<?php
    //session_start()

$mysqli = new mysqli('localhost', 'root', '', 'webapp') or die(mysqli_error($mysqli));


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $role = $_POST['role'];

    $sql = "UPDATE user SET user_firstname='$fname', user_lastname='$lname', user_role='$role' WHERE user_id LIKE $id";

$res = $mysqli->query($sql) or die($mysqli->error);

    $_SESSION['msg'] = "Record has been updated!";

    if ($res) {
        return 'data updated';
    }
}
?>