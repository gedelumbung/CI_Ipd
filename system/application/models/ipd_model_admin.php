<?php
class Ipd_model_admin extends Model
	{
		function Ipd_model_admin()
		{
			parent::Model();
		}
		
		function Login_Admin($user,$pass)
		{
			$user_bersih=mysql_real_escape_string($user);
			$pass_bersih=mysql_real_escape_string($pass);
			$query=$this->db->query("select * from tbllogin where username='$user_bersih' and psw=PASSWORD('$pass_bersih')");
			return $query;
		}
		function Data_Matkul()
		{
			$query_data_mk=$this->db->query("select ipd.nidn, ipd.dosen, ipd.kodemk, tblmk.namamk, 
			tblmk.semester, tblmk.sks from (SELECT nidn, dosen, kodemk FROM tblipdheader 
			GROUP BY nidn, dosen, kodemk) ipd left outer join tblmk ON ipd.kodemk = tblmk.kode order by tblmk.semester ASC");
			return $query_data_mk;
		}

		function Tampil_Detail_Soal($id_soal)
		{
			$query_tampil_soal=$this->db->query("select ipd.nidn, ipd.dosen, ipd.kodemk, tblmk.namamk, 
			tblmk.semester, tblmk.sks from (SELECT nidn, dosen, kodemk FROM tblipdheade 
			GROUP BY nidn, dosen, kodemk) ipd left outer join tblmk ON ipd.kodemk = tblmk.kode");
			return $query_tampil_soal;
		}
				
		function Tampil_Detail_Dosen($kodemk,$nidn)
		{
			$query_tampil_dosen=$this->db->query("select tblmk.namamk, ipd.idsoal, ipd.nidn, ipd.kodemk, ipd.A, ipd.B, ipd.C, ipd.D, ipd.dosen from 
			(SELECT tblipddetail.idsoal, 
SUM(case tblipddetail.pilihan when 'A' then 1 else 0 end) as 'A',
SUM(case tblipddetail.pilihan when 'B' then 1 else 0 end) as 'B',  
SUM(case tblipddetail.pilihan when 'C' then 1 else 0 end) as 'C',  
SUM(case tblipddetail.pilihan when 'D' then 1 else 0 end) as 'D',  
tblipdheader.kodemk, tblipdheader.dosen, tblipdheader.nidn
FROM tblipddetail
LEFT OUTER JOIN tblipdheader ON tblipddetail.idipd = tblipdheader.idipd
where tblipdheader.kodemk='$kodemk' and tblipdheader.dosen='$nidn'
GROUP BY tblipdheader.kodemk, tblipdheader.dosen, tblipddetail.idsoal) ipd left outer join tblmk on ipd.kodemk = tblmk.kode 

			");
			return $query_tampil_dosen;
		}
		
		function Cek_Point()
		{
				$query_cek_soal=$this->db->query("SELECT idsoal, pilihan, point
				FROM tbljawabansoalipd");
				return $query_cek_soal;
		}
		
		function Tampil_Jawaban($id_dosen)
		{
			$query_tampil_jawaban=$this->db->query("SELECT * FROM tbljawabansoalipd");
			return $query_tampil_jawaban;
		}
		
		function Tampil_Komentar($kodemk,$nidn,$ofset,$limit)
		{
			$query_tampil_dosen=$this->db->query("SELECT tblipdheader.dosen, tblipdheader.komentar,
			 tblipdheader.kodemk, tblipdheader.nidn, tblmk.namamk from tblipdheader left outer join tblmk on 
			 tblmk.kode=tblipdheader.kodemk where tblipdheader.dosen='$nidn' and tblipdheader.kodemk='$kodemk' LIMIT $ofset,$limit");
			return $query_tampil_dosen;
		}
		function Total_Komentar($kodemk,$nidn)
		{
			$query_tampil_dosen=$this->db->query("SELECT tblipdheader.dosen, tblipdheader.komentar,
			 tblipdheader.kodemk, tblipdheader.nidn, tblmk.namamk from tblipdheader left outer join tblmk on 
			 tblmk.kode=tblipdheader.kodemk where tblipdheader.nidn='$nidn' and tblipdheader.kodemk='$kodemk'");
			return $query_tampil_dosen;
		}		
	}
?>	
