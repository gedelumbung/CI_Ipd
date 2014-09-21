<?php
class Ipd_model_dosen extends Model
	{
		function Ipd_model_dosen()
		{
			parent::Model();
		}
		
		function Login_Dosen($user,$pass)
		{
			$user_bersih=mysql_real_escape_string($user);
			$pass_bersih=mysql_real_escape_string($pass);
			$query=$this->db->query("select * from tbllogin where username='$user_bersih' and psw=PASSWORD('$pass_bersih') and 
			status='PA'");
			return $query;
		}
		function Hitung_Matkul($nim)
		{
			$query_hitung=$this->db->query("SELECT `tblnilai`.nim, `tblnilai`.kodemk, `tblnilai`.nidn, `tblmk`.namamk, `tblnilai`.Dosen, `tblnilai`.semester FROM `tblnilai` LEFT OUTER JOIN `tblmk` ON `tblnilai`.kodemk = `tblmk`.kode WHERE (`tblnilai`.nim='$nim') and (`tblnilai`.semester=(SELECT MAX(semester) as Maks FROM `tblnilai` WHERE nim='$nim')) ");
			return $query_hitung;
		}
		function Hitung_Hasil_Vote($nim)
		{
			$query_cek=$this->db->query("select nidn,kodemk from tblipdheader where nim=md5('$nim')");
			return $query_cek;
		}
		function Hasil_Pencarian($nim)
		{
			$query_hasil=$this->db->query("select nim, nama, angkatan, jurusan, program from tblmhs where nim='$nim'");
			return $query_hasil;
		}
		
		
		
		
		
		
		
	}
?>	
