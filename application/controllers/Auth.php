<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function login()
    {
        if ($this->session->userdata('user_id')) {
            redirect('dashboard');
        }

        if ($this->input->post()) {
            $email    = $this->input->post('email', TRUE);
            $password = $this->input->post('password', TRUE);

            $user = $this->User_model->get_by_email($email);
            if ($user && $user->password == md5($password)) {
                $this->session->set_userdata([
                    'user_id'   => $user->id,
                    'full_name' => $user->full_name,
                    'email'     => $user->email,
                    'type'      => $user->type,
                    'logged_in' => TRUE
                ]);
                redirect('dashboard');
            } else {
                $data['error'] = 'Email atau password salah';
            }
        }

        $this->load->view('layouts/header');
        $this->load->view('auth/login', isset($data) ? $data : NULL);
        $this->load->view('layouts/footer');
    }

    public function register()
    {
        if ($this->session->userdata('user_id')) {
            redirect('dashboard');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('type', 'Jenis Member', 'required');

            if ($this->form_validation->run() == TRUE) {
                $data_insert = [
                    'full_name' => $this->input->post('full_name', TRUE),
                    'email'     => $this->input->post('email', TRUE),
                    'password'  => md5($this->input->post('password', TRUE)),
                    'type'      => $this->input->post('type', TRUE),
                ];
                $this->User_model->create_member($data_insert);
                $this->session->set_flashdata('success', 'Pendaftaran berhasil, silakan login.');
                redirect('login');
            }
        }

        $this->load->view('layouts/header');
        $this->load->view('auth/register');
        $this->load->view('layouts/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
