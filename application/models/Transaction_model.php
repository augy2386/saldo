<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {

    public function create_transaction($data)
    {
        $this->db->insert('transactions', $data);
        return $this->db->insert_id();
    }

    public function get_by_user($user_id, $limit = 50, $offset = 0)
    {
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get_where('transactions', ['user_id' => $user_id])->result();
    }

    public function sum_topup($user_id)
    {
        $this->db->select_sum('amount');
        $this->db->where('user_id', $user_id);
        $this->db->where('type', 'topup');
        $row = $this->db->get('transactions')->row();
        return $row ? $row->amount : 0;
    }

    public function sum_redeem($user_id)
    {
        $this->db->select_sum('amount');
        $this->db->where('user_id', $user_id);
        $this->db->where('type', 'redeem');
        $row = $this->db->get('transactions')->row();
        return $row ? $row->amount : 0;
    }
}
