<div id="content">
<div id="kiri">

<h3>Selamat Datang, "<?php echo $nama;?>"</h3>
<table width="100%">
<tr><td width="100">Anda Login sebagai <b><?php echo $nama;?></b>, dengan username <b><?php echo $nim; ?></b></td></tr>
</table><br />

<form method="post" action="<?php echo base_url(); ?>index.php/dosen/hasilpencarian">
<table style="border:1pt solid #000000;" bgcolor="#FFFFFF" cellpadding="5">
<tr bgcolor="#FFCC33" align="center">
<td>Masukkan NIM :</td>
<td><input type="text" size="60" name="pencarian" class="texfield"/></td>
<td><input type="submit" value="Cari Mahsiswa" class="button"/></td>
</tr>
</table>
</form>
<br /><br />
<?php
if($hit_mk<2){
echo"Data Mahasiswa Tidak ditemukan";
}
else{
?>
<table style="border:1pt solid #000000;" bgcolor="#FFFFFF" cellpadding="5" width="680">
<tr bgcolor="#FFCC33" align="center">
<td width="70">NIM</td>
<td width="200">Nama</td>
<td>Angkatan</td>
<td>Jurusan</td>
<td>Program</td>
<td>Status Pengisian IPD</td>
</tr>
<?php
foreach($biodata->result_array() as $bio)
{
$hos=base_url();
$status='Belum <img src='.$hos.'system/application/views/dosen/image/not.png>';
if($hit_mk==$hit_vote)
{
$status='Sudah <img src='.$hos.'system/application/views/dosen/image/ok.png>';
}
echo"<tr class='tr'>
<td>".$bio['nim']."</td>
<td>".$bio['nama']."</td>
<td>".$bio['angkatan']."</td>
<td>".$bio['jurusan']."</td>
<td>".$bio['program']."</td>
<td><b>".$status."</b></td>
</tr>";
}
?>
</table>
<?php
}
?>
</div>