<?php 
require 'db.inc.php';

if(isset($_POST['signup-submit'])) {
$username = $_POST['uid'];
$password = $_POST['pwd'];
$passwordRepeat = $_POST['pwd-repeat'];

if(empty($username) || empty($password) || empty($passwordRepeat)) {
    header('Location: ../signup.php?error=emptyfield&uid='.$username.'&mail='.$email);
    exit();
}
else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header('Location: ../signup.php?error=invaliduid&mail='.$email);
    exit();
}
else if ($password !== $passwordRepeat) {
    header('Location: ../signup.php?error=passwordcheck&uid='.$username.'&mail'.$email);
    exit();
}
else {
    $sql = "SELECT `KorisnickoIme` FROM `korisnik` WHERE KorisnickoIme=?";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: ../signup.php?error=sqlerror');
        exit();
    } 
    else {
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck > 0) {
            header('Location: ../signup.php?error=usertaken&mail='.$email);
            exit();
        }
        else {
            $sql = "INSERT INTO `korisnik` (KorisnickoIme, Sifra) VALUES (?, ?)";

            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                header('Location: ../signup.php?error=sqlerror');
            exit();
            }
            else {
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, 'ss', $username, $hashedPwd);
                mysqli_stmt_execute($stmt);
                header('Location: ../signup.php?error=success');
                exit();
            }
        }
    }
}
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header('Location: ../signup.php');
    exit();
}
