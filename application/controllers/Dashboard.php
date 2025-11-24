<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

        $data['full_name'] = $this->session->userdata('full_name');
        $data['balance']   = $this->Member_model->get_balance($user_id);
        $data['sum_topup'] = $this->Transaction_model->sum_topup($user_id);
        $data['sum_redeem'] = $this->Transaction_model->sum_redeem($user_id);
        $data['transactions'] = $this->Transaction_model->get_by_user($user_id, 5, 0); // 5 terakhir

        $this->load->view('layouts/header');
        $this->load->view('member/dashboard', $data);
        $this->load->view('layouts/footer');
    }
}
