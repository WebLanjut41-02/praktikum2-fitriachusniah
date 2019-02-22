<?php
/**
 * Created by PhpStorm.
 * User: Fitria R. Chusniah
 * Date: 30/01/2019
 * Time: 08.41
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Center extends CI_Controller {
    public function __construct()
    {
    	parent::__construct();
      $this->load->model('Model_Center');
    	//echo "Ini dari constructor Baru <br><br>";
    }

    public function index(){
        $this->load->view('login');
    }
	public function ceklogin()
	{
    if(isset($_POST['login'])){
      $nip  	= $this->input->post('nip',true);
      $nama 	= $this->input->post('nama',true);

      $data["akun"] = $this->Model_Center->proseslogin($nip, $nama)->result();
      $hasil = count($data["akun"]);

      if($hasil > 0){
           $yglogin = $this->db->get_where('karyawan',array('NIP'=>$nip, 'Nama' => $nama))->row();

           if($yglogin){

                $data = array('udhmasuk' => true,
               'NIP' => $yglogin->NIP, 'Nama' => $yglogin->Nama);

               $this->session->set_userdata('akun',$data);
               $_SESSION['data'] = $data;


              $data["paket"] = $this->Model_Center->tampil_data()->result();
               $this->load->view('tampil_data',$data);
           }
      }else{
       $message = "Maaf, username atau password salah!";
       echo "<script type='text/javascript'>
           alert('$message');
           window.location.href = '" . base_url() . "Center';
           </script>";
      }
 }
	}

  public function pertama(){

   $data["paket"] = $this->Model_Center->tampil_data()->result();
   $this->load->view('tampil_data',$data);
  }
  public function kedua(){
    $data["paket"] = $this->Model_Center->tampil_data()->result();
    $data["penghuni"] = $this->Model_Center->tampil_penghuni()->result();
    $this->load->view('tampil_datapenghuni',$data);
  }

  public function logout(){

		$this->session->sess_destroy();
		$this->session->unset_userdata('user_id');
		redirect('Center');

	}

  public function tambah_paket(){

		$data["sasaran"] = $this->Model_Center->tampil_penghuni()->result();
     $this->load->view('tambah_paket',$data);
	}

  public function proses_tambahPaket()
  {
    date_default_timezone_set('Asia/Jakarta');
    $tgl_dtg 		= date("Y-m-d");
    $penerima	  = $this->session->userdata('data')['NIP'];
    $sasaran  	= $this->input->post('sasaran',true);
    $isi_paket 	= $this->input->post('isi_paket',true);

    $this->Model_Center->tambah_paket($tgl_dtg,$sasaran,$penerima,$isi_paket);
    $data["paket"] = $this->Model_Center->tampil_data()->result();
    $this->load->view('tampil_data',$data);

  }

  public function tambah_penghuni(){

     $this->load->view('tambah_penghuni');
	}

  public function edit_penghuni($id){
      $data["getPenghuni"] = $this->Model_Center->tampil_penghuniById($id)->result();
     $this->load->view('edit_penghuni',$data);
  }



  public function proses_tambahPenghuni()
  {

    $no_ktp	  = $this->input->post('noktp',true);
    $nama  	  = $this->input->post('nama',true);
    $unit 	  = $this->input->post('unit',true);

    $this->Model_Center->tambah_penghuni($no_ktp,$nama,$unit);
    $data["penghuni"] = $this->Model_Center->tampil_penghuni()->result();
    $this->load->view('tampil_datapenghuni',$data);

  }

  public function proses_editPenghuni()
  {

    $no_ktp	  = $this->input->post('noktp',true);
    $nama  	  = $this->input->post('nama',true);
    $unit 	  = $this->input->post('unit',true);

    $this->Model_Center->edit_penghuni($no_ktp,$nama,$unit);
    $data["penghuni"] = $this->Model_Center->tampil_penghuni()->result();
    $this->load->view('tampil_datapenghuni',$data);

  }

  public function edit_paket($id){
    date_default_timezone_set('Asia/Jakarta');
    $tgl_terima		= date("Y-m-d");
    $this->Model_Center->edit_paket($id,$tgl_terima);
    $data["paket"] = $this->Model_Center->tampil_data()->result();
    $this->load->view('tampil_data',$data);
  }



}

/* End of file Controllername.php */
?>
