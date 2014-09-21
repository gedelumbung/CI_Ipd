<div id="content">
<div id="kiri">

<h3>Selamat Datang, "<?php echo $nama;?>"</h3>
<table width="100%">
<tr><td width="100">Anda Login sebagai <b><?php echo $nama;?></b>, dengan username <b><?php echo $nim; ?></b></td></tr>
</table><br />

<table cellpadding="3">
<?php
foreach($query->result() as $item){
}
echo"<tr valign='top'><td align='left'>Nama Dosen</td><td align='center'>:</td><td>".$item->dosen."</td></tr>";
echo"<tr valign='top'><td align='left'>Nama Mata Kuliah</td><td align='center'>:</td><td>".$item->namamk."</td></tr>";
echo"<tr valign='top'><td align='left'>Kode Mata Kuliah</td><td align='center'>:</td><td>".$item->kodemk."</td></tr>";
?>
</table><br>

<table style="border:1pt solid #000000;" bgcolor="#FFFFFF" cellpadding="5">
<tr align="center" valign="middle" bgcolor="#FFCC33"><td width="50">No</td><td width="550">Komentar</td></tr>
<?php
$page=$this->uri->segment(5);
$no=$page+1;
foreach($query->result() as $item2){
echo"<tr valign='top'><td align='center'>$no</td><td>".$item2->komentar."</td></tr>";
$no++;
}
?>

<tr align="center" valign="middle"><td colspan="2"><?=$paginator; ?></tr>
</table>



</div>
