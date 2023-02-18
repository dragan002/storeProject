<?php 
include 'includes/db.inc.php';

if(isset($_GET['obrisiid'])) {
    $id = $_GET['obrisiid'];

    $sql = "DELETE FROM `artikal` WHERE ArtikalId=$id";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header('Location:artikli_list.php');
    } else {
        die (mysqli_error($conn));
    }
}
?>