<?php
    $mysqli = new mysqli('localhost', 'root', '', 'webapp') or die(mysqli_error($mysqli));

    if (isset($_POST['submit'])) {
        //$id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $role = 1;
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

        $query = "SELECT * FROM user WHERE user_email = '$email'";
        $result = mysqli_query($mysqli, $query);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                header("Location: register.php?message=User Already Exists");
            }
            else {
                $syntax = "INSERT INTO user (user_firstname, user_lastname, user_email, user_password, user_role) VALUES ( '$fname', '$lname', '$email', '$pass', $role);";
                $mysqli->query($syntax) or die($mysqli->error);
                header("Location: register.php?message=Registration Success");
            }
        }
    }

    if (isset($_POST['login'])) {

        $pass = $_POST['pass'];
        $email = $_POST['email'];

        $query = "SELECT * FROM user WHERE user_email=? LIMIT 1";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('s', $email);
    
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if ($pass == $row['user_password'] && $email == $row['user_email']) {
                $stmt->close();
                session_start();
                $role = $row['user_role'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['items'] = array('Role'=>$role);
                $_SESSION['role'] = $row['user_role'];
                if ($row['user_role'] == 1)
                    header("location: ../dashboard/donator.php");
                else
                    header("location: ../dashboard/admin.php");
            } else {
                header("Location: login.php?message=Login Failed!. Try again");
            }
        } else {
            header("Location: login.php?message=Login Failed!. Try again");
        }

    }
    if (isset($_POST['reset'])) {
        $pass = $_POST['pass'];
        $email = $_POST['email'];

        $query = "SELECT * FROM user WHERE user_email = '$email'";
        $result = mysqli_query($mysqli, $query);
        if ($result) {
                $syntax = "UPDATE user SET user_password='$pass' WHERE user_email='$email'";
                $mysqli->query($syntax) or die($mysqli->error);
                header("Location: login.php?message=Password has been reset");
        }
    }

?>