<?php
require 'connection/function.php';
// cek error && jafga" error 500 (local server)
ini_set("display_errors", "1");
error_reporting(E_ALL);

//get data id 
$data = $_GET["id"];
$get  = query("SELECT * FROM foto WHERE id = $data")[0];

// var_dump($get)

?>

<!-- stile  CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- button kembali -->
<div class="container mt-4">
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail Foto</li>
  </ol>
</nav>  
</div>


<div class="container mt-5">

<div class="card mb-3 col-9  " >
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/<?= $get["image"]?>"  class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $get["nama"]?></h5>
        <p class="card-text"><?= $get["deskripsi"]?>.</p>
        <p class="card-text text-end bottom-0 position-absolute item-self-end mb-3 mt-4"><small class="text-muted">Tanggal Upload : <?= $get["tgl"]?></small></p>
      </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col-2">
    <a href="edit.php?id=<?= $get["id"]?>" type="" class="btn btn-success btn-md">Edit</a>

    <a href="hapus.php?id=<?= $get["id"]?>" type="submit" name="" class="btn btn-danger btn-md">Hapus</a>
    </div>
</div>
</div>
