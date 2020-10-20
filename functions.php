<?php
include("koneksi.php");

function input_matkul($data){

    global $conn;

    $matkul = $data["matkul"];
    $kode = $data["kode"];
    $sks = $data["sks"];

    $query = mysqli_query($conn,"SELECT * FROM matkul WHERE kode = '$kode' ");

    if(mysqli_num_rows($query)>0){
        header("location:index.php?gagal");
    }else{
        mysqli_query($conn,"INSERT INTO matkul VALUE('','$matkul','$kode','$sks')");
        return mysqli_affected_rows($conn);
    }

}


function cetak($npm){

    global $conn;

   $query = mysqli_query($conn,"SELECT * FROM mahasiswa WHERE npm = '$npm' ");

   $row = mysqli_fetch_assoc($query);

   $mahasiswa["$npm"] = ["nama"=>"$row[nama]",
                      "npm"=>"$row[npm]",
                     ];
   return $_SESSION['mahasiswa'] = $mahasiswa;
}




function input_mahasiswa($data){

     global $conn;

     $nama = $data['nama'];
     $npm = $data['npm'];
     $kelas = $data['kelas'];

     $cek = mysqli_query($conn,"SELECT * FROM mahasiswa WHERE npm = '$npm' ");
    
    if(mysqli_num_rows($cek)>0){
        header("location:index.php?page=cetak&notif=mahasiswa");
    }else{
    mysqli_query($conn,"INSERT INTO mahasiswa VALUES('','$nama','$npm','$kelas')");
    return mysqli_affected_rows($conn);
    }

   
}


function input_nilai($nilai){
    global $conn;

    $tugas = $nilai["tugas"];
    $uts = $nilai["uts"];
    $uas = $nilai["uas"];
    $npm = $nilai["mhs"];
    $kode = $nilai["matkul"];

    $akhir = (($tugas * 30 / 100) + ($uas * 40 / 100) + ($uts * 30 / 100));

    $query = mysqli_query($conn,"SELECT * FROM nilai WHERE npm='$npm' AND kode='$kode' ");
    
    
            if($akhir >=85 & $akhir <=100){
                $bobot = 4.00;
                $grade = "A";
            }elseif($akhir >=80 & $akhir <=85){
                $bobot = 3.70;
                $grade = "A-";
            }elseif($akhir >=75 & $akhir <=80){
                $bobot = 3.30;
                $grade = "B+";
            }elseif($akhir >=70 & $akhir <=75){
                $bobot = 3.00;
                $grade = "B";
            }elseif($akhir >=65 & $akhir <=70){
                $bobot = 2.70;
                $grade = "B-";
            }elseif($akhir >=60 & $akhir <=65){
                $bobot = 2.00;
                $grade = "C";
            }elseif($akhir >=45 & $akhir <=60){
                $bobot = 1.00;
                $grade = "D";
            }elseif($akhir >=0 & $akhir <=45){
                $bobot = 0.00;
                $grade = "E";
            }

            $b_sks = mysqli_query($conn,"SELECT * FROM matkul WHERE kode='$kode' ");

            $sks = mysqli_fetch_assoc($b_sks);
            $sks = (int)$sks["sks"];

            $bobot_sks = $bobot * $sks;
            if(mysqli_num_rows($query)>0){
                header("location:index.php?page=cetak&notif=gagal");
            }else{
                  mysqli_query($conn,"INSERT INTO nilai  
                  VALUES('','$tugas','$uts','$uas','$akhir','$grade','$bobot','$npm','$kode','$bobot_sks')");
                 

                  if(mysqli_affected_rows($conn)>0){
                    header("location:index.php");
                  }else{
                      echo"gagal";
                  }

}

}


?>

