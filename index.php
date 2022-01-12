<?php require 'connection/function.php';

// var_dump($d);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>galery </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <div class="container">
    <a class="navbar-brand" href="index.php">GALERY </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
      <div class="navbar-nav ">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="tentang.php">Tentang</a>
        
      </div>
    </div>
  </div>
</nav>

<div class="container mt-4">
    <div class="container row ">
        <a href="tambahfoto.php" class="btn btn-sm btn-primary col-1 ">Tambah Foto</a>
    </div>

        <!-- navbar -->
        <?php
                if(mysqli_num_rows($d) == 0)
                {
                    echo "<div class='container mt-2'>
            <div class='alert alert-warning' role='alert'>
            data kosong</div></div>";?>   
        <?php }else{  ?>
               
        <div class="container mt-4 ">
            <div class="row  ">
                <?php foreach($d as $s) : ?>
           
         
    
                <div class="col-2">
                <div class="card ">
                <img src="img/<?= $s["image"]?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $s["nama"]?></h5>
                    <a href="detail.php?id=<?= $s["id"]?>" class="btn btn-primary">Detail</a>
                </div>
                </div>
                </div>
            
                <?php endforeach;?>
            </div>

        </div>

<?php } ?>

</div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>