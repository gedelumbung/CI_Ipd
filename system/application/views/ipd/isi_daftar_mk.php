<div id="content">
<div id="kiri">

<h3>Selamat Datang, "<?php echo $nama;?>"</h3>
<table>
<tr><td width="70">Nama</td><td width="10">:</td><td><?php echo $nama;?></td></tr>
<tr><td width="70">Nim</td><td width="10">:</td><td><?php echo $nim;?></td></tr>
</table><br />

<table style="border:1pt solid #000000;" bgcolor="#FFFFFF" cellpadding="5">
<tr bgcolor="#FFCC33" align="center"><td width="20">No</td><td width="80">NIDN</td><td width="130">Nama</td><td width="240">Mata Kuliah</td><td width="80">Kode Matkul</td><td width="80">Status</td></tr>
<?php
$no=1;
foreach($daftar->result_array() as $item){
$status="Belum";
foreach($cek->result_array() as $itemcek){
	if($itemcek['kodemk']==$item['kodemk']){
		$status="Sudah";
	}
}
echo"<tr class='tr'><td>$no</td><td>".$item['nidn']."</td><td><a href=\"". base_url()."index.php/welcome/tampilsoal/".$item['nidn']."/".$item['kodemk']."\">".$item['Dosen']."</a></td><td>".$item['namamk']."</td><td>".$item['kodemk']."</td><td>".$status."</td></tr>";
$no++;
}
?>
</table>
</div>