<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {

    public function get_balance($user_id)
    {
        $row = $this->db->get_where('member_balance', ['user_id' => $user_id])->row();
        if (!$row) {
            return 0;
        }
        return $row->balance;
    }

    public function update_balance($user_id, $new_balance)
    {
        $exists = $this->db->get_where('member_balance', ['user_id' => $user_id])->row();
        if ($exists) {
            $this->db->where('user_id', $user_id)
                     ->update('member_balance', ['balance' => $new_balance]);
        } else {
            $this->db->insert('member_balance', [
                'user_id' => $user_id,
                'balance' => $new_balance
            ]);
        }
    }
}
