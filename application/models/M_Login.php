<?php

class M_Login extends CI_Model
{

    private function _postData()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->db->where('email', $email);
        $this->db->from('tbl_user');
        $user = $this->db->get()->row_array();

        if (!$user || !password_verify($password, $user['password'])) {
            return FALSE;
        }
        return $user;
    }

    public function get()
    {
        if ($this->_postData()) {
            return TRUE;
        }
        return FALSE;
    }

    public function getUser()
    {
        $user = $this->_postData();

        if ($user) {
            $data = [
                'email' => $user['email']
            ];
            return $data;
        }
        return FALSE;
    }
}
