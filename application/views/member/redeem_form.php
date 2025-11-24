


<div class="ewallet-page">

    <div class="ewallet-redeem-bg">
        <div class="ewallet-redeem-header">
            <a href="<?php echo site_url('dashboard'); ?>" class="ewallet-redeem-back">&#8592;</a>
            <div class="ewallet-redeem-title">Redeem / Gunakan Saldo</div>
        </div>

        <div class="ewallet-redeem-card">
            <div class="ewallet-redeem-label">Saldo Bisa Dipakai</div>
            <div class="ewallet-redeem-balance">
                Rp <?php echo number_format($balance, 0, ',', '.'); ?>
            </div>
            <div class="ewallet-redeem-sub">
                Pastikan nominal redeem tidak melebihi saldo aktif.
            </div>
        </div>
    </div>

    <div class="ewallet-redeem-body">
        <div class="ewallet-redeem-form-card">

            <?php if (isset($error)): ?>
                <div class="alert alert-danger py-2" style="font-size:0.85rem;"><?php echo $error; ?></div>
            <?php endif; ?>

            <form method="post">
                <div class="form-group mb-3">
                    <label class="ewallet-form-label">Nominal Redeem</label>
                    <div class="ewallet-amount-wrap">
                        <span class="ewallet-amount-prefix">Rp</span>
                        <input
                            type="number"
                            name="amount"
                            class="form-control ewallet-amount-input"
                            min="1000"
                            step="1000"
                            required
                            placeholder="0"
                        >
                    </div>
                    <div class="ewallet-helper">
                        Minimal Rp 1.000. Gunakan untuk pembelian / penukaran poin.
                    </div>
                    <div class="ewallet-warning">
                        Redeem akan langsung mengurangi saldo aktif Anda.
                    </div>
                </div>

                <div class="ewallet-quick-row">
                    <button type="button" class="ewallet-quick-btn" onclick="document.getElementsByName('amount')[0].value='25000'">
                        25.000
                    </button>
                    <button type="button" class="ewallet-quick-btn" onclick="document.getElementsByName('amount')[0].value='50000'">
                        50.000
                    </button>
                    <button type="button" class="ewallet-quick-btn" onclick="document.getElementsByName('amount')[0].value='100000'">
                        100.000
                    </button>
                </div>

                <button type="submit" class="btn btn-danger btn-block ewallet-submit-btn mt-4">
                    Konfirmasi Redeem
                </button>
            </form>

            <div class="ewallet-link-back">
                <a href="<?php echo site_url('dashboard'); ?>">&laquo; Kembali ke Dashboard</a>
            </div>
        </div>
    </div>
</div>
