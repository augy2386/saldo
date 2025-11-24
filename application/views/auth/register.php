

<style>
    .auth-page {
        max-width: 480px;
        margin: 0 auto;
    }
    .auth-bg {
        background: linear-gradient(160deg, #020617 0%, #0b1120 30%, #22c55e 100%);
        margin: -16px -15px 0 -15px;
        padding: 24px 20px 60px 20px;
        color: #e5e7eb;
        text-align: left;
    }
    .auth-logo-circle {
        width: 52px;
        height: 52px;
        border-radius: 999px;
        background: rgba(15, 23, 42, 0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.3rem;
        margin-bottom: 12px;
    }
    .auth-title {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 4px;
    }
    .auth-subtitle {
        font-size: 0.85rem;
        opacity: 0.85;
        max-width: 260px;
    }
    .auth-body {
        margin-top: -32px;
        padding-bottom: 32px;
    }
    .auth-card {
        background: #f9fafb;
        border-radius: 24px 24px 0 0;
        padding: 18px 18px 24px 18px;
        box-shadow: 0 -4px 18px rgba(15, 23, 42, 0.5);
    }
    .auth-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: #111827;
    }
    .auth-input, .auth-select {
        border-radius: 12px !important;
        height: 44px;
        font-size: 0.9rem;
    }
    .auth-btn {
        border-radius: 999px;
        height: 46px;
        font-weight: 600;
        font-size: 0.95rem;
    }
    .auth-helper {
        font-size: 0.8rem;
        text-align: center;
        margin-top: 10px;
    }
    .auth-small-text {
        font-size: 0.75rem;
        color: #6b7280;
        text-align: center;
        margin-top: 6px;
    }
    @media (min-width: 768px) {
        .auth-bg {
            border-radius: 0 0 32px 32px;
            margin-left: 0;
            margin-right: 0;
        }
        body {
            background: #020617;
        }
    }
</style>

<div class="auth-page">
    <div class="auth-bg">
        <div class="auth-logo-circle">
            <span>E</span>
        </div>
        <div class="auth-title">Daftar Akun Baru</div>
        <div class="auth-subtitle">
            Buat akun e-wallet untuk menyimpan saldo, transaksi, dan program loyalitas.
        </div>
    </div>

    <div class="auth-body">
        <div class="auth-card">

            <?php echo validation_errors('<div class="alert alert-danger py-2" style="font-size:0.85rem;">', '</div>'); ?>

            <form method="post">
                <div class="form-group">
                    <label class="auth-label">Nama Lengkap</label>
                    <input type="text"
                           name="full_name"
                           class="form-control auth-input"
                           value="<?php echo set_value('full_name'); ?>"
                           placeholder="Nama sesuai identitas"
                           required>
                </div>

                <div class="form-group">
                    <label class="auth-label">Email (untuk login)</label>
                    <input type="email"
                           name="email"
                           class="form-control auth-input"
                           value="<?php echo set_value('email'); ?>"
                           placeholder="alamat@email.com"
                           required>
                </div>

                <div class="form-group">
                    <label class="auth-label">Password</label>
                    <input type="password"
                           name="password"
                           class="form-control auth-input"
                           placeholder="Minimal 6 karakter"
                           required>
                </div>

                <div class="form-group">
                    <label class="auth-label">Jenis Member</label>
                    <select name="type" class="form-control auth-select" required>
                        <option value="">-- Pilih jenis member --</option>
                        <option value="member_toko_online" <?php echo set_select('type', 'member_toko_online'); ?>>
                            Member Toko Online
                        </option>
                        <option value="member_loyalitas" <?php echo set_select('type', 'member_loyalitas'); ?>>
                            Member Program Loyalitas
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success btn-block auth-btn mt-2">
                    Daftar Sekarang
                </button>
            </form>

            <div class="auth-helper">
                Sudah punya akun?
                <a href="<?php echo site_url('login'); ?>">Masuk di sini</a>
            </div>

            <div class="auth-small-text">
                Data akun digunakan untuk keperluan login dan pencatatan saldo member.
            </div>
        </div>
    </div>
</div>
