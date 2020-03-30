<html>
	<head>
		<title>Dari Ci</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	</head>
	<body>
		<form id="dava" name="ibu_insert" method="post" action="<?php site_url($form_action); ?>">
			<table border="1">
				<tr>
					<td>Nama Sekolah</td>
					<td>
						<input type="text" name="nama_sekolah" value="<?php echo $data->nama_sekolah ?>" required>
					</td>
				</tr>
				<tr>
					<td>Kota Administrasi</td>
					<td>
						<input type="text" name="kota_administrasi" value="<?php echo $data->kota_administrasi ?>" required>
					</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>
						<input type="text" name="alamat" value="<?php echo $data->alamat ?>" required>
					</td>
				</tr>
				<tr>
					<td>Keterangan</td>
					<td>
						<input type="text" name="keterangan" value="<?php echo $data->keterangan ?>" required>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><button id="dio">Simpan</button></td>
				</tr>
			</table>
		</form>
			<script type="text/javascript">
			$(document).ready(function(){
				$('#dava').hide(1000);
				$('#dava').show(1000);
			});
		</script>

	</body>
</html>