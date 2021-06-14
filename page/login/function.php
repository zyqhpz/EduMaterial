<?php
    function emptyInputSignup($fname, $lname, $email, $password) {
        $result;
        if (empty($fame) || empty($lname) || empty($email) || empty($password)) {
            $result = true;
        }
        else
            $result = false;
        return $result;
    }
    function createUser($mysqli,$fname, $lname, $email, $password) {
        $syntax = "INSERT INTO user (user_firstname, user_lastname, user_email, user_password, user_role) VALUES ( '$fname', '$lname', '$email', '$password', $role);";
        
        $mysqli->query($syntax) or die($mysqli->error);
    }
?>