


<div class="ewallet-page">

    <div class="ewallet-topup-bg">
        <div class="ewallet-topup-header">
            <a href="<?php echo site_url('dashboard'); ?>" class="ewallet-topup-back">&#8592;</a>
            <div class="ewallet-topup-title">Top Up Saldo</div>
        </div>

        <div class="ewallet-topup-card">
            <div class="ewallet-topup-label">Saldo Saat Ini</div>
            <div class="ewallet-topup-balance">
                Rp <?php echo number_format($balance, 0, ',', '.'); ?>
            </div>
            <div class="ewallet-topup-sub">
                Gunakan fitur ini untuk menambah saldo e-wallet Anda.
            </div>
        </div>
    </div>

    <div class="ewallet-topup-body">
        <div class="ewallet-topup-form-card">

            <?php if (isset($error)): ?>
                <div class="alert alert-danger py-2" style="font-size:0.85rem;"><?php echo $error; ?></div>
            <?php endif; ?>

            <form method="post">
                <div class="form-group mb-3">
                    <label class="ewallet-form-label">Nominal Top Up</label>
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
                        Minimal Rp 1.000. Kamu bisa pilih cepat di bawah ini.
                    </div>
                </div>

                <div class="ewallet-quick-row">
                    <button type="button" class="ewallet-quick-btn" onclick="document.getElementsByName('amount')[0].value='50000'">
                        50.000
                    </button>
                    <button type="button" class="ewallet-quick-btn" onclick="document.getElementsByName('amount')[0].value='100000'">
                        100.000
                    </button>
                    <button type="button" class="ewallet-quick-btn" onclick="document.getElementsByName('amount')[0].value='200000'">
                        200.000
                    </button>
                </div>

                <button type="submit" class="btn btn-primary btn-block ewallet-submit-btn mt-4">
                    Konfirmasi Top Up
                </button>
            </form>

            <div class="ewallet-link-back">
                <a href="<?php echo site_url('dashboard'); ?>">&laquo; Kembali ke Dashboard</a>
            </div>
        </div>
    </div>
</div>
