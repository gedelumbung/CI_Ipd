<?php
session_start();
class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();	
		$this->load->helper(array('form','url', 'text_helper'));
		$this->load->database();
	}
	
	function index()
	{
		$session=isset($_SESSION['username']) ? $_SESSION['username']:'';
		if($session!=""){
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/welcome/tampildata'>";
		}
		$this->load->view('ipd/login');
	}
	function login()
	{
		$username = $this->input->post('username');
		$pwd = $this->input->post('pwd');
		$this->load->model('Ipd_model');
		$hasil = $this->Ipd_model->Data_Login($username,$pwd);
		if (count($hasil->result_array())>0){
			foreach($hasil->result() as $items){
				$session_username=$items->username."|".$items->nama."|".$items->idlink;
			}
			$_SESSION['username']=$session_username;
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/welcome/tampildata'>";
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
		}
	}
	function tampildata()
	{
		$session=isset($_SESSION['username']) ? $_SESSION['username']:'';
		if($session==""){
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
		}
		$pecah=explode("|",$session);
		$this->load->model('Ipd_model');
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["daftar"]=$this->Ipd_model->Data_Mk($pecah[2]);
		$data["cek"]=$this->Ipd_model->Cek_Status($pecah[0]);
		$jum=$this->Ipd_model->Data_Mk($pecah[2]);
		$tes=count($jum->result_array());
		$this->load->view('ipd/ipd_header');
		$this->load->view('ipd/isi_daftar_mk',$data);
		$this->load->view('ipd/ipd_menu');
		$this->load->view('ipd/ipd_bawah');
	}
	function logout()
	{
	session_destroy();
	echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
	}
	function tampilsoal()
	{
		$session=$_SESSION['username'];
		if($session==""){
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
		}
		$nidn='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$nidn='';
		}
		else
		{
    			$nidn = $this->uri->segment(3);
		}
		$kodemk='';		
		if ($this->uri->segment(4) === FALSE)
		{
    			$kodemk='';
		}
		else
		{
    			$kodemk = $this->uri->segment(4);
		}
		
		$pecah=explode("|",$session);
		$this->load->model('Ipd_model');
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["soal"]=$this->Ipd_model->Tampil_Soal($pecah[2]);
		$data["jawaban"]=$this->Ipd_model->Tampil_Jawaban($pecah[2]);
		$data["ketdosen"]=$this->Ipd_model->Ket_Dosen($nidn,$kodemk,$pecah[2]);
		
		$cek=$this->Ipd_model->Lempar($pecah[0],$nidn,$kodemk);
		foreach($cek->result_array() as $itemcek){
			if($itemcek['kodemk']==$kodemk)
			{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/welcome/tampildata'>";
			}		
		}
		$this->load->view('ipd/ipd_header');
		$this->load->view('ipd/isi_data_soal',$data);
		$this->load->view('ipd/ipd_menu');
		$this->load->view('ipd/ipd_bawah');
	}
	function kirimdata()
	{
		$nidn=$this->input->post('nidn');
		$nim=$this->input->post('nim');
		$nim_enkrip=md5($nim);
		$kodemk=$this->input->post('kodemk');
		$dosen=$this->input->post('dosen');
		$simpan=$this->input->post('simpan');
		$komkot=$this->input->post('komentar');
		$komentar=strip_tags($komkot);
		
		$pecah1=explode("|",$simpan);
		$datadetail=array();
		$datainput=array();
		$this->load->model('Ipd_model');
		$datainput['idipd'] = $this->Ipd_model->Cari_Id();
		$jumlah=count($pecah1);
		for($i=0;$i<count($pecah1);$i++)
		{
		$pecah2=explode("_",$pecah1[$i]);
		$datadetail['idipd'][]=$datainput['idipd'];
		$datadetail['idsoal'][]=$pecah2[0];
		$datadetail['pilihan'][]=$pecah2[1];
		}
		
		$datainput['nidn']=$nidn;
		$datainput['nim']=$nim_enkrip;
		$datainput['kodemk']=$kodemk;
		$datainput['dosen']=$dosen;
		$datainput['komentar']=$komentar;
		$string="insert into tblipddetail (idipd,idsoal,pilihan) values";
		$akhir="";
		for($i=0;$i<count($datadetail['idipd']);$i++)
		{	
			if($akhir==""){
			$akhir="(".$datadetail['idipd'][$i].",".$datadetail['idsoal'][$i].",'".$datadetail['pilihan'][$i]."')";
			}
			else{
			$akhir.=",(".$datadetail['idipd'][$i].",".$datadetail['idsoal'][$i].",'".$datadetail['pilihan'][$i]."')";
			}
		}
		if($jumlah<5)
		{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/welcome/tampilsoal/".$nidn."/".$kodemk."'>";
		}
		else
		{
		$query = $string.$akhir.';';
		$this->Ipd_model->Simpan_Data($datainput,$query);
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/welcome/tampildata'>";
		}
	}
	
	function gantipassword()
	{
		$session=isset($_SESSION['username']) ? $_SESSION['username']:'';
		if($session==""){
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
		}
		$pecah=explode("|",$session);
		$this->load->model('Ipd_model');
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$this->load->view('ipd/ipd_header');
		$this->load->view('ipd/isi_ganti_password',$data);
		$this->load->view('ipd/ipd_menu');
		$this->load->view('ipd/ipd_bawah');
	}
	function updatepassword()
	{
		$username=$this->input->post('username');
		$psw=$this->input->post('pwd');
		$psw_lama=$this->input->post('pwd_lama');
		$this->load->model('Ipd_model');
		$hasil = $this->Ipd_model->Data_Login($username,$psw_lama);
		if(count($hasil->result()) <= 0)
		{
			?>
			<script type="text/javascript">
				alert('Password lama yang anda masukkan SALAH..!!!');
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/welcome/gantipassword'>";
		}
		else if($psw!="" AND $psw_lama!="")
		{
			$this->Ipd_model->Update_Password($username,$psw);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/welcome/tampildata'>";
		}
		else
		{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/welcome/gantipassword'>";
		}
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
