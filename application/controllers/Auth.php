<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        loggedIn();

        //login rules
        $this->form_validation->set_error_delimiters('<div class="badge badge-danger text-wrap ml-1 mt-2 mb-2">', '</div>');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', [
            'min_length' => 'Password too short, minimum 6 characters!'
        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        } else {
            $this->load->model('M_Login');
            $user = $this->M_Login->get();

            if ($user) {
                $this->load->model('M_Login');
                $check = $this->M_Login->getUser();

                if ($check) {
                    $this->session->set_userdata('user_scheduler', $check['email']);
                    responseLogin();
                    redirect('main');
                } else {
                    responseWrongPassword();
                    redirect('auth');
                }
            } else {
                responseWrongEmail();
                redirect('auth');
            }
        }
    }

    public function logout($response = NULL)
    {
        $this->session->unset_userdata('user_scheduler');
        $this->session->unset_userdata('screen_width');
        $this->session->unset_userdata('screen_height');

        responseLogout();
        redirect('auth');
    }
}