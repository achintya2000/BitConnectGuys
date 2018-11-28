<?php
if (isset($_POST['login-submit'])) {
    
    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid)||empty($password)) {
        header("Location: ../../../TAlogin.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM ta_users WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../../../TAlogin.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdcheck = password_verify($password, $row['pwdUsers']);
                if ($pwdcheck == false) {
                    header("Location: ../../../TAlogin.php?error=wrongpwd");
                    exit();
                }
                else if ($pwdcheck == true) {
                    session_start();
                    $_SESSION['userID'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];
                    $_SESSION['userEmail'] = $row['emailUsers'];
                    $_SESSION['lSection'] = $row['labSection'];
                    $_SESSION['string'] = $row['userAvail'];

                    header("Location: ../../../TAhome.php?login=success");
                    exit();
                } 
                else {
                    header("Location: ../../../TAlogin.php?error=wrongpwd");
                    exit();
                }
            } else {
                header("Location: ../../../TAlogin.php?error=nouser");
                exit();
            }
        }
    }

}
else {
    header("Location: ../../../TAlogin.php");
    exit();
}