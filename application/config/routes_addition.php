<?php
// Tambahkan isi file ini ke application/config/routes.php Anda

$route['default_controller'] = 'Auth/login';
$route['login'] = 'Auth/login';
$route['register'] = 'Auth/register';
$route['logout'] = 'Auth/logout';

$route['dashboard'] = 'Dashboard/index';

$route['transaction/topup']  = 'Transaction/topup';
$route['transaction/redeem'] = 'Transaction/redeem';
$route['transactions']       = 'Transaction/index';
