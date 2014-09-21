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
<div class="logo"><a href="index.html"><img src="<?php echo base_url();?>system/application/views/admin/image/logo.png" border="0" /></a></div>
</div>

<div id="isi-tengah">
<h3>Selamat Datang di Sistem IPD STIKOM PGRI BANYUWANGI</h3>
<form method="post" action="<?php echo base_url().'index.php/admin/login'; ?>">
<table>
<tr><td rowspan="3"><img src="<?php echo base_url();?>system/application/views/admin/image/login-icon.png"/></td><td width="80">Username</td><td width="10">:</td><td width="200"><input name="username" type="text" size="30" class="texfield"/></td>
<tr><td width="80">Password</td><td width="10">:</td><td width="200"><input name="pwd" type="password" size="30" class="texfield"/>
<tr><td width="80"></td><td width="10"></td><td width="200"><input type="reset" value="Hapus" class="button" />&nbsp;<input type="submit" value="Login" class="button" /></td></td>
</tr>
</table>
</form>
</div>

<div id="menu-bawah">
<div class="copyright">Copyright &copy; IPD STIKOM PGRI BANYUWANGI 2010</div>
</div>
</div>
</body>
</html>
