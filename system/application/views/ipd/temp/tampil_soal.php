<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>IPD STIKOM PGRI BANYUWANGI</title>
<link href="<?php echo base_url();?>system/application/views/ipd/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

function lihatObjek()
{
var data="";
document.soal.simpan.value="";
	for(i=0;i<document.soal.length;i++)
	{
		if(document.soal.elements[i].type=='radio')
		{
			if(document.soal.elements[i].checked==true)
			{
				if(data=="")
				data=document.soal.elements[i].value;
				else
				data+='|'+document.soal.elements[i].value;
			}
		}
	}
	document.soal.simpan.value=data;
}
</script>
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
<tr><td width="100">Nama</td><td width="10">:</td><td><? echo $nama;?></td></tr>
<tr><td width="100">Nim</td><td width="10">:</td><td><? echo $nim;?></td></tr>
<?
foreach($ketdosen->result_array() as $item){
echo'<tr><td width="100">Nama Dosen</td><td width="10">:</td><td>'.$item['dosen'].'</td></tr>';
echo'<tr><td width="100">Kode MK</td><td width="10">:</td><td>'.$item['kodemk'].'</td></tr>';
echo'<tr><td width="100">Mata Kuliah</td><td width="10">:</td><td>'.$item['namamk'].'</td></tr>';
}
?>
</table><br />

<table style="border:1pt solid #000000;" bgcolor="#FFFFFF" cellpadding="5">
<tr bgcolor="#FFCC33" align="center"><td width="20">No</td><td width="680">Soal Kuisioner</td></tr>
<?
$no=1;
echo"<form method='post' action='".base_url()."index.php/welcome/kirimdata' name='soal'>";
foreach($soal->result_array() as $item){
	echo"<tr class='tr'><td valign='top'>$no</td><td>".$item['soal']."</td></tr><tr>";
	foreach($jawaban->result_array() as $item2){
	if($item['id']==$item2['idsoal']){
	echo"<td class='tr'></td></td><td class='tr'>
	<input type='radio' onclick='javascript:lihatObjek();' name='pilihan-$no' value='".$item2['idsoal']."_".$item2['pilihan']."'> ".$item2['pilihan']." . ".$item2['jawaban']."</td>";
	}
	echo"</tr>";
	}
	$no++;
}
echo'<input type="hidden" value="" name="simpan"/>';
foreach($ketdosen->result_array() as $item){
echo'<input type="hidden" value="'.$nim.'" name="nim"/>';
echo'<input type="hidden" value="'.$item['nidn'].'" name="nidn"/>';
echo'<input type="hidden" value="'.$item['kodemk'].'" name="kodemk"/>';
echo'<input type="hidden" value="'.$item['dosen'].'" name="dosen"/>';
}
echo'<tr bgcolor="#FFCC33"><td width="700" colspan="2" align="center">
<input type="submit" value="Selesai dan Kirim" class="button"></td></tr>';
echo"</form>";
?>
</table>
</div>
<div id="kanan">
<h3>&#8226; Menu Navigasi &#8226; </h3>
<table style="border:1pt solid #000000;" bgcolor="#FFFFFF" width="180">
<tr>
<td>
<a href="<? echo base_url(); ?>index.php/welcome/tampildata"><div class="menu-button">Beranda</div></a>
<div class="menu-button">Ganti Password</div>
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