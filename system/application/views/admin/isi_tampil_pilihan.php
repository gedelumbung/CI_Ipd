<div id="content">
<div id="kiri">

<h3>Selamat Datang, "<?php echo $nama;?>"</h3>
<table width="100%">
<tr><td width="100">Anda Login sebagai <b><?php echo $nama;?></b>, dengan username <b><?php echo $nim; ?></b></td></tr>
</table><br />

<table style="border:1pt solid #000000;" bgcolor="#FFFFFF" cellpadding="5">
<tr bgcolor="#FFCC33" align="center"><td width="20">No</td><td width="80">Kode MK</td>
<td width="200">Dosen</td><td width="240">Mata Kuliah</td><td width="60">Semester</td>
<td width="60">SKS</td>
</tr>
<?php
$no=1;
foreach($daftar->result_array() as $item){
echo"<tr class='tr'><td>$no</td><td><a href='".base_url()."index.php/admin/tampildetail/".$item['kodemk']."/".$item['nidn']."'>".$item['kodemk']."</td>
<td><a href='".base_url()."index.php/admin/tampildetail/".$item['kodemk']."/".$item['dosen']."'>".$item['dosen']."</td>
<td><a href='".base_url()."index.php/admin/tampildetail/".$item['kodemk']."/".$item['dosen']."'>".$item['namamk']."</a></td>
<td>".$item['semester']."</td><td>".$item['sks']."</td>
</tr>";
$no++;
}
?>
</table>
</div>