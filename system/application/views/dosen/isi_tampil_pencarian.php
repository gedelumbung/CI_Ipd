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
</div>