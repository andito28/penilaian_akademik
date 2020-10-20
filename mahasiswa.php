
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>input nilai</title>
</head>
<body>


<fieldset>
    <legend><h3>input mahasiswa</h3></legend>
<form action="action.php">
    <table>
<tr>
    <td> <label for="">nama </label></td>
    <td>:</td>
    <td><input type="text" name="nama" required></td>
</tr>

<tr>
  
    <td><label for="">npm </label></td>
    <td>:</td>
    <td> <input type="text" name="npm" required></td>
</tr>

<tr>
    <td> <label for="">kelas </label></td>
    <td>:</td>
    <td><input type="text" name="kelas" required></td>
</tr>

<tr>
    <td></td>
    <td></td>
    <td><button name="insert" value="input_mahasiswa">simpan</button></td>
</tr>
    </table>
   
</form>
</fieldset>
</body>
</html>