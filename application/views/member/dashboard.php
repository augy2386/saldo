<?php /* DASHBOARD TAMPILAN ALA E-WALLET ewallet */ ?>

<style>
    /* Khusus halaman ini saja */
    :root {
        --primary-blue: #0f172a;
        --accent-blue: #1d4ed8;
        --light-blue: #3b82f6;
        --success-green: #16a34a;
        --danger-red: #dc2626;
        --dark-bg: #111827;
        --light-bg: #f8fafc;
        --text-light: #e5e7eb;
        --text-gray: #6b7280;
    }
  
</style>

<div class="ewallet-container">
    <!-- Header dengan logo -->
    <div class="ewallet-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-2">
                <div class="ewallet-logo">MyWallet</div>
                <div class="d-flex align-items-center">
                    <div class="ewallet-username mr-3">Hai, <?php echo htmlspecialchars($full_name); ?></div>
                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                        <span style="color: var(--accent-blue); font-weight: 600;">
                            <?php echo strtoupper(substr($full_name, 0, 1)); ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-0">
        <div class="row">
            <div class="col-md-12">
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <!-- Kartu Saldo Utama ala ewallet -->
                <div class="ewallet-header-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="ewallet-balance-label text-uppercase">Saldo Aktif</div>
                            <div class="ewallet-balance-value">
                                Rp <?php echo number_format($balance, 0, ',', '.'); ?>
                            </div>
                            <div class="ewallet-chip mt-1">
                                <span>
                                    Total Topup:
                                    <strong>Rp <?php echo number_format($sum_topup, 0, ',', '.'); ?></strong>
                                    &nbsp;&bull;&nbsp;
                                    Total Redeem:
                                    <strong>Rp <?php echo number_format($sum_redeem, 0, ',', '.'); ?></strong>
                                </span>
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="<?php echo site_url('transactions'); ?>" class="ewallet-pill-link mt-2 d-inline-block">
                                Lihat Riwayat
                            </a>
                        </div>
                    </div>

                    <!-- Quick Actions ala menu bulat ewallet -->
                    <div class="ewallet-quick-actions">
                        <div class="row text-center">
                            <div class="col-3">
                                <a href="<?php echo site_url('transaction/topup'); ?>" class="btn ewallet-quick-btn">
                                    <div class="ewallet-quick-btn-icon">
                                        &#43;
                                    </div>
                                    <span>Top Up</span>
                                </a>
                            </div>
                            <div class="col-3">
                                <a href="<?php echo site_url('transaction/redeem'); ?>" class="btn ewallet-quick-btn">
                                    <div class="ewallet-quick-btn-icon">
                                        &#8722;
                                    </div>
                                    <span>Redeem</span>
                                </a>
                            </div>
                            <div class="col-3">
                                <a href="<?php echo site_url('transactions'); ?>" class="btn ewallet-quick-btn">
                                    <div class="ewallet-quick-btn-icon">
                                        &#128221;
                                    </div>
                                    <span>Riwayat</span>
                                </a>
                            </div>
                            <div class="col-3">
                                <a href="#" class="btn ewallet-quick-btn">
                                    <div class="ewallet-quick-btn-icon">
                                        &#128176;
                                    </div>
                                    <span>Transfer</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ringkasan kecil -->
                <div class="ewallet-summary-row mb-3">
                    <span>Ringkasan aktivitas saldo Anda hari ini & transaksi terakhir.</span>
                </div>
            </div>
            
            <div class="col-md-4">
                <!-- Promo Section -->
                <div class="ewallet-promo-section">
                    <div class="ewallet-promo-card">
                        <div class="ewallet-promo-title">Promo Spesial!</div>
                        <div class="ewallet-promo-desc">Dapatkan cashback 10% untuk top up pertama Anda</div>
                    </div>
                    
                    <!-- Fitur Tambahan -->
                    <div class="ewallet-feature-card">
                        <div class="ewallet-feature-icon">
                            &#128274;
                        </div>
                        <div class="ewallet-feature-title">Keamanan Terjamin</div>
                        <div class="ewallet-feature-desc">Transaksi Anda dilindungi dengan enkripsi tingkat tinggi</div>
                    </div>
                    
                    <div class="ewallet-feature-card">
                        <div class="ewallet-feature-icon">
                            &#128241;
                        </div>
                        <div class="ewallet-feature-title">Akses Mudah</div>
                        <div class="ewallet-feature-desc">Kelola keuangan Anda kapan saja dan di mana saja</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aktivitas / Riwayat Transaksi Terakhir -->
        <div class="row">
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <div class="ewallet-section-title mb-0">Aktivitas Terakhir</div>
                    <a href="<?php echo site_url('transactions'); ?>" style="font-size:0.8rem;">Lihat semua &raquo;</a>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <?php if (!empty($transactions)): ?>
                            <?php foreach ($transactions as $t): ?>
                                <div class="ewallet-activity-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="ewallet-activity-title">
                                            <?php if ($t->type == 'topup'): ?>
                                                <span class="badge badge-success mr-1" style="font-size:0.7rem;">TOP UP</span>
                                            <?php else: ?>
                                                <span class="badge badge-danger mr-1" style="font-size:0.7rem;">REDEEM</span>
                                            <?php endif; ?>
                                            <?php echo htmlspecialchars($t->description ?: 'Transaksi saldo'); ?>
                                        </div>
                                        <div class="ewallet-activity-meta">
                                            <?php echo htmlspecialchars($t->trx_code); ?> &bull;
                                            <?php echo $t->created_at; ?>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <?php
                                            $sign = $t->type == 'topup' ? '+' : '-';
                                            $class = $t->type == 'topup'
                                                ? 'ewallet-amount-positive'
                                                : 'ewallet-amount-negative';
                                        ?>
                                        <div class="<?php echo $class; ?>">
                                            <?php echo $sign . ' Rp ' . number_format($t->amount, 0, ',', '.'); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="text-center text-muted py-4" style="font-size:0.9rem;">
                                Belum ada transaksi. Yuk mulai dengan <a href="<?php echo site_url('transaction/topup'); ?>">Top Up saldo</a>.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>