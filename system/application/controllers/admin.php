<?php
session_start();
class Admin extends Controller {

	function Admin()
	{
		parent::Controller();	
		$this->load->helper(array('form','url', 'text_helper'));
		$this->load->database();
		$this->load->library();
	}
	
	function index()
	{
		$session=isset($_SESSION['username_admin']) ? $_SESSION['username_admin']:'';
		if($session!=""){
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/tampiladmin'>";
		}
		$this->load->view('admin/login');
	}
	function login()
	{
		$username = $this->input->post('username');
		$pwd = $this->input->post('pwd');
		$this->load->model('Ipd_model_admin');
		$hasil = $this->Ipd_model_admin->Login_Admin($username,$pwd);
		if (count($hasil->result_array())>0 and $username=="admin"){
			foreach($hasil->result() as $items){
				$session_username=$items->username."|".$items->nama."|".$items->idlink;
			}
			$_SESSION['username_admin']=$session_username;
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/tampiladmin'>";
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin'>";
		}
	}
	function tampiladmin()
	{
		$session=isset($_SESSION['username_admin']) ? $_SESSION['username_admin']:'';
		if($session==""){
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin'>";
		}
		$pecah=explode("|",$session);
		$this->load->model('Ipd_model_admin');
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["daftar"]=$this->Ipd_model_admin->Data_Matkul();
		$this->load->view('admin/admin_header');
		$this->load->view('admin/isi_tampil_pilihan',$data);
		$this->load->view('admin/admin_menu');
		$this->load->view('admin/admin_bawah');
	}
	
	function logout()
	{
	session_destroy();
	echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin'>";
	}	
	function tampildetail()
	{
		$session=isset($_SESSION['username_admin']) ? $_SESSION['username_admin']:'';
		if($session==""){
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin'>";
		}
		$kodemk='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kodemk='';
		}
		else
		{
    			$kodemk = $this->uri->segment(3);
		}
		$dosen='';		
		if ($this->uri->segment(4) === FALSE)
		{
    			$dosen='';
		}
		else
		{
    			$dosen = $this->uri->segment(4);
		}
		
		$this->load->model('Ipd_model_admin');
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["detail"]=$this->Ipd_model_admin->Tampil_Detail_Dosen($kodemk,$dosen);
		$data["point"]=$this->Ipd_model_admin->Cek_Point();
		
		$this->load->view('admin/admin_header');
		$this->load->view('admin/isi_tampil_detail',$data);
		$this->load->view('admin/admin_menu');
		$this->load->view('admin/admin_bawah');
	}
	
		function xlsBOF() {
			echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
			return;
		}
 
// Function penanda akhir file (End Of File) Excel
 
		function xlsEOF() {
			echo pack("ss", 0x0A, 0x00);
			return;
		}
 
// Function untuk menulis data (angka) ke cell excel
 
		function xlsWriteNumber($Row, $Col, $Value) {
			echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
			echo pack("d", $Value);
			return;
		}
 
// Function untuk menulis data (text) ke cell excel
 
		function xlsWriteLabel($Row, $Col, $Value ) {
			$L = strlen($Value);
			echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
			echo $Value;
			return;
		}
	
	
	function ubahexcell()
	{
		$session=isset($_SESSION['username_admin']) ? $_SESSION['username_admin']:'';
		if($session==""){
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin'>";
		}
		$kodemk='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kodemk='';
		}
		else
		{
    			$kodemk = $this->uri->segment(3);
		}
		$dosen='';		
		if ($this->uri->segment(4) === FALSE)
		{
    			$dosen='';
		}
		else
		{
    			$dosen = $this->uri->segment(4);
		}
		
		$this->load->model('Ipd_model_admin');
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["detail"]=$this->Ipd_model_admin->Tampil_Detail_Dosen($kodemk,$dosen);
		$this->load->plugin("to_excel");
		to_excel( $data['detail'] , $kodemk."_".$dosen.".xls" ) ;
	}
	function tampilkomentar()
	{
		$session=isset($_SESSION['username_admin']) ? $_SESSION['username_admin']:'';
		if($session==""){
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin'>";
		}
		$kodemk='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kodemk='';
		}
		else
		{
    			$kodemk = $this->uri->segment(3);
		}
		$dosen='';		
		if ($this->uri->segment(4) === FALSE)
		{
    			$dosen='';
		}
		else
		{
    			$dosen = $this->uri->segment(4);
		}
		
		$this->load->model('Ipd_model_admin');
		$this->load->library('Pagination');

     		$page=$this->uri->segment(5);
      		$limit=150;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	

        	$query = $this->Ipd_model_admin->Tampil_Komentar($kodemk,$dosen,$offset,$limit);
		$tot_hal = $this->Ipd_model_admin->Total_Komentar($kodemk,$dosen);
      	 	$config['base_url'] = base_url() .'/index.php/admin/tampilkomentar/'.$kodemk.'/'.$dosen;
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
	    	$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Selanjutnya';
		$config['prev_link'] = 'Sebelumnya';
        	$this->pagination->initialize($config);
		$paginator=$this->pagination->create_links();


		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["query"]=$query;
		$data["paginator"]=$paginator;
		
		$this->load->view('admin/admin_header');
		$this->load->view('admin/isi_tampil_komentar',$data);
		$this->load->view('admin/admin_menu');
		$this->load->view('admin/admin_bawah');
	}

}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
