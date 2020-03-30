<?php $i = 0 ?>

<div class="row">
    <div class="col-10 no-margin">
        <h2>Laporan siswa</h2>
    </div>
</div>

<!-- Flash message -->
<?php $this->load->view('_partial/flash_message') ?>

<!-- Table -->
<div class="row">
    <div class="col-10">
        <?php if ($siswas):?>
            <table>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($siswas as $siswa): ?>
                    <?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
                        <td><?= ++$i ?></td>
                        <td><?= $siswa->nama ?></td>
                        <td><?= $siswa->jenis_kelamin ?></td>
                        <td><?= $siswa->alamat ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">Jumlah Total: <?= isset($jumlah_siswa) ? $jumlah_siswa : '' ?></td>
                    </tr>
                </tfoot>
            </table>
        <?php else: ?>
            <p>Tidak ada data siswa.</p>
        <?php endif ?>
    </div>
</div>

<div class="row">
    <div class="col-10">
        <?= anchor("Siswa/laporan_pdf", 'Cetak', ['class' => 'btn btn-success', 'target' => '_blank']) ?>
    </div>
</div>
