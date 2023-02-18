<?php 
    require "header.php";
?>
<link rel="stylesheet" href="style.css">
    <main>
        <div class="wrapper-main">
            <div class="section-default">
                <h1>Signup</h1>
                <?php 
                    if(isset($_GET['error'])) {
                        if($_GET['error'] == 'emptyfield') {
                            echo "<p class='signuperror'> Popuni sva polja!</p>";
                        }
                         else if ($_GET['error'] == 'passwordcheck') {
                            echo "<p class='signuperror'>Password se ne poklapa</p>";
                    }
                    else if ($_GET['error'] == 'usertaken') {
                        echo "<p class='signuperror'>Ime se vec nalazi u bazi</p>";
                }
                else if ($_GET['error'] == 'invaliduid') {
                    echo "<p class='signuperror'>Ime sadrzi karaktere koji nisu prihvatljivi</p>";
            }
            else if ($_GET['error'] == 'success') {
                echo "<p class='signupsuccess'>Dobro dosli, uspjesno ste se registrovali!</p>";
            }
            }
            
            
                ?>
                <form class = "form-signup" action="includes/signup.inc.php" method="post">
                    <input type="text" name="uid" placeholder="username"> 
                    <input type="password" name="pwd" placeholder="password"> 
                    <input type="password" name="pwd-repeat" placeholder="Repeat password"> <br>
                    <button type="submit" name="signup-submit">Signup</button> 
                </form>

                <!-- ===============PASSWORD RECOVERY==============-->
                <a href="reset_password.php">Forgot your password</a>
            </div>
        </div>
       
    </main>

<?php 
    require "footer.php";
?>
