<div id="content">
<div id="kiri">

<h3>Selamat Datang, "<?php echo $nama;?>"</h3>
<table>
<tr><td width="70">Nama</td><td width="10">:</td><td><?php echo $nama;?></td></tr>
<tr><td width="70">Nim</td><td width="10">:</td><td><?php echo $nim;?></td></tr>
</table><br />

<form method="post" action="<?php echo base_url(); ?>index.php/welcome/updatepassword">
<table cellspacing="5">
<tr><td width="100">Username</td><td width="10">:</td><td><input type="text" name="username" readonly="readonly" value="<?php echo $nim; ?>" class="texfield"></td></tr>
<tr><td width="100">Password Lama</td><td width="10">:</td><td><input type="password" name="pwd_lama" class="texfield"></td></tr>
<tr><td width="100">Password Baru</td><td width="10">:</td><td><input type="password" name="pwd" class="texfield"></td></tr>
<tr><td></td><td></td><td><input type="submit" value="Ganti Password" class="button"></td></tr>
</table></form><br />


</div>
