<?php
include("koneksi.php");

$mahasiswa = mysqli_query($conn,"SELECT * FROM mahasiswa ");
$matkul = mysqli_query($conn,"SELECT * FROM matkul");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>input nilai</title>
</head>
<body>


<fieldset>
    <legend><h3>input nilai mahasiswa</h3></legend>
<form action="action.php" method="GET">
    <table>
<tr>
    <td><label for="">pilih mahasiswa</label></td>
    <td>:</td>
    <td> <select name="mhs" id="" required>
    <option value="" >pilih</option>
    <?php while($row = mysqli_fetch_assoc($mahasiswa)): ?>
    <option value="<?=$row["npm"]?>"><?=$row["nama"]." - ".$row["npm"] ?></option>
    <?php endwhile; ?>
    </select></td>
</tr>

<tr>
    <td> <label for="">pilih matakuliah</label></td>
    <td>:</td>
    <td> <select name="matkul" id="" required>
        <option value="">pilih</option>
        <?php   while($value = mysqli_fetch_assoc($matkul)): ?>
        <option value="<?=$value["kode"]?>"><?=$value["kode"]?></option>
        <?php endwhile; ?>
    </select><br></td>
</tr>

<tr>
    <td> <label for="">nilai tugas </label></td>
    <td>:</td>
    <td><input type="text" name="tugas" required></td>
</tr>

<tr>
    <td>
     <label for="">nilai uts </label></td>
     <td>:</td>
    <td> <input type="text" name="uts" required></td>
</tr>

<tr>
    <td> <label for="">nilai uas </label></td>
    <td>:</td>
    <td><input type="text" name="uas" required></td>
</tr>

<tr>
    <td></td>
    <td></td>
    <td><button name="insert" value="input_nilai">simpan</button></td>
</tr>
    </table>
   
</form>
</fieldset>
</body>
</html>


