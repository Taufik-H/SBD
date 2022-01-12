<?php
// coneksi database
$conn = mysqli_connect("localhost", "root","","galery-web");

//read data
$d = mysqli_query($conn, "SELECT * FROM foto");


//convert data to array
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
 }
 return $rows;
}

// function tambag data
function tambah($data){
    global $conn;

   //ambil data dari request name
   $nama = $data["nama"];
   $deskripsi = $data["deskripsi"];
   $tanggl = $data["tanggal"];

   $image = upload();
   if(!$image){
       return false;
   }

    //query INPUT
    $query_input = "INSERT INTO foto VALUES( DEFAULT,'$nama','$image','$deskripsi','$tanggl')";
    mysqli_query($conn,$query_input);

    return mysqli_affected_rows($conn);

}


function upload(){
    $namaImage  = $_FILES['image']['name'];
    $size       = $_FILES['image']['size'];
    $error      = $_FILES['image']['error'];
    $location   = $_FILES['image']['tmp_name'];
    
    //cek gambar apakah sudah di upload
    // error 4 itu hasil dari dump error saya 
    //jika tidak ada file yang di input maka error bernilai 4
    if($error === 4){
        echo "<script>
        alert('data gagal ditambahkan!');
    </script>";
    return false;
    }

    //cek gambar valid
    $ekstensiArr = ['jpg','png','jpeg'];
    $ekstensi = explode('.',$namaImage);
    $ekstensi =strtolower(end($ekstensi));
    
    //cek apakah ada file dengan format yang ada di array
    if(!in_array($ekstensi,$ekstensiArr)){
        echo "<script>
        alert('File ini bukan gambar!');
    </script>";
    return false;
    }
    //generate nama file baru
    $newname = uniqid();
    $newname .= '.';
    $newname .= $ekstensi;


    //upload dan pindah file ke direktori img

    move_uploaded_file($location, 'img/'. $newname);
    return $newname;
}




// hapus data
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM foto WHERE id = $id");
    return mysqli_affected_rows($conn);
}


//ubah data
function ubah($data){
    global $conn;

    //ambil data dari request name
    $id_foto =$data["id"];
    $nama = $data["nama"];
    $deskripsi = $data["deskripsi"];
    $tanggl = $data["tanggal"];
    $gambarsebelumnya = $data["gambarsebelumnya"];

    if($_FILES['image']['error'] === 4){
        $image = $gambarsebelumnya;
    }else{
        $image = upload();
    }
 
 
     //query INPUT
     $query_update = "UPDATE  foto SET
                        nama = '$nama',
                        image = '$image',
                        deskripsi = '$deskripsi',
                        tgl = '$tanggl'
                        WHERE id = $id_foto 
                        ";
     
    
     mysqli_query($conn, $query_update);
 
     return mysqli_affected_rows($conn);
}





?>