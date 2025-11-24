<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>E-Wallet Member</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
   
    <link rel="stylesheet"
          href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet"
          href="<?php echo base_url('assets/css/ewallet.css'); ?>">
    <style>
        body {
            background: #f3f4f6;
        }
        .ewallet-card {
            border-radius: 20px;
            background: linear-gradient(135deg, #1d4ed8, #3b82f6);
            color: #fff;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.35);
        }
        .ewallet-balance-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        .ewallet-balance {
            font-size: 2rem;
            font-weight: 700;
        }
        .navbar-custom {
            background: #111827;
        }
        .btn-rounded {
            border-radius: 999px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand navbar-dark navbar-custom">
    <a class="navbar-brand" href="<?php echo site_url('dashboard'); ?>">E-Wallet Member</a>
    <ul class="navbar-nav ml-auto">
        <?php if ($this->session->userdata('user_id')): ?>
            <li class="nav-item">
                <span class="navbar-text mr-3">
                    <?php echo htmlspecialchars($this->session->userdata('full_name')); ?>
                </span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('logout'); ?>">Logout</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>

<div class="container my-4">
