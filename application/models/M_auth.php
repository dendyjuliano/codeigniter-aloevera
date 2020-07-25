<?php

class M_auth extends CI_Model
{
    public function register()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('name', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'image' => 'default.png',
            'role_id' => 3
        ];

        $this->db->insert('tb_customer', $data);
    }
}
