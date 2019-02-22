
<html>
<head>
	<title>INPUT DATA PAKET
	</title>
</head>
<body>
	<form method="post" action="<?php echo base_url(); ?>Center/proses_tambahPaket">
		<table>

			<tr>
				<td>Sasaran</td><td>:</td>
				<td><select name="sasaran">
					<?php


					        foreach ($sasaran as $key => $value) {
                    // code...
                    echo "<option value='".$value->No_KTP."'>".$value->No_KTP.".".$value->Nama."</option>";
                  }


					 ?>
				</select></td>
			</tr>

			<tr>
				<td>Isi Paket</td><td>:</td>
				<td><textarea name="isi_paket" ></textarea></td>
			</tr>
			<tr>
				<td colspan="3">
						<input type="submit" name="submit" value="INPUT">
				</td>
			</tr>
		</table>
    <a href="<?php echo base_url(); ?>Center/pertama?>"">Back</a>
	</form>
</body>
</html>
