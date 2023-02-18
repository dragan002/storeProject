<?php 
include 'includes/db.inc.php';

$id = $_GET['izmijeniid'];
$sql = "SELECT * FROM `artikal` WHERE ArtikalId = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$sifra = $row['Sifra'];
$naziv = $row['Naziv'];
$jedinicaMjere = $row['JedinicaMjere'];
$barKod = $row['Barkod'];
$pluKod = $row['PLU_KOD'];

if(isset($_POST['submit'])) {
    $sifra = $_POST['Sifra'];
    $naziv = $_POST['naziv'];
    $jedinicaMjere = $_POST['jedinicaMjere'];
    $barKod = $_POST['Barkod'];
    $pluKod = $_POST['PluKod'];

    $sql = "UPDATE `artikal` SET naziv = ?, Sifra = ?, JedinicaMjere = ?, Barkod = ?, PLU_KOD = ? WHERE ArtikalId = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssiii", $naziv, $sifra, $jedinicaMjere, $barKod, $pluKod, $id);
    $result = mysqli_stmt_execute($stmt);
    if($result) {
        header('Location:artikli_list.php');
    } else {
        die(mysqli_error($conn));
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Add</title>
</head>
<body>
    <div class="container">
    <form method="post">
  <div class="mb-3">
    <label for="Sifra" class="form-label">Sifra</label>
    <input type="text" class="form-control" id="Sifra" name="Sifra" value = <?php echo $sifra; ?>>
  </div>

  <div class="mb-3">
    <label for="Naziv" class="form-label">Naziv</label>
    <input type="text" class="form-control" name = "naziv" id="Naziv" value = <?php echo $naziv; ?>>
  </div>

  <div class="mb-3">
    <label for="jedinicaMjere" class="form-label">Jedinica mjere</label>
    <input type="text" class="form-control" name = "jedinicaMjere" id="jedinicaMjere" value = <?php echo $jedinicaMjere; ?>>
  </div>

  <div class="mb-3">
    <label for="barkod" class="form-label">Bar Kod</label>
    <input type="text" class="form-control" name = "Barkod" id="barkod" value = <?php echo $barKod; ?>>
  </div>

  <div class="mb-3">
    <label for="PluKod" class="form-label">PluKod</label>
    <input type="text" class="form-control" name = "PluKod" id="PluKod" value = <?php echo $pluKod; ?>>
  </div>

  <button type="submit" name = "submit" class="btn btn-primary">Izmijeni</button>
</form>
    </div>
</body>
</html>