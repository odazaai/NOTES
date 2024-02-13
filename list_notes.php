<?php
require_once("database.php");
$tampil = kuery("Select * from notes");
// var_dump($tampil);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Notes</title>
  </head>
  <body>
  <?php
    session_start();
    if($_SESSION['status']!='login'){
      header("location:login.php?msg=belum_login");
    }
    ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">NOTES</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Notes</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">API</a>
        </li>
      </ul>
      <a href="logout.php" class="btn btn-outline-info border-blue">Log Out</a>
    </div>
  </div>
</nav>

<div class="container">
    <br>
    <h1>My Notes</h1>
    <br>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">ID</th>
      <th scope="col">NOTE</th>
      <th scope="col">Tanggal</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
      <?php 
        $no =1;
      foreach($tampil as $data): ?>
    <tr>
      <th scope="row"><?php echo $no; ?></th>
      <td><?php echo"$data[id]";?></td>
      <td><?php echo"$data[notes]";?></td>
      <td><?php echo"$data[created_at]";?></td>
      <td><?php echo"<a href='edit.php?id=$data[id]'>Edit</a> |
          <a href='javascript:hapusData(".$data['id'].")''>Hapus</a>"; ?> </td> 
    </tr>
    <?php 
    $no++;
    endforeach; ?>
  </tbody>
</table>

<br><br>
<a href="notes.php" class="btn btn-info" role="button">New Notes</a>

    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script language="JavaScript" type="text/javascript">
      function hapusData(id){
        if(confirm("Apakah anda yakin akan menghapus data ini?")){
          window.location.href = 'delete.php?id=' + id;
        }
      }
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>