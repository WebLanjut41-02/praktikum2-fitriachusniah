<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Penghuni
	</title>
</head>
<body>
	<center>
		<br><br><br>
		<h3>TABEL DATA PENGHUNI</h3>

</body>
</html>


 Hallo <mark><?php  echo $this->session->userdata('data')['Nama']; ?></mark> | <a href='<?php echo base_url(); ?>Center/tambah_paket?>"'>Tambah Paket</a> | <a href='<?php echo base_url(); ?>Center/tambah_penghuni?>"'>Tambah Penghuni</a> | <a href='<?php echo base_url(); ?>Center/logout?>"'>LOGOUT</a><br><table border='1' style='border: solid thin #666'>

          <th>No KTP</th>
      		<th>Nama Penghuni</th>
      		<th>Unit</th>
      		<th>Aksi</th>

          <?php if (count($penghuni)>0): ?>
                      <?php foreach ($penghuni as $key => $value): ?>
                        <tr>
                          <td><?php echo($value->No_KTP) ?></td>
                          <td><?php echo($value->Nama) ?></td>
                          <td><?php echo($value->Unit)?></td>
                          <td>
                            <a href="<?php $id = $value->No_KTP; echo base_url('Center/edit_penghuni/'.$id); ?>" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> Edit</a>
                          </td>
                        </tr>
                      <?php endforeach ?>
                    <?php endif ?>


         </table>

  <a href="<?php echo base_url(); ?>Center/pertama?>"">Back</a>
</center>
