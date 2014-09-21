<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>IPD STIKOM PGRI BANYUWANGI</title>
<link href="<?php echo base_url();?>system/application/views/admin/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="kulit-luar">
<div id="menu-atas">
<div class="logo"><a href="index.html"><img src="<?php echo base_url();?>system/application/views/admin/image/logo.png" border="0" ></a></div>
</div>

<div id="content">
<div id="kiri">

<h3>Selamat Datang, "<? echo $nama;?>"</h3>
<table width="100%">
<tr><td width="100">Anda Login sebagai <b><? echo $nama;?></b>, dengan username <b><? echo $nim; ?></b></td></tr>
</table><br />

<table cellpadding="5">
<?php
$no=1;
foreach($detail->result_array() as $item2){
}
echo"<tr><td>Nama Dosen</td><td>:<td>".$item2['dosen']."</td></tr>";
echo"<tr><td>Nama Mata Kuliah</td><td>:</td><td>".$item2['namamk']."</td></tr>";
echo"<tr><td>Kode Mata Kuliah</td><td>:</td><td>".$item2['kodemk']."</td></tr>";
echo"<tr><td>Jumlah Audience</td><td>:</td><td>".$jumlah=$item2['A']+$item2['B']+$item2['C']+$item2['D']." orang</td></tr>";
?>
</table><br>
<table style="border:1pt solid #000000;" bgcolor="#FFFFFF" cellpadding="5">
<tr bgcolor="#FFCC33" align="center"><td width="50">No. Soal</td>
<td width="50">A</td><td width="50">B</td><td width="50">C</td>
<td width="50">D</td>
</tr>
<?php
$no=1;
foreach($detail->result_array() as $item){
echo"<tr align='center'><td>".$item['idsoal']."</td><td>".$item['A']."</td><td>".$item['B']."</td>
<td>".$item['C']."</td><td>".$item['D']."</td>
</tr>";
$no++;
}
?>
<tr><td colspan="5" class="menu-button" align="center"><a href="<?php echo base_url()?>
index.php/admin/ubahexcell/<? echo $item['kodemk']; ?>/<? echo $item['nidn']; ?>"><b>Convert ke format Excell</b></a></td></tr>
</table>

</div>
<div id="kanan">
<h3>&#8226; Menu Navigasi &#8226; </h3>
<table style="border:1pt solid #000000;" bgcolor="#FFFFFF" width="180">
<tr>
<td>
<a href="<? echo base_url(); ?>index.php/admin/tampiladmin"><div class="menu-button">Beranda</div></a>
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