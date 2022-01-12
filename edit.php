<?php
//hubungkan ke function
require 'connection/function.php';
// cek error && jaga" error 500 (local server)
    ini_set("display_errors", "1");
    error_reporting(E_ALL);


//find id
$id = $_GET["id"]; 
$get  = query("SELECT * FROM foto WHERE id = $id")[0];

// action submit form
    if(isset($_POST["submit"])){
    //dump data post
     if(ubah($_POST) > 0){
         echo "<script>
         alert('data berhasil ditambahkan!');
         document.location.href = 'index.php'
     </script>";
     }else{
         echo "<script>
         alert('data gagal ditambahkan!');
         document.location.href = 'edit.php'
     </script>";
     }

        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Foto</li>
  </ol>
</nav>

    </div>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-5">
                <div class="card p-5">
                            <h4 class="mb-4">Ubah Foto</h4>
                            <form method="post" enctype="multipart/form-data">
                                <img src="img/<?= $get["image"]?>" alt="<?= $get["nama"]?> " style="max-width: 400px;">
                   
                                <input type="hidden" name="gambarsebelumnya" value="<?= $get["image"]?>">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="hidden" name="id" value="<?= $get["id"]?>" >
                                    <input type="text" class="form-control" id="nama"  name="nama" value="<?= $get["nama"]?>" >
                                   
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image"  name="image" aria-describedby="emailHelp" value="<?= $get["image"]?>">
                                   
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <input type="text" class="form-control" id="deskripsi"  name="deskripsi" aria-describedby="emailHelp" value="<?= $get["deskripsi"]?>">
                                   
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal"  id="tanggal" value="<?= $get["tgl"]?>">
                                </div>
        
                                <button type="submit" name="submit" class="btn btn-primary">Ubah Foto</button>
                            </form> 
                        </div>
            </div>
        </div>
       
    </div>

</body>
</html>