<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Paket
	</title>
</head>
<body>
	<center>
		<br><br><br>
		<h3>TABEL DATA PAKET</h3>

</body>
</html>


 Hallo <mark><?php  echo $this->session->userdata('data')['Nama']; ?></mark> | <a href='<?php echo base_url(); ?>Center/tambah_paket?>"'>Tambah Paket</a> | <a href='<?php echo base_url(); ?>Center/tambah_penghuni?>"'>Tambah Penghuni</a> | <a href='<?php echo base_url(); ?>Center/kedua?>"'>List Penghuni</a> | <a href='<?php echo base_url(); ?>Center/logout?>"'>LOGOUT</a><br><table border='1' style='border: solid thin #666'>

          <th>ID Paket</th>
      		<th>Tgl Datang</th>
      		<th>Sasaran</th>
      		<th>Penerima</th>
      		<th>Isi Paket</th>
      		<th>Tanggal Ambil</th>
          <th>Status</th>
      		<th>Aksi</th>

          <?php if (count($paket)>0): ?>
                      <?php foreach ($paket as $key => $value): ?>
                        <tr>
                          <td><?php echo($value->Id_Paket) ?></td>
                          <td><?php echo($value->Tgl_Datang) ?></td>
                          <td><?php echo($value->Sasaran)." - ".($value->Nama_Penghuni) ?></td>
                          <td><?php echo($value->Penerima)." - ".($value->Nama_Karyawan) ?></td>
                          <td><?php echo($value->Isi_Paket) ?></td>
                          <td><?php echo($value->Tgl_Terima) ?></td>

                          <?php
                        $keterangan = "";
                          if($value->Tgl_Terima=='0000-00-00'){
                            $keterangan = "Belum Diambil";
                             echo "<td style='border: solid thin #666'>".$keterangan."</td>";
                          }else{
                              $keterangan = "Sudah Diambil";
                              echo "<td style='border: solid thin #666'>".$keterangan."</td>";
                          } ?>
                          <td>
                            <?php
                              if($keterangan == "Belum Diambil"){
                                ?>
                                  <a href="<?php $id = $value->Id_Paket; echo base_url('Center/edit_paket/'.$id); ?>" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i>UPDATE STATUS</a>
                                <?php
                              }
                             ?>


                          </td>
                        </tr>
                      <?php endforeach ?>
                    <?php endif ?>


         </table>


</center>
