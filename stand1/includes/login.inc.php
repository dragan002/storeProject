<?php
require 'db.inc.php';
if(isset($_POST['login-submit'])) 
{
    $username = $_POST['uid'];
    $password = $_POST['pwd'];

    if(empty($username) || empty($password)) {
        header('Location: ../index.php?error=emptyfields');
        exit();
    }
    else {
        // $sql = "SELECT * FROM `users` WHERE uidUsers=? OR emailUsers=?;";
        $sql = "SELECT * FROM `korisnik` WHERE `KorisnickoIme`=?;";
        // $sql = "SELECT `KorisnickoIme` FROM `korisnik` WHERE KorisnickoIme=?";
        $stmt = mysqli_stmt_init($conn);
        $userTypeResult = mysqli_query($conn, $sql);
        if(!mysqli_stmt_prepare($stmt,$sql)) {
            header('Location: ../index.php?=sqlerror');
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['Sifra']);
                if($pwdCheck == false) {
                    header('Location: ../index.php?error=wrongpassword');
                    exit();
                } else if ($pwdCheck == true) {
                    session_start();
                    // $_SESSION['userId'] = $row['idUser'];
                    // $_SESSION['userUid'] = $row['uidUsers'];

                    // exit();
                      if($row['korisnikTip'] == "korisnik") {
                        echo "korisnik";
                    } elseif($row['korisnikTip'] == "admin") {
                        header('Location: ../artikli_list.php');
                    }
                }
                else {
                    header('Location: ../index.php?error=wrongpwd');
                    exit();
                }
            }
            else {
                header('Location: ../index.php?error=nouser');
                exit();
            }
        }
    }
} 
else {
    header('Location: ../index.php');
    exit();
}