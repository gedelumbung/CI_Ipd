<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>IPD STIKOM PGRI BANYUWANGI</title>
<link href="<?php echo base_url();?>system/application/views/ipd/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="kulit-luar">
<div id="menu-atas">
<div class="logo"><a href="index.html"><img src="<?php echo base_url();?>system/application/views/ipd/image/logo.png" border="0" ></a></div>
</div>

<div id="content">
<div id="kiri">

<h3>Selamat Datang, "<? echo $nama;?>"</h3>
<table>
<tr><td width="70">Nama</td><td width="10">:</td><td><? echo $nama;?></td></tr>
<tr><td width="70">Nim</td><td width="10">:</td><td><? echo $nim;?></td></tr>
</table><br />

<form method="post" action="<? echo base_url(); ?>index.php/welcome/updatepassword">
<table cellspacing="5">
<tr><td width="100">Username</td><td width="10">:</td><td><input type="text" name="username" readonly="readonly" value="<? echo $nim; ?>" class="texfield"></td></tr>
<tr><td width="100">Password</td><td width="10">:</td><td><input type="password" name="pwd" class="texfield"></td></tr>
<tr><td></td><td></td><td><input type="submit" value="Ganti Password" class="button"></td></tr>
</table></form><br />


</div>
<div id="kanan">
<h3>&#8226; Menu Navigasi &#8226; </h3>
<table style="border:1pt solid #000000;" bgcolor="#FFFFFF" width="180">
<tr>
<td>
<a href="<? echo base_url(); ?>index.php/welcome/tampildata"><div class="menu-button">Beranda</div></a>
<a href="<? echo base_url(); ?>index.php/welcome/gantipassword"><div class="menu-button">Ganti Password</div></a>
<a href="<? echo base_url(); ?>index.php/welcome/logout"><div class="menu-button">Keluar</div></a>
</td>
</tr>
</table>
<h3>&#8226; Link Terkait &#8226; </h3>
<table style="border:1pt solid #000000;" bgcolor="#FFFFFF" width="180">
<tr>
<td>
<div class="menu-button">STIKOM Banyuwangi</div>
<div class="menu-button">E-Learning</div>
<div class="menu-button">KRS Online</div>
<div class="menu-button">UKM Kamera</div>
<div class="menu-button">UKM Kloso</div>
</td>
</tr>
</table>
</div>
</div>

<div id="menu-bawah">
<div class="copyright">Copyright &copy; IPD STIKOM PGRI BANYUWANGI 2010</div>
</div>
</div>
</body>
</html>