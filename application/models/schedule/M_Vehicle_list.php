<?php

class M_Vehicle_list extends CI_Model
{
    public function getData($getId)
    {
        $this->db->select('*');
        $this->db->from('tbl_kendaraan');
        if ($getId) {
            $this->db->where('id_kendaraan', $getId);
            return $this->db->get()->row_array();
        }

        return $this->db->get()->result_array();
    }

    public function getVehicle($vehicle_id)
    {
        $this->db->select('id_kendaraan, deskripsi_kendaraan');
        $this->db->from('tbl_kendaraan');
        $this->db->where('id_kendaraan', $vehicle_id);

        return $this->db->get()->row_array();
    }

    public function insertData()
    {
        $deskripsi_kendaraan = $this->input->post('deskripsi_kendaraan');
        $plat_nomor = $this->input->post('plat_nomor');
        $kondisi = $this->input->post('kondisi');
        $keterangan = $this->input->post('keterangan');
        $array = [
            'deskripsi_kendaraan' => $deskripsi_kendaraan,
            'plat_nomor' => $plat_nomor,
            'kondisi' => $kondisi,
            'keterangan' => $keterangan
        ];

        $this->db->insert('tbl_kendaraan', $array);
    }

    public function updateData($getId)
    {
        $deskripsi_kendaraan = $this->input->post('deskripsi_kendaraan');
        $plat_nomor = $this->input->post('plat_nomor');
        $kondisi = $this->input->post('kondisi');
        $keterangan = $this->input->post('keterangan');
        $array = [
            'deskripsi_kendaraan' => $deskripsi_kendaraan,
            'plat_nomor' => $plat_nomor,
            'kondisi' => $kondisi,
            'keterangan' => $keterangan,
        ];

        $this->db->where('id_kendaraan', $getId);
        $this->db->update('tbl_kendaraan', $array);
    }

    public function deleteData($getId)
    {
        $this->db->where('id_kendaraan', $getId);
        $this->db->delete('tbl_kendaraan');
    }
}