<?php
include("koneksi.php");
include("functions.php");

session_start();
$button = isset($_GET["insert"])?$_GET["insert"]:false;


if(isset($_GET["cetak"])){

$npm = $_GET["mahasiswa"];
 cetak($npm);
 header("location:index.php?page=cetak");

}else if($button == "input_nilai"){
    input_nilai($_GET);
}else if($button == "input_mahasiswa"){

 if(input_mahasiswa($_GET)>0){
     header("location:index.php");
 }else{
     echo"gagal, coba periksa query atau functionsnya";
 }

}else if($button == "input_matkul"){
    input_matkul($_GET);

    if(input_matkul($_GET)>0){
        header("location:index.php");
    }else{
        echo"gagal, coba periksa query atau functionsnya";
    }
}

?>