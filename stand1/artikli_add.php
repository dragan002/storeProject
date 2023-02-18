<?php include 'includes/db.inc.php';

if(isset($_POST['submit'])) {
    $sifra = $_POST['sifra'];
    $naziv = $_POST['naziv'];
    $jedinicaMjere = $_POST['jedinicaMjere'];
    $barKod = $_POST['barkod'];
    $pluKod = $_POST['PLU_KOD'];

    $sql = "INSERT INTO `artikal` (Sifra, Naziv, JedinicaMjere, Barkod, PLU_KOD) VALUES ('$sifra', '$naziv', '$jedinicaMjere', '$barKod', '$pluKod')";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header('Location:artikli_list.php');
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
    <label for="sifra" class="form-label">Sifra</label>
    <input type="text" class="form-control" id="sifra" name="Sifra">
  </div>

  <div class="mb-3">
    <label for="naziv" class="form-label">Naziv</label>
    <input type="text" class="form-control" name = "naziv" id="naziv">
  </div>

  <div class="mb-3">
    <label for="JedinicaMjere" class="form-label">Jedinica Mjere</label>
    <input type="text" class="form-control" name = "jedinicaMjere" id="JedinicaMjere">
  </div>

  <div class="mb-3">
    <label for="Barkod" class="form-label">Bar kod</label>
    <input type="text" class="form-control" name = "barkod" id="Barkod">
  </div>

  <div class="mb-3">
    <label for="PLU_KOD" class="form-label">PLU_KOD</label>
    <input type="text" class="form-control" name = "PLU_KOD" id="PLU_KOD">
  </div>

  <button type="submit" name = "submit" class="btn btn-primary">Dodaj novi artikl</button>
  <a href="artikli_list.php">List</a>
</form>
    </div>
</body>
</html>