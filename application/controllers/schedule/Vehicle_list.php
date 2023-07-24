<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vehicle_list extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        isLoggedIn();
        $this->load->model('M_Menu');
        $this->load->model('schedule/M_Vehicle_list');
    }

    private function _get($getId = NULL)
    {
        return $this->M_Vehicle_list->getData($getId);
    }

    private function _setRules()
    {
        $this->form_validation->set_error_delimiters('<div class="badge badge-danger text-wrap mt-2">', '</div>');
        $this->form_validation->set_rules('deskripsi_kendaraan', 'Deskripsi Kendaraan', 'trim|required');
        $this->form_validation->set_rules('kondisi', 'Plat Nomor', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
    }

    public function index()
    {
        $page = 'schedule/vehicle_list/vehicle_list';
        $data['title'] = 'Daftar Kendaraan Operasional';
        $data['vehicle_list'] = $this->_get();

        $userdetail = $this->M_Menu->getUserdetail();
        $data['username'] = $userdetail['nama_user'];
        $data['divisi'] = $userdetail['divisi'];


        page($page, $data);
    }

    public function add()
    {
        $this->_setRules();

        if ($this->form_validation->run() === FALSE) {
            $page = 'schedule/vehicle_list/vehicle_list_add';
            $data['username'] = $userdetail['nama_user'];
            $data['divisi'] = $userdetail['divisi'];
            $data['title'] = 'Tambah Kendaraan';

            page($page, $data);
        } else {
            $this->M_Vehicle_list->insertData();

            responseSuccess();
            redirect('schedule/vehicle_list');
        }
    }

    public function edit()
    {
        $this->_setRules();
        $getId = $this->uri->segment(4);

        if ($this->form_validation->run() === FALSE) {
            $page = 'schedule/vehicle_list/vehicle_list_edit';
            $data['title'] = 'Edit Kendaraan';
            $data['result'] = $this->_get($getId);

            $userdetail = $this->M_Menu->getUserdetail();
            $data['id_user'] = $userdetail['id_user'];
            $data['username'] = $userdetail['nama_user'];
            $data['divisi'] = $userdetail['divisi'];

            page($page, $data);
        } else {
            $this->M_Vehicle_list->updateData($getId);

            responseSuccess();
            redirect('schedule/vehicle_list');
        }
    }

    public function delete()
    {
        redirect('schedule/vehicle_list');
        $this->_setRules();
        $getId = $this->uri->segment(4);

        if ($this->form_validation->run() === FALSE) {
            $page = 'schedule/vehicle_list/vehicle_list_delete';
            $data['title'] = 'Hapus Kendaraan';
            $data['result'] = $this->_get($getId);

            $userdetail = $this->M_Menu->getUserdetail();
            $data['id_user'] = $userdetail['id_user'];
            $data['username'] = $userdetail['nama_user'];
            $data['divisi'] = $userdetail['divisi'];

            page($page, $data);
        } else {
            $this->M_Vehicle_list->deleteData($getId);
            responseSuccess();
            redirect('schedule/vehicle_list');
        }
    }
}
