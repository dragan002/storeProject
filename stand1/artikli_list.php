<?php 
    include 'includes/db.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    

    <title>Artikli list</title>
</head>
<body>
    
<div class="container">
    <button class="btn btn-primary my-5"><a href="artikli_add.php" class="text-light">Dodaj novi artikal</a></button>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Sifra</th>
      <th scope="col">Naziv</th>
      <th scope="col">Jedinica mjere</th>
      <th scope="col">Bar kod</th>
      <th scope="col">PLU KOD</th>
      <th scope="col">Operacije</th>
    </tr>
  </thead>
  <tbody>

  <?php 
    $sql = "SELECT * FROM `artikal`";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['ArtikalId'];
            $sifra = $row['Sifra'];
            $naziv = $row['Naziv'];
            $jedinicaMjere = $row['JedinicaMjere'];
            $barKod = $row['Barkod'];
            $pluKod = $row['PLU_KOD'];

            echo ' <tr>
            <th scope="row">'.$id.'</th>
            <td>'.$sifra.'</td>
            <td>'.$naziv.'</td>
            <td>'.$jedinicaMjere.'</td>
            <td>'.$barKod.'</td>
            <td>'.$pluKod.'</td>
            <td>
            <button class="btn btn-danger"><a href="artikli_delete.php?obrisiid='.$id.'" class="text-light">Obrisi</a></button>
            <button class="btn btn-primary"><a href="artikli_edit.php?izmijeniid='.$id.'" class="text-light">Izmijeni</a></button>
            </td>
          </tr>';
          
        }
    }
  
  ?>
 <button class="btn btn-primary my-5"><a href="logout.php" class="text-light">Odjavi se</a></button>

  </tbody>
</table>
</form>
</div>


</body>
</html>