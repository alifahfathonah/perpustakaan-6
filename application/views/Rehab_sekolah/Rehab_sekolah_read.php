
<html>
	<head>
		<title>Rehab Sekolah</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>

			$(document).ready(function(){
				$('#dio').hide(1000);
				$('#dio').slideDown(2000, function() {	
				});
			});

		</script>

	</head>
	<body>
		<div id="dio">
			<h1>Daftar Rehab Sekolah</h1>
			<a href="<?php echo site_url('rehab_sekolah/insert') ?>">insert</a>
			<table  border="2">
				<thead>
					<th>ID Rahab Sekolah</th>
					<th>Nama Sekolah</th>
					<th>Kota Administrasi</th>
					<th>Alamat</th>
					<th>Keterangan</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php foreach($daftar_rehab_sekolah as $drs): ?>
						<tr>
							<td><?php echo $drs->id_rehab_sekolah ?></td>
							<td><?php echo $drs->nama_sekolah ?></td>
							<td><?php echo $drs->kota_administrasi ?></td>
							<td><?php echo $drs->alamat ?></td>
							<td><?php echo $drs->keterangan ?></td>
							<td>
								<a href="<?php echo base_url('index.php/rehab_sekolah/update/'.$drs->id_rehab_sekolah) ?>">Edit</a> |
								<a href="<?php echo base_url('index.php/rehab_sekolah/delete/'.$drs->id_rehab_sekolah) ?>">Delete</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</body>
</html>