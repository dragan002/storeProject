<?php 
    require "header.php";
?>
<link rel="stylesheet" href="style.css">
    <main>
        <div class="wrapper-main">
            <div class="section-default">
                <?php 
                    if(isset($_SESSION['userId'])) {
                        echo "<p class='login-status'>You are logged in!</p>";
                    } else {
                        echo "<p class='login-status'>You are logged out!</p>";
                    }
                ?>
            </div>
        </div>
       
    </main>

<?php 
    require "footer.php";
?>