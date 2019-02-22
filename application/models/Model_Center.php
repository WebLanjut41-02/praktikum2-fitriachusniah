<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Center extends CI_Model {

	 function proseslogin($nip, $nama){

	 	  $this->db->from('karyawan');
		  $this->db->where('NIP',$nip);
		  $this->db->where('Nama',$nama);

		 return $this->db->get();
 	}

  function tampil_data(){
     $this->db->select('* ,b.No_KTP,b.Nama as Nama_Penghuni,c.NIP,c.Nama as Nama_Karyawan');
     $this->db->from('paket a');
     $this->db->join('penghuni b','a.Sasaran = b.No_KTP');
     $this->db->join('karyawan c','a.Penerima = c.NIP');
     $this->db->order_by("a.Id_Paket", "asc");
    return $this->db->get();
 }

 function tampil_penghuni(){
    $this->db->select('*');
    $this->db->from('penghuni');
   return $this->db->get();
}

function tampil_penghuniById($id){
   $this->db->select('*');
   $this->db->from('penghuni');
  $this->db->where('No_KTP',$id);
  return $this->db->get();
}

function tambah_paket($tgl_dtg,$sasaran,$penerima,$isi_paket){
  $data = array(
        'Tgl_Datang' => $tgl_dtg,
        'Sasaran'=>  $sasaran,
        'Penerima' => $penerima,
        'Isi_Paket' => $isi_paket
	);

		$this->db->insert('paket', $data);
}

function tambah_penghuni($no_ktp,$nama,$unit){
  $data = array(
        'No_KTP' => $no_ktp,
        'Nama'=>  $nama,
        'Unit' => $unit
	);

		$this->db->insert('penghuni', $data);
}

function edit_penghuni($no_ktp,$nama,$unit){
  $data = array(
        'Nama'=>  $nama,
        'Unit' => $unit
	);
    $this->db->where('No_KTP', $no_ktp);
		$this->db->update('penghuni', $data);
}

public function edit_paket($id,$tgl_terima){
       $this->db->set('Tgl_Terima', $tgl_terima);
       $this->db->where('Id_Paket', $id);
       return $this->db->update('paket');
   }

}
?>
