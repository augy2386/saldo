<h4 class="mb-3">Riwayat Transaksi</h4>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead class="thead-light">
            <tr>
                <th>Kode</th>
                <th>Jenis</th>
                <th>Nominal</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($transactions)): ?>
                <?php foreach ($transactions as $t): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($t->trx_code); ?></td>
                        <td>
                            <?php if ($t->type == 'topup'): ?>
                                <span class="badge badge-success">Top Up</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Redeem</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php
                            $sign = $t->type == 'topup' ? '+' : '-';
                            echo $sign . ' Rp ' . number_format($t->amount, 0, ',', '.');
                            ?>
                        </td>
                        <td><?php echo htmlspecialchars($t->description); ?></td>
                        <td><?php echo $t->created_at; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center p-4">Belum ada transaksi.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
