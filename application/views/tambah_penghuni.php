
<html>
<head>
	<title>INPUT DATA PENGHUNI
	</title>
</head>
<body>
	<form method="post" action="<?php echo base_url(); ?>Center/proses_tambahPenghuni">
		<table>

			<tr>
				<td>No KTP</td><td>:</td>
				<td><input type="text" name="noktp"></td>

			</tr>
			<tr>
				<td>Nama</td><td>:</td>
				<td><input type="text" name="nama"></td>

			</tr>
			<tr>
				<td>Unit</td><td>:</td>
				<td><input type="text" name="unit"></td>

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
