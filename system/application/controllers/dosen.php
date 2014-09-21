<?php
session_start();
class Dosen extends Controller {

	function Dosen()
	{
		parent::Controller();	
		$this->load->helper(array('form','url', 'text_helper'));
		$this->load->database();
		$this->load->library();
	}
	
	function index()
	{
		$session=isset($_SESSION['username_dosen']) ? $_SESSION['username_dosen']:'';
		if($session!=""){
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen/tampilpencarian'>";
		}
		$this->load->view('dosen/login');
	}
	function login()
	{
		$username = $this->input->post('username');
		$pwd = $this->input->post('pwd');
		$this->load->model('Ipd_model_dosen');
		$hasil = $this->Ipd_model_dosen->Login_Dosen($username,$pwd);
		if (count($hasil->result_array())>0){
			foreach($hasil->result() as $items){
				$session_username=$items->username."|".$items->nama."|".$items->idlink;
			}
			$_SESSION['username_dosen']=$session_username;
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen/tampilpencarian'>";
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen'>";
		}
	}
	function logout()
	{
		session_destroy();
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen'>";
	}	
	function tampilpencarian()
	{
		$session=isset($_SESSION['username_dosen']) ? $_SESSION['username_dosen']:'';
		if($session==""){
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen'>";
		}
		$pecah=explode("|",$session);
		$this->load->model('Ipd_model_dosen');
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$this->load->view('dosen/dosen_header');
		$this->load->view('dosen/isi_tampil_pencarian',$data);
		$this->load->view('dosen/dosen_menu');
		$this->load->view('dosen/dosen_bawah');
	}
	function hasilpencarian()
	{
		$session=isset($_SESSION['username_dosen']) ? $_SESSION['username_dosen']:'';
		if($session==""){
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen'>";
		}
		$nim = $this->input->post('pencarian');
		$pecah=explode("|",$session);
		$this->load->model('Ipd_model_dosen');
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$hitung_mk=$this->Ipd_model_dosen->Hitung_Matkul($nim);
		$hitung_vote=$this->Ipd_model_dosen->Hitung_Hasil_Vote($nim);
		$data["biodata"]=$this->Ipd_model_dosen->Hasil_Pencarian($nim);
		$data["hit_mk"]=count($hitung_mk->result_array());
		$data["hit_vote"]=count($hitung_vote->result_array());
		$this->load->view('dosen/dosen_header');
		$this->load->view('dosen/isi_hasil_pencarian',$data);
		$this->load->view('dosen/dosen_menu');
		$this->load->view('dosen/dosen_bawah');
	}

}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
