<?php
include_once 'dbcrud.php';
$con = new connect();

// data insert code starts here.
if(isset($_POST['btn-save']))
{
 $first_name = $_POST['first_name'];
 $last_name = $_POST['last_name'];
 $city = $_POST['city_name'];
 $con->setdata("INSERT INTO users(first_name,last_name,user_city) VALUES('$first_name','$last_name','$city')");
 header("Location: index.php");
}
// data insert code ends here.

// code for fetch user data via QueryString URL 
if(isset($_GET['edit_id']))
{
 $res=$con->getdata("SELECT * FROM users WHERE user_id=".$_GET['edit_id']);
 $row=mysql_fetch_array($res);
}
// code for fetch user data via QueryString URL 

// data update condition
if(isset($_POST['btn-update']))
{
 $con->setdata("UPDATE users SET first_name='".$_POST['first_name']."',
           last_name='".$_POST['last_name']."',
           user_city='".$_POST['city_name']."'
          WHERE user_id=".$_GET['edit_id']);
 header("Location: index.php");
}
// data update condition

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Membuat CRUD dengan PHP OOP - By Tobiweb.id</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label>Membuat CRUD dengan PHP OOP - <a href="http://tobiweb.id" target="_blank">By TobiWeb</a></label>
    </div>
</div>
<div id="body">
 <div id="content">
    <form method="post">
    <table align="center">
    <tr>
    <td align="center"><a href="index.php">Kembali Ke Halaman Awal</a></td>
    </tr>
    <tr>
    <td><input type="text" name="first_name" placeholder="Nama Depan" value="<?php if(isset($row))echo $row['first_name']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="last_name" placeholder="Nama Belakang" value="<?php if(isset($row))echo $row['last_name']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="city_name" placeholder="Asal Kota" value="<?php if(isset($row))echo $row['user_city']; ?>" required /></td>
    </tr>
    <tr>
    <td>
    <?php
 if(isset($_GET['edit_id']))
 {
  ?><button type="submit" name="btn-update"><strong>UPDATE</strong></button></td><?php
 }
 else
 {
  ?><button type="submit" name="btn-save"><strong>SAVE</strong></button></td><?php
 }
 ?>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>