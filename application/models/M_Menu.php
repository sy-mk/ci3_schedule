<?php

class M_Menu extends CI_Model
{
    public function getUserdetail()
    {
        $this->db->select('id_user, nama_user, divisi');
        $this->db->where('email', $this->session->userdata('user_scheduler'));
        $result = $this->db->get('tbl_user')->row_array();

        return $result;
    }

    private function _getUserDivisi()
    {
        $this->db->select('divisi');
        $this->db->where('email', $this->session->userdata('user_scheduler'));
        $result = $this->db->get('tbl_user')->row_array();

        return $result['divisi'];
    }

    public function getUserAccess()
    {
        if ($this->_getUserDivisi() === "IT") {
            return TRUE;
        }
        return FALSE;
    }

    public function getUserAvatar()
    {
        return base_url('assets/dist/img/user.jpg');
    }
}
