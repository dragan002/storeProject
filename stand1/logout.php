<?php 
setcookie('username', NULL, time() - 1);
header('Location:index.php');