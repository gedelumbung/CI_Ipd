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

function CekPesan(txt) {
	var input = txt.value;
	var benar = false;
	if(input!='')
		benar=true;
	if(benar) {
  		document.soal.masuk.disabled=false;
  	} else {
  		alert("Komentar masih Kosong");
  		document.soal.masuk.disabled=true;
  	}
}

function textCounter(field, countfield, maxlimit) {
	if (field.value.length > maxlimit) {
		field.value = field.value.substring(0, maxlimit);
	} 
	else {
	countfield.value = maxlimit - field.value.length;
	}
}

function dissabledButton() {
	document.soal.masuk.disabled=true;
}
window.onload = dissabledButton;
</script>
<?php
foreach($ketdosen->result_array() as $item){
$nidn=$item['nidn'];
$kodemk=$item['kodemk'];

if($nidn=="" AND $kodemk=""){
echo"error";
}
else{
?>
<div id="content">
<div id="kiri">

<h3>Selamat Datang, "<?php echo $nama;?>"</h3>
<table>
<tr><td width="100">Nama</td><td width="10">:</td><td><?php echo $nama;?></td></tr>
<tr><td width="100">Nim</td><td width="10">:</td><td><?php echo $nim;?></td></tr>
<?php
foreach($ketdosen->result_array() as $item){
echo'<tr><td width="100">Nama Dosen</td><td width="10">:</td><td>'.$item['dosen'].'</td></tr>';
echo'<tr><td width="100">Kode MK</td><td width="10">:</td><td>'.$item['kodemk'].'</td></tr>';
echo'<tr><td width="100">Mata Kuliah</td><td width="10">:</td><td>'.$item['namamk'].'</td></tr>';
}
?>
</table><br />

<table style="border:1pt solid #000000;" bgcolor="#FFFFFF" cellpadding="5">
<tr bgcolor="#FFCC33" align="center"><td width="20">No</td><td width="680">Soal Kuisioner</td></tr>
<?php
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
echo"<tr><td></td><td><br>Berikan komentar untuk dosen <b>".$item['dosen']."</b> :
<textarea cols=75 rows=5 class='textarea' name='komentar' onchange="; ?>"javascript:CekPesan(this);" 
onKeyDown="textCounter(document.soal. komentar,document.soal.inputcount,2000);" 
onKeyUp="textCounter(document.soal.komentar, document.soal.inputcount,2000);" onblur="javascript:CekPesan(this);" 
<?php echo"></textarea><br>
<input readonly type='text' name='inputcount' size='5' maxlength='4' value='' class='texfield'>
</td><br></tr>";

?>
<script language="JavaScript">
        document.soal.inputcount.value = (2000 - document.soal.komentar.value.length);
          </script>

<?php

}

echo'<tr bgcolor="#FFCC33"><td width="700" colspan="2" align="center">
<input type="submit" value="Selesai dan Kirim" class="button" name="masuk"></td></tr>';
echo"</form>";
?>
</table>
</div>
<?php
}
}
?>