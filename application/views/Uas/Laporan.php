<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php $i = 0; ?>
<div class="container">
  <h2>Daftar Jumlah Penduduk Di Setiap Provinsi</p>            
  <table class="table">
    <thead>
      <tr>
        <th scope="col">NO</th>
        <th scope="col">Nama Provinsi</th>
        <th scope="col">Jumlah Penduduk</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($datas as $data): ?>
      <tr>
        <td><?= ++$i ?></td>
        <td><?= $data->nama_provinsi ?></td>
        <td><?= $data->jumlah_penduduk ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>

</body>
</html>