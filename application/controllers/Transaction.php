<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $this->load->model('Member_model');
        $this->load->model('Transaction_model');
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $data['transactions'] = $this->Transaction_model->get_by_user($user_id);

        $this->load->view('layouts/header');
        $this->load->view('member/transaction_list', $data);
        $this->load->view('layouts/footer');
    }

    public function topup()
    {
        $user_id = $this->session->userdata('user_id');

        if ($this->input->post()) {
            $amount = floatval($this->input->post('amount'));
            if ($amount <= 0) {
                $data['error'] = 'Nominal topup tidak valid.';
            } else {
                $current_balance = $this->Member_model->get_balance($user_id);
                $new_balance = $current_balance + $amount;

                $trx_data = [
                    'user_id'   => $user_id,
                    'trx_code'  => 'TOPUP-' . time(),
                    'type'      => 'topup',
                    'amount'    => $amount,
                    'description' => 'Topup saldo'
                ];
                $this->Transaction_model->create_transaction($trx_data);

                $this->Member_model->update_balance($user_id, $new_balance);

                $this->session->set_flashdata('success', 'Topup berhasil.');
                redirect('dashboard');
            }
        }

        $data['balance'] = $this->Member_model->get_balance($user_id);

        $this->load->view('layouts/header');
        $this->load->view('member/topup_form', isset($data) ? $data : NULL);
        $this->load->view('layouts/footer');
    }

    public function redeem()
    {
        $user_id = $this->session->userdata('user_id');

        if ($this->input->post()) {
            $amount = floatval($this->input->post('amount'));
            if ($amount <= 0) {
                $data['error'] = 'Nominal redeem tidak valid.';
            } else {
                $current_balance = $this->Member_model->get_balance($user_id);
                if ($amount > $current_balance) {
                    $data['error'] = 'Saldo tidak mencukupi.';
                } else {
                    $new_balance = $current_balance - $amount;

                    $trx_data = [
                        'user_id'   => $user_id,
                        'trx_code'  => 'RDM-' . time(),
                        'type'      => 'redeem',
                        'amount'    => $amount,
                        'description' => 'Redeem / penggunaan saldo'
                    ];
                    $this->Transaction_model->create_transaction($trx_data);

                    $this->Member_model->update_balance($user_id, $new_balance);

                    $this->session->set_flashdata('success', 'Redeem berhasil.');
                    redirect('dashboard');
                }
            }
        }

        $data['balance'] = $this->Member_model->get_balance($user_id);

        $this->load->view('layouts/header');
        $this->load->view('member/redeem_form', isset($data) ? $data : NULL);
        $this->load->view('layouts/footer');
    }
}
