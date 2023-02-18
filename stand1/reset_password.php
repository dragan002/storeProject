<?php 
    require "header.php";
?>
<link rel="stylesheet" href="style.css">
    <main>
        <div class="wrapper-main">
            <div class="section-default">
                <h1>Reset your password</h1>
                <p>An email will be send to you with  instructions on how to reset your password</p>
                <form action="includes/reset-request.inc.php" method = "post">
                    <input type="text" name="email" placeholder="Enter your email adress...">
                    <button type="button" name="reset-request-submit">Receive new password by email</button>
                </form>
            </div>
        </div>
       
    </main>

<?php 
    require "footer.php";
?>
