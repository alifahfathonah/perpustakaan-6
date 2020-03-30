<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Laporan Pemesanan</title>
    <style type="text/css">
            h1 {
                text-align:center;
                font-size:18px;
            }

            table {
                font-size:10px;
                border-collapse: collapse;
            }
            .zebra {
                background-color:#CCCCCC;
            }
            th, td {
                padding: 4px 2px;
            }
            th, tfoot tr td {
                background-color: #999999;
            }
        </style>
</head>

<body>
<h1>Laporan Pemesanan</h1>

<?php $i = 0 ?>
<table width="600" border="0">
    <thead>
        <tr>
            <th width="30">No</th>
            <th width="80">Nama</th>
            <th width="240">Jenis Kelamin</th>
            <th width="100">Alamat</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($siswas as $siswa): ?>
        <?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
            <td width="30" align="center"><?= ++$i ?></td>
            <td width="80" align="center"><?= $siswa->nama ?></td>
            <td width="240" align="center"><?= $siswa->jenis_kelamin ?></td>
            <td width="100" align="center"><?= $siswa->alamat ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6"><strong>Jumlah Total : <?= $jumlah_siswa ?></strong></td>
        </tr>
    </tfoot>
</table>

</body>
</html>