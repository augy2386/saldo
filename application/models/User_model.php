<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_by_email($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    public function create_member($data)
    {
        $this->db->insert('users', $data);
        $user_id = $this->db->insert_id();

        // Buat saldo awal 0
        $this->db->insert('member_balance', [
            'user_id' => $user_id,
            'balance' => 0
        ]);

        return $user_id;
    }
}
