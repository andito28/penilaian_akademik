<?php
include("koneksi.php");
session_start();
$mhs = isset($_SESSION["mahasiswa"])?$_SESSION["mahasiswa"]:false;
$no=1;
$npm = "";
$sks=0;
$l_sks =0;
$t_sks = 0;
$ip=0;
$ipk=0;

$notif = isset($_GET["notif"])?$_GET["notif"]:false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hasil study mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<?php  if($notif == "gagal"){
    echo"<div class='notif'>data sudah ada</div> ";
}else if($notif == "mahasiswa"){
    echo"<div class='notif'>mahasiswa sudah ada</div> ";
}
?>

<?php if($mhs): ?>
    <div class="cetak">
    <fieldset>
    <legend><h3> <h3>hasil study mahasiswa</h3></legend>
    <?php foreach($mhs as $key => $value): ?>
    <?php $npm = $key  ?>
       <label for=""><b>Nama : <?=$value["nama"]?></b></label> <br>  
       <label for=""><b>Npm :<?=$value["npm"]?> </b> </label>      
    <?php  endforeach; ?>

    <?php  $nilai = mysqli_query($conn,"SELECT matkul.*,nilai.* FROM matkul JOIN nilai ON matkul.kode = nilai.kode WHERE nilai.npm = '$npm' "); 
    ?>
       
  
    <table border="1" cellspacing="0" cellpadding="5">
            <tr>
                <th>no</th>
                <th>kode</th>
                <th>sks</th>
                <th>mata kuliah</th>
                <th>tugas</th>
                <th>uts</th>
                <th>uas</th>
                <th>akhir</th>
                <th>grade</th>
                <th>bobot</th>
                <th>bobot SKS</th>
            </tr>

    

     <?php while($nl = mysqli_fetch_assoc($nilai)): ?>

        <?php 
            $n_tugas = $nl["tugas"];
            $n_uas  = $nl["uas"];
            $n_uts = $nl["uts"];
            $grade = $nl["grade"];
            $bobot = $nl["bobot_nilai"];
            $bobot_sks = $nl["bobot_sks"];
            $n_akhir = (($n_tugas *30 /100) + ($n_uas *40 /100)+ ($n_uts * 30 / 100));
          
            $sks += $nl["sks"];

            if($grade == "A" || $grade == "A-" || $grade == "B+" 
             || $grade == "B"  || $grade == "B-"  || $grade == "C" ){
                $l_sks += $nl["sks"];
            }elseif($grade == "D" || $grade == "E" ){
                $t_sks += $nl["sks"];
            }
          
            $ip +=$bobot_sks ;
            $ipk = $ip / $sks;
        
            
            
        ?>
      <tr>
        <td><?=$no?></td>
        <td><?=$nl["kode"]?></td>
        <td><?=$nl["sks"] ?></td>
        <td><?=$nl["mata_kuliah"]?></td>
        <td><?=$n_tugas?></td>
        <td><?=$n_uts?></td>
        <td><?=$n_uas?></td>
        <td><?=$n_akhir?></td>
        <td><?=$grade?></td>
        <td><?=$bobot?></td>
        <td><?=$bobot_sks?></td>
      </tr>   
      <?php $no++ ?>
     <?php endwhile; ?>
       
    </table>
    
    <label> SKS ambil : <?=$sks ?></label><br>
    <label>SKS lulus : <?=$l_sks ?></label><br>
    <label>SKS tidak lulus : <?=$t_sks ?></label><br>
    <label>Index prestasi : <?=number_format($ipk,2) ?></label><br>
    <?php endif; ?>
    <br>
    <form action="cetak.php">
    <button type="submit" name="print">cetak</button>
    </form>
    </div>

    <?php if(isset($_GET['print'])): ?>
    <script>
        window.print();
    </script>
    <?php endif; ?>
    </fieldset>
</body>
</html>