<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!isset($_SERVER['HTTP_REFERER'])) {
    $this->load->helper('url');
    redirect('/page404');
}

class Utils extends CI_Controller
{
    public function setScreenResolution()
    {
        $screen_width = $this->input->post('screen_width');
        $screen_height = $this->input->post('screen_height');

        $this->session->set_userdata('screen_width', $screen_width);
        $this->session->set_userdata('screen_height', $screen_height);
    }
}