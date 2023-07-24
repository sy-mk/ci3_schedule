<?php

class M_Operational_vehicle extends CI_Model
{
    private function _getColor($id_kendaraan)
    {
        if ($id_kendaraan == '2') {
            return "#0C471A";
        } else if ($id_kendaraan == 3) {
            return "#1A948E";
        } else if ($id_kendaraan == 7) {
            return "#803565";
        } else if ($id_kendaraan == 14) {
            return "#231144";
        } else if ($id_kendaraan == 16) {
            return "#903DD5";
        } else if ($id_kendaraan == 19) {
            return "#1EA42B";
        } else if ($id_kendaraan == 20) {
            return "#455071";
        } else if ($id_kendaraan == 21) {
            return "#A76D10";
        }
        return "#3788d8";
    }

    public function getVehicleEvent($vehicle_id)
    {
        $this->db->select('operational_vehicle.*, tbl_kendaraan.deskripsi_kendaraan, tbl_kendaraan.plat_nomor, tbl_user.nama_user, tbl_user.divisi');
        $this->db->from('operational_vehicle');
        $this->db->join('tbl_kendaraan', 'tbl_kendaraan.id_kendaraan = operational_vehicle.id_kendaraan', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_user = operational_vehicle.id_petugas', 'left');
        if ($vehicle_id != "all") {
            $this->db->where('operational_vehicle.id_kendaraan', $vehicle_id);
        }
        $data = $this->db->get()->result_array();

        foreach ($data as $row) {
            $divisi = $row['divisi'];
            $deskripsi_kendaraan = $row['deskripsi_kendaraan'] . " (" . $row['plat_nomor'] . ")";
            $start_event = $row['start_event'];
            $start = date('Y-m-d', strtotime($row['start_event']));
            $hour = date('H:i:s', strtotime($row['start_event']));
            $end = date('Y-m-d', strtotime($row['end_event'] . "+1 days"));
            $end_event = $row['end_event'];
            $keterangan = $row['keterangan'];
            $id_petugas = $row['id_petugas'];
            $nama_user = $row['nama_user'];
            $color = $this->_getColor($row['id_kendaraan']);

            if ($deskripsi_kendaraan != "") {
                $r = "<tr><td>Kendaraan</td><td>&nbsp:&nbsp</td><td>$deskripsi_kendaraan</td></tr>";
            } else {
                $r = "";
            }

            $title = $divisi . "_" . $deskripsi_kendaraan . "_" . date('d-M-y H:i', strtotime($start_event)) . " s/d " . date('d-M-y H:i', strtotime($end_event)) . "_" . $keterangan;
            $pop_up_title = date('d-M-y H:i', strtotime($start_event)) . " - " . date('d-M-y H:i', strtotime($end_event));
            $pop_up_content = "
            <table>
            <tr>
                <td>Dibuat Oleh</td>
                <td>&nbsp:&nbsp</td>
                <td>$nama_user</td>
            </tr>
                <tr>
                    <td>Digunakan Oleh</td>
                    <td>&nbsp:&nbsp</td>
                    <td>$divisi</td>
                </tr>$r
                <tr>
                    <td>Keperluan</td>
                    <td>&nbsp:&nbsp</td>
                    <td>$keterangan</td>
                </tr>
            </table>
            ";

            $data[] = array(
                "id" => $row['id_operational_vehicle'],
                "id_kendaraan" => $row['id_kendaraan'],
                "title" => $title,
                "start" => $start,
                "hour" => $hour,
                "end" => $end,
                "color" => $color,
                "id_petugas" => $id_petugas,
                "pop_up_title" => $pop_up_title,
                "pop_up_content" => $pop_up_content,
            );
        }

        return $data;
    }

    public function getListDivisi()
    {
        $list_divisi = ['Accounting', 'HR', 'GA', 'IT'];
        $data = [];

        foreach ($list_divisi as $divisi) {
            $data[] = ['divisi' => $divisi];
        }

        return $data;
    }

    public function getVehicle($vehicle_id)
    {
        $this->db->select('id_kendaraan, deskripsi_kendaraan');
        $this->db->from('tbl_kendaraan');
        $this->db->where('id_kendaraan', $vehicle_id);

        return $this->db->get()->row_array();
    }

    public function getListVehicle($vehicle_id = NULL)
    {
        $this->db->select('id_kendaraan, deskripsi_kendaraan, plat_nomor, kondisi');
        $this->db->from('tbl_kendaraan');
        if ($vehicle_id != 'all') {
            $this->db->where('id_kendaraan', $vehicle_id);
        }

        $data = $this->db->get()->result_array();
        if ($vehicle_id != 'all') {
            $data[] = [
                'id_kendaraan' => 'all',
                'deskripsi_kendaraan' => 'Semua Kendaraan',
                'plat_nomor' => '-'
            ];
        }

        return $data;
    }

    public function getEventDetails($id_operational_vehicle)
    {
        $this->db->select('operational_vehicle.*, tbl_kendaraan.deskripsi_kendaraan, tbl_user.nama_user, tbl_user.divisi');
        $this->db->from('operational_vehicle');
        $this->db->join('tbl_kendaraan', 'tbl_kendaraan.id_kendaraan = operational_vehicle.id_kendaraan', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_user = operational_vehicle.id_petugas', 'left');
        $this->db->where('id_operational_vehicle', $id_operational_vehicle);
        $row = $this->db->get()->row_array();

        $start_event = $row['start_event'];
        if (substr($row['start_event'], -1) == "1") {
            $start_event = date('Y-m-d H:i:s', strtotime('-1 seconds', strtotime($row['start_event'])));
        }
        $end_event = $row['end_event'];
        $id_petugas = $row['id_petugas'];

        if (getDivisi() !== 'IT' && getDivisi() !== 'HRD' && getNoID() !== $id_petugas) {
            $row['id_operational_vehicle'] = 0;
        }

        $data = [
            'id_operational_vehicle' => $row['id_operational_vehicle'],
            'id_kendaraan' => $row['id_kendaraan'],
            'mulai_pemakaian' => $start_event,
            'selesai_pemakaian' => $end_event,
            'keperluan' => $row['keterangan'],
        ];

        return $data;
    }

    public function addEvent()
    {
        if ($this->input->post('mulai_pemakaian') && $this->input->post('selesai_pemakaian')) {
            $id_kendaraan = $this->input->post('id_kendaraan');
            $start_event = date('Y-m-d H:i:s', strtotime('+1 seconds', strtotime($this->input->post('mulai_pemakaian'))));
            $end_event = $this->input->post('selesai_pemakaian');
            $keperluan = $this->input->post('keperluan');
            $added_time = date('Y-m-d H:i:s');
            $id_petugas = getNoID();
            $event = [];

            $this->db->select('operational_vehicle.*, tbl_kendaraan.deskripsi_kendaraan, tbl_user.nama_user, tbl_user.divisi');
            $this->db->from('operational_vehicle');
            $this->db->join('tbl_kendaraan', 'tbl_kendaraan.id_kendaraan = operational_vehicle.id_kendaraan');
            $this->db->join('tbl_user', 'tbl_user.id_user = operational_vehicle.id_petugas', 'left');
            $this->db->where('operational_vehicle.id_kendaraan', $id_kendaraan);
            $this->db->where('operational_vehicle.start_event <=', $start_event);
            $this->db->where('operational_vehicle.end_event >=', $start_event);
            $check_event = $this->db->get()->result_array();

            if ($check_event) {
                foreach ($check_event as $rows) {
                    $event[] = [
                        'id_operational_vehicle' => $rows['id_operational_vehicle'],
                        'divisi' => $rows['divisi'],
                        'id_kendaraan' => $rows['id_kendaraan'],
                        'deskripsi_kendaraan' => $rows['deskripsi_kendaraan'],
                        'start_event' => $rows['start_event'],
                        'end_event' => $rows['end_event'],
                        'keperluan' => $rows['keterangan'],
                        'nama_user' => $rows['nama_user'],
                    ];
                }

                $data['failed'] = true;
                $data['message'] = 'Failed!';
                $data['event'] = $event;

                echo json_encode($data);
            } else {
                $array = [
                    'start_event' => $start_event,
                    'end_event' => $end_event,
                    'id_kendaraan' => $id_kendaraan,
                    'keterangan' => $keperluan,
                    'added_time' => $added_time,
                    'id_petugas' => $id_petugas
                ];
                $this->db->insert('operational_vehicle', $array);

                $data['success'] = true;
                $data['message'] = 'Success!';
                responseCreateSuccess();

                echo json_encode($data);
            }
        }
    }

    public function editEvent()
    {
        if ($this->input->post('mulai_pemakaian') && $this->input->post('selesai_pemakaian')) {
            $id_operational_vehicle_edit = $this->input->post('id_operational_vehicle_edit');
            $id_kendaraan = $this->input->post('id_kendaraan');
            $start_event = date('Y-m-d H:i:s', strtotime('+1 seconds', strtotime($this->input->post('mulai_pemakaian'))));
            $end_event = $this->input->post('selesai_pemakaian');
            $keperluan = $this->input->post('keperluan');
            $edited_time = date('Y-m-d H:i:s');
            $id_petugas = getNoID();
            $event = [];

            $this->db->select('operational_vehicle.*, tbl_kendaraan.deskripsi_kendaraan, tbl_user.nama_user, tbl_user.divisi');
            $this->db->from('operational_vehicle');
            $this->db->join('tbl_kendaraan', 'tbl_kendaraan.id_kendaraan = operational_vehicle.id_kendaraan');
            $this->db->join('tbl_user', 'tbl_user.id_user = operational_vehicle.id_petugas', 'left');
            $this->db->where('operational_vehicle.id_operational_vehicle !=', $id_operational_vehicle_edit);
            $this->db->where('operational_vehicle.id_kendaraan', $id_kendaraan);
            $this->db->where('operational_vehicle.start_event <=', $start_event);
            $this->db->where('operational_vehicle.end_event >=', $start_event);
            $check_event = $this->db->get()->result_array();

            if ($this->input->post('status') != "CANCEL" && $check_event) {
                foreach ($check_event as $rows) {
                    $event[] = [
                        'divisi' => $rows['divisi'],
                        'deskripsi_kendaraan' => $rows['deskripsi_kendaraan'],
                        'start_event' => $rows['start_event'],
                        'end_event' => $rows['end_event'],
                        'keperluan' => $rows['keterangan'],
                        'id_petugas' => $rows['id_petugas'],
                        'nama_user' => $rows['nama_user'],
                    ];
                }

                $data['failed'] = true;
                $data['message'] = 'Failed!';
                $data['event'] = $event;

                echo json_encode($data);
            } else if ($this->input->post('status') != "CANCEL") {
                //Jika status tidak sama dengan cancel jalankan seperti biasa
                $array = [
                    'id_kendaraan' => $id_kendaraan,
                    'keterangan' => $keperluan,
                    'start_event' => $start_event,
                    'end_event' => $end_event,
                    'edited_time' => $edited_time,
                    'id_petugas_edit' => $id_petugas
                ];

                $this->db->where('id_operational_vehicle', $id_operational_vehicle_edit);
                $this->db->update('operational_vehicle', $array);
                $data['success'] = true;
                $data['message'] = 'Success!';
                responseUpdateSuccess();

                echo json_encode($data);
            } else {
                //Jalankan perintah hapus
                $this->db->where('id_operational_vehicle', $id_operational_vehicle_edit);
                $this->db->delete('operational_vehicle');
                $data['success'] = true;
                $data['message'] = 'Success!';
                responseDeleteSuccess();

                echo json_encode($data);
            }
        }
    }

    private function _setTodayEvent($vehicle_id, $date)
    {
        $selected_date = "CURDATE()";
        if ($date) {
            $selected_date = $date;
        }

        $this->db->select('operational_vehicle.*, tbl_kendaraan.deskripsi_kendaraan, tbl_kendaraan.plat_nomor, tbl_user.nama_user');
        $this->db->from('operational_vehicle');
        $this->db->join('tbl_kendaraan', 'tbl_kendaraan.id_kendaraan  = operational_vehicle.id_kendaraan', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_user = operational_vehicle.id_petugas', 'left');
        $this->db->where("$selected_date >= DATE(operational_vehicle.start_event)");
        $this->db->where("$selected_date <= DATE(operational_vehicle.end_event)");
        if ($vehicle_id != "all") {
            $this->db->where('tbl_kendaraan.id_kendaraan ', $vehicle_id);
        }
        $this->db->order_by('operational_vehicle.start_event');

        return $this->db->get()->result_array();
    }

    private function _setTodayEventCount($vehicle_id, $date)
    {
        $selected_date = "CURDATE()";
        if ($date) {
            $selected_date = $date;
        }

        $this->db->select('operational_vehicle.id_kendaraan ');
        $this->db->from('operational_vehicle');
        $this->db->join('tbl_kendaraan', 'tbl_kendaraan.id_kendaraan  = operational_vehicle.id_kendaraan', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_user = operational_vehicle.id_petugas');
        $this->db->where("$selected_date >= DATE(operational_vehicle.start_event)");
        $this->db->where("$selected_date <= DATE(operational_vehicle.end_event)");
        if ($vehicle_id != "all") {
            $this->db->where('tbl_kendaraan.id_kendaraan ', $vehicle_id);
        }
        $this->db->order_by('operational_vehicle.start_event');

        return $this->db->get()->num_rows();
    }

    public function getTodayEvent($vehicle_id, $date)
    {
        $data['result'] = $this->_setTodayEvent($vehicle_id, $date);
        $data['count'] = $this->_setTodayEventCount($vehicle_id, $date);

        return $data;
    }

    public function getThisMonthEvent($vehicle_id)
    {
        $this->db->select('operational_vehicle.*, tbl_kendaraan.deskripsi_kendaraan, tbl_kendaraan.plat_nomor, tbl_user.nama_user');
        $this->db->from('operational_vehicle');
        $this->db->join('tbl_kendaraan', 'tbl_kendaraan.id_kendaraan  = operational_vehicle.id_kendaraan', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_user = operational_vehicle.id_petugas', 'left');
        $this->db->where('DATE(operational_vehicle.end_event) >=', date('Y-m-d'));
        $this->db->where('DATE(operational_vehicle.end_event) <=', date('Y-m-t'));
        if ($vehicle_id != "all") {
            $this->db->where('tbl_kendaraan.id_kendaraan', $vehicle_id);
        }
        $this->db->order_by('operational_vehicle.start_event');

        return $this->db->get()->result_array();
    }

    public function getVehicleName($vehicle_id)
    {
        if ($vehicle_id != "all") {
            $this->db->select('deskripsi_kendaraan, plat_nomor');
            $this->db->from('tbl_kendaraan');
            $this->db->where('id_kendaraan', $vehicle_id);
            $data = $this->db->get()->row_array();

            return $data['deskripsi_kendaraan'] . " (" . $data['plat_nomor'] . ")";
        }
        return "Semua Kendaraan";
    }

    public function getSelectedDate($selected_date, $vehicle_id)
    {
        $this->db->select('operational_vehicle.*, tbl_kendaraan.deskripsi_kendaraan, tbl_user.nama_user');
        $this->db->from('operational_vehicle');
        $this->db->join('tbl_kendaraan', 'tbl_kendaraan.id_kendaraan  = operational_vehicle.id_kendaraan', 'left');
        $this->db->join('tbl_user', 'tbl_user.id_user = operational_vehicle.id_petugas', 'left');
        $this->db->where('DATE(operational_vehicle.start_event) <=', $selected_date);
        $this->db->where('DATE(operational_vehicle.end_event) >=', $selected_date);
        $this->db->where('tbl_kendaraan.id_kendaraan ', $vehicle_id);
        $this->db->order_by('operational_vehicle.start_event');
        $result = $this->db->get()->result_array();

        $data = [];
        foreach ($result as $row) {
            $data[] = [
                'id_operational_vehicle' => $row['id_operational_vehicle'],
                'nama_user' => $row['nama_user'],
                'start_event' => date('d-M-Y H:i', strtotime($row['start_event'])),
                'end_event' => date('d-M-Y H:i', strtotime($row['end_event'])),
                'keterangan' => $row['keterangan'],
            ];
        }

        return $data;
    }

    public function vehicleNameList($vehicle_id)
    {
        $this->db->select('id_kendaraan, deskripsi_kendaraan');
        $this->db->from('tbl_kendaraan');
        if ($vehicle_id !== 'all') {
            $this->db->where('tbl_kendaraan.id_kendaraan', $vehicle_id);
        }

        return $this->db->get()->result_array();
    }

    public function exportExcel($vehicle_id, $period = NULL)
    {
        $this->db->select('operational_vehicle.start_event, operational_vehicle.end_event, operational_vehicle.keterangan, operational_vehicle.id_petugas, tbl_kendaraan.id_kendaraan, tbl_kendaraan.deskripsi_kendaraan, tbl_kendaraan.plat_nomor, tbl_user.nama_user, tbl_user.divisi');
        $this->db->from('operational_vehicle');
        $this->db->join('tbl_kendaraan', 'tbl_kendaraan.id_kendaraan  = operational_vehicle.id_kendaraan');
        $this->db->join('tbl_user', 'tbl_user.id_user = operational_vehicle.id_petugas', 'left');
        if ($period === 'prev_month') {
            $this->db->where('MONTH(operational_vehicle.start_event) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)');
        } else if ($period === 'curr_month') {
            $this->db->where('MONTH(operational_vehicle.start_event) = MONTH(CURRENT_DATE)');
        } else if ($period === 'next_month') {
            $this->db->where('MONTH(operational_vehicle.start_event) = MONTH(CURRENT_DATE + INTERVAL 1 MONTH)');
        } else if ($period === 'prev_year') {
            $this->db->where('YEAR(operational_vehicle.start_event) = YEAR(NOW()) - 1');
        } else if ($period === 'curr_year') {
            $this->db->where('YEAR(operational_vehicle.start_event) = YEAR(NOW())');
        } else if ($period === 'next_year') {
            $this->db->where('YEAR(operational_vehicle.start_event) = YEAR(NOW()) + 1');
        }

        if ($vehicle_id !== 'all') {
            $this->db->where('tbl_kendaraan.id_kendaraan', $vehicle_id);
        }
        $this->db->order_by('tbl_kendaraan.id_kendaraan', 'asc');

        $results = $this->db->get()->result_array();
        $data = [];

        foreach ($results as $result) {
            if ($result['id_kendaraan']) {
                $data[$result['id_kendaraan']][] = (object)$result;
            }
        }
        return (object)$data;
    }
}
