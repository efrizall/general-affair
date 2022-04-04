<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header py-3">
            <h3 class="judul h3 text-gray-800">Rekapitulasi Maintenance</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped display" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal Permintaan</th>
                            <th>Nomor Permintaan</th>
                            <th>Nama</th>
                            <th>Divisi</th>
                            <th>Permintaan Layanan</th>
                            <th class="td">Keterangan Atau Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $row) {
                            $tanggal = date_create($row['tanggal']);
                        ?>
                            <tr>
                                <td><?= $row['tanggal'] ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="td"></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>