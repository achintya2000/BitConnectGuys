<?php
if (isset($_POST['signup-submit'])) {
    require 'dbh.inc.php';
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    $labsection = $_POST['section'];
    $time = strtotime($_POST['dateFrom']);

    if (empty($time)) {
        header("Location: ../../../TAlogin.php?error=emptydateTime=");
        exit();
    }

    if (empty($labsection)) {
        header("Location: ../../../TAlogin.php?error=emptylabsection=");
        exit();
    }

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
        header("Location: ../../../TAlogin.php?error=emptyfields&uid=".$username."&mail".$email);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match("/^[a-zA-z0-9]*$/", $username)) {
        header("Location: ../../../TAlogin.php?error=invalidmailuid");
        exit();
    }

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../../../TAlogin.php?error=invalidmail&uid=".$username);
        exit();
    }

    else if (!preg_match("/^[a-zA-z0-9]*$/", $username)) {
        header("Location: ../../../TAlogin.php?error=invaliduild&mail=".$email);
        exit();
    }

    else if ($password !== $passwordRepeat) {
        header("Location: ../../../TAlogin.php?error=passwordcheck&uid");
        exit();
    }

    else {
        $sql = "SELECT uidUsers FROM ta_users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../../../TAlogin.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../../../TAlogin.php?error=userTaken");
                exit();
            }
            else {
                $sql = "INSERT INTO ta_users (uidUsers, emailUsers, pwdUsers, labSection) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn); 
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../../../TAlogin.php?error=sqlerror");
                    exit();
                }
                else {

                    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $hashedpwd, $labsection);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../../../TAlogin.php?signup=success");
                    exit();

                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: ../../../TAlogin.php");
    exit();
}