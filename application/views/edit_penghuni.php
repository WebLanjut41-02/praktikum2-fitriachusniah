
<html>
<head>
	<title>INPUT DATA PENGHUNI
	</title>
</head>
<body>
	<form method="post" action="<?php echo base_url(); ?>Center/proses_editPenghuni">
		<table>

			<tr>
				<td>No KTP</td><td>:</td>
				<td><input type="text" name="noktp" value="<?php echo($getPenghuni[0]->No_KTP) ?>"></td>

			</tr>
			<tr>
				<td>Nama</td><td>:</td>
				<td><input type="text" name="nama" value="<?php echo($getPenghuni[0]->Nama) ?>"></td>

			</tr>
			<tr>
				<td>Unit</td><td>:</td>
				<td><input type="text" name="unit" value="<?php echo($getPenghuni[0]->Unit) ?>"></td>

			</tr>


			<tr>
				<td colspan="3">
						<input type="submit" name="submit" value="EDIT">
				</td>
			</tr>
		</table>
  <a href="<?php echo base_url(); ?>Center/kedua?>"">Back</a>
	</form>
</body>
</html>
