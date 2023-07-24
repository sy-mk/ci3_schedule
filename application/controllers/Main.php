<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        isLoggedIn();
    }

    public function index()
    {
        $page = 'pages/index';

        $this->load->model('M_Menu');
        $userdetail = $this->M_Menu->getUserdetail();
        $data['username'] = $userdetail['nama_user'];
        $data['divisi'] = $userdetail['divisi'];
        $data['title'] = 'My Scheduler';
        page($page, $data);
    }
}
