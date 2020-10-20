<?php  
include("koneksi.php");

$page = isset($_GET['page'])?$_GET['page']:false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>akademik</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
<div class="header">
<ul>
<li>
     <a href="index.php?page=mahasiswa">+input mahasiswa</a></li>
    <li> <a href="index.php?page=nilai">+input nilai</a></li>
    <li> <a href="index.php?page=matkul">+input matkul</a></li>
</ul>
</div>
<fieldset>
    <legend><h3>Nilai akademik</h3></legend>
    <?php $mahasiswa = mysqli_query($conn,"SELECT * FROM mahasiswa"); 
    ?>
    <form action="action.php" method="get">
    <label for="">pilih mahasiswa</label>
    <select name="mahasiswa" id="" required>
    <option value="">pilih</option>
    <?php while($row = mysqli_fetch_assoc($mahasiswa)): ?>
    <option value="<?= $row["npm"] ?>"><?= $row["nama"]." - ".$row["npm"]?></option>
    <?php  endwhile; ?>
    </select>
    <button type="submit" name="cetak">tampil</button>
    </form>
    <br>

    </fieldset>

   

<div class="content">

<?php  $file_name = "$page.php";

if(file_exists($file_name)){
    include($file_name);
}

?>

</div>


<footer> &copy;Copyright N763</footer>

</div>


</body>
</html>