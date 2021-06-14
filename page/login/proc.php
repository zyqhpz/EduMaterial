<?php
    $mysqli = new mysqli('localhost', 'root', '', 'webapp') or die(mysqli_error($mysqli));

    if (isset($_POST['submit'])) {
        //$id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $role = 1;

        // require_once 'function.php';

        // if (emptyInputSignup($fname, $lname, $email, $password) !== false) {
        //     header("location: register.php?error=emptyinput");
        //     exit();
        // }
        // else if (emailExists($mysqli, $email) !== false) {
        //     header("location: register.php?error=emailExist");
        //     exit();
        // }
    
        // // if (createUser($mysqli,$fname, $lname, $email, $password)) {

        // // }
        // else {
//createUser($mysqli,$fname, $lname, $email, $password);
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
           $syntax = "INSERT INTO user (user_firstname, user_lastname, user_email, user_password, user_role) VALUES ( '$fname', '$lname', '$email', '$pass', $role);";
        
           $mysqli->query($syntax) or die($mysqli->error);
        
            header("location: register.php");
            exit();
    
    
        echo "<div>Success</div>";
    }

    if (isset($_POST['login'])) {

        $pass = $_POST['pass'];
        $email = $_POST['email'];

        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "SELECT * FROM user WHERE user_email='$email' AND user_password='$pass'";
            $result = $mysqli->query("SELECT * FROM user WHERE user_email='$email' AND user_password ='$pass'") or die($mysqli->error);

            //$row = mysql_fetch_array($result);

            while ($row = $result->fetch_assoc()):
                if ($row['user_password'] == $pass && $row['user_email'] == $email) {
                    echo "SUCCESS";
                    session_start();
                    $role = $row['user_role'];
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['items'] = array('Role'=>$role);
                    $_SESSION['email'] = $row['user_email'];
                    $_SESSION['role'] = $row['user_role'];
                    $_SESSION['success'] = "You now logged in.";
                    if ($row['user_role'] == 1)
                        header("location: ../dashboard/donator.php");
                    else
                        header("location: ../dashboard/admin.php");
                    
                }
                else {
                    echo "Error";
                }
                exit();
            endwhile;

            // if ($row['user_email'] == $email && $row['user_password']) {
            //     header("location: register.php");
            //     exit();
            // }
            // return "succed";

//$syntax = "INSERT INTO user (user_firstname, user_lastname, user_email, user_password, user_role) VALUES ( '$fname', '$lname', '$email', '$hashedPass', $role);";
    
    }

?>