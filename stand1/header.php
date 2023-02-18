<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<header>
    <nav>
        <a href="index.php" class = "header-logo">
            <img src="img/download.png" alt="">
        </a>
        <ul>
            <li><a href="artikli_list.php">Artikal</a></li>
            <li><a href="#">Lager</a></li>
            <li><a href="#">Racun</a></li>
            <li><a href="#">Radnik</a></li>
        </ul>
        <div>
            <?php 
                 if(isset($_SESSION['KorisnickoIme'])) {
                    echo "<form action='includes/logout.inc.php' method='post'>
                    <button type='submit' name='logout-submit'>Logout</button>
                     </form>";
                } else {
                    echo "<form action='includes/login.inc.php' method='post'>
                    <input type='text' name='uid' placeholder='Username'>
                    <input type='password' name='pwd' placeholder='Password'>
                    <button type='submit' name='login-submit' id='login'>Login</button>
                </form>
                <a href='signup.php' class='singup'>Signup</a>";
                }
            ?>
            
            
        </div>
    </nav>
</header>
</body>
</html>