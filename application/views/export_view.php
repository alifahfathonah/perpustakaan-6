<!DOCTYPE html>
<html>
<head>
	<title>Codeigniter</title>

	<!--bootstrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!--font awesome-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<body>

	<table border="1" class="table table-striped">
		<thead>
			<tr>
				<th>ID Ibu</th>
				<th>Nama Presiden</th>
				<th>Lama Menjabat</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>Soekarno</td>
				<td>4 Tahun</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Soeharto</td>
				<td>32 Tahun</td>
			</tr>
			<tr>
				<td>3</td>
				<td>BJ Habibie</td>
				<td>1 Tahun</td>
			</tr>
			<tr>
				<td>4</td>
				<td>Abdurahman Wahid</td>
				<td>2 Tahun</td>
			</tr>
			<tr>
				<td>5</td>
				<td>Megawati</td>
				<td>3 Tahun</td>
			</tr>
			<tr>
				<td>6</td>
				<td>SB Yudhoyono</td>
				<td>10 Tahun</td>
			</tr>
			<tr>
				<td>7</td>
				<td>Joko Widodo</td>
				<td>5 Tahun</td>
			</tr>
		</tbody>
	</table>

	<a href="<?php echo site_url('export/download');?>" class="btn btn-primary"><i class="fas fa-download"></i> download</a>


</body>
</html>