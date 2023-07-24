<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Operational_vehicle extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        isLoggedIn();

        $this->load->model('M_Menu');
        $this->load->model('schedule/M_Operational_vehicle');
    }

    private function _today($vehicle_id, $date = NULL)
    {
        return $this->M_Operational_vehicle->getTodayEvent($vehicle_id, $date);
    }

    private function _thisMonth($vehicle_id)
    {
        return $this->M_Operational_vehicle->getThisMonthEvent($vehicle_id);
    }

    private function _vehicleName($vehicle_id)
    {
        return $this->M_Operational_vehicle->getVehicleName($vehicle_id);
    }

    public function selectedDate()
    {
        $vehicle_id = "";
        if ($this->input->get('id')) {
            $vehicle_id = $this->input->get('id');
        }
        $selected_date = date('Y-m-d', strtotime(date('Y-m-') . $this->input->post('selectedDate')));
        $data = $this->M_Operational_vehicle->getSelectedDate($selected_date, $vehicle_id);

        echo json_encode($data);
    }

    public function index()
    {
        $page = 'schedule/operational_vehicle/operational_vehicle';
        $data['title'] = 'Operational Vehicle';

        $userdetail = $this->M_Menu->getUserdetail();
        $data['username'] = $userdetail['nama_user'];
        $data['divisi'] = $userdetail['divisi'];
        $data['title'] = 'My Scheduler';
        $data['id_user'] = $userdetail['id_user'];
        $data['email'] = $userdetail['nama_user'];
        $data['divisi'] = $userdetail['divisi'];
        $data['today_event_all'] = $this->_today('all');
        $data['today_event1'] = $this->_today(2);
        $data['today_event2'] = $this->_today(3);
        $data['today_event3'] = $this->_today(7);
        $data['today_event4'] = $this->_today(14);
        $data['today_event5'] = $this->_today(16);
        $data['today_event6'] = $this->_today(19);
        $data['today_event7'] = $this->_today(20);
        $data['today_event8'] = $this->_today(21);

        page($page, $data);
    }

    public function vehicle()
    {
        $vehicle_id = "";
        if ($this->input->get('id')) {
            $vehicle_id = $this->input->get('id');
        }

        $page = 'schedule/operational_vehicle/vehicle_m';
        if (!isMobileResolution() || !getUserAgent()) {
            $page = 'schedule/operational_vehicle/vehicle';
        }
        $data['title'] = 'Operational Vehicle Schedule';

        $userdetail = $this->M_Menu->getUserdetail();
        $list_divisi = $this->M_Operational_vehicle->getListDivisi();
        $list_vehicle = $this->M_Operational_vehicle->getListVehicle($vehicle_id);
        $vehicle = $this->M_Operational_vehicle->getVehicle($vehicle_id);

        $data['today_event1'] = $this->_today($vehicle_id);
        $data['this_month_event'] = $this->_thisMonth($vehicle_id);
        $data['vehicle_name'] = $this->_vehicleName($vehicle_id);
        $data['username'] = $userdetail['nama_user'];
        $data['divisi'] = $userdetail['divisi'];
        $data['title'] = 'My Scheduler';
        $data['id_user'] = $userdetail['id_user'];
        $data['email'] = $userdetail['nama_user'];
        $data['divisi'] = $userdetail['divisi'];
        $data['list_divisi'] = $list_divisi;
        $data['list_vehicle'] = $list_vehicle;
        $data['vehicle'] = $vehicle;
        $data['vehicle_id'] = $vehicle_id;

        page($page, $data);
    }

    public function vehicle_event()
    {
        $vehicle_id = "";
        if ($this->input->get('id')) {
            $vehicle_id = $this->input->get('id');
        }
        $data = $this->M_Operational_vehicle->getVehicleEvent($vehicle_id);

        echo json_encode($data);
    }

    public function get()
    {
        $postData = $this->input->post();
        $data = $this->M_Operational_vehicle->getData($this->M_Menu->getUserdetail(), $postData);

        echo json_encode($data);
    }

    public function detail()
    {
        $postData = '';
        if ($this->input->post('id_event')) {
            $postData = $this->input->post('id_event');
        } elseif ($this->input->post('id_operational_vehicle_detail')) {
            $postData = $this->input->post('id_operational_vehicle_detail');
        }

        $data = $this->M_Operational_vehicle->getEventDetails($postData);

        echo json_encode($data);
    }

    public function add()
    {
        $this->M_Operational_vehicle->addEvent();
    }

    public function edit()
    {
        $this->M_Operational_vehicle->editEvent();
    }

    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet_title = "Operational Vehicle " . date('dmY His') . ".xlsx";
        $vehicle_id = "";
        $period = "";
        if ($this->input->get('id')) {
            $vehicle_id = $this->input->get('id');
        }
        if ($this->input->get('period')) {
            $period = $this->input->get('period');
        }
        $vehiclesNameList = $this->M_Operational_vehicle->vehicleNameList($vehicle_id);
        $lastVehicle = '';
        $sheet_index = 0;

        foreach ($vehiclesNameList as $vehicleList) {
            $worksheet = $spreadsheet->createSheet($sheet_index);
            $worksheet->setCellValue('A1', "NO");
            $worksheet->setCellValue('B1', "KENDARAAN");
            $worksheet->setCellValue('C1', "PLAT NOMOR");
            $worksheet->setCellValue('D1', "DARI");
            $worksheet->setCellValue('E1', "SAMPAI");
            $worksheet->setCellValue('F1', "PEMAKAI");
            $worksheet->setCellValue('G1', "DIVISI");
            $worksheet->setCellValue('H1', "KEPERLUAN");
            //column width
            $worksheet->getColumnDimension('A')->setWidth(5);
            $worksheet->getColumnDimension('B')->setWidth(15);
            $worksheet->getColumnDimension('C')->setWidth(25);
            $worksheet->getColumnDimension('D')->setWidth(20);
            $worksheet->getColumnDimension('E')->setWidth(30);
            $worksheet->getColumnDimension('F')->setWidth(30);
            $worksheet->getColumnDimension('G')->setWidth(30);
            $worksheet->getColumnDimension('H')->setWidth(30);
            //additional properties
            $worksheet->getDefaultRowDimension()->setRowHeight(-1);
            $worksheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
            $worksheet->setTitle($sheet_index + 1 . "-" . "$vehicleList[deskripsi_kendaraan]");

            if ($lastVehicle != $vehicleList['id_kendaraan']) {
                $no = 1;
                $numrow = 2;
            }
            $vehicle = $this->M_Operational_vehicle->exportExcel($vehicle_id, $period);
            if (count((array)$vehicle)) {
                foreach ($vehicle->{$vehicleList['id_kendaraan']} as $data) {
                    $worksheet->setCellValue('A' . $numrow, $no);
                    $worksheet->setCellValue('B' . $numrow, $data->deskripsi_kendaraan);
                    $worksheet->setCellValue('C' . $numrow, $data->plat_nomor);
                    $worksheet->setCellValue('D' . $numrow, $data->start_event);
                    $worksheet->setCellValue('E' . $numrow, $data->end_event);
                    $worksheet->setCellValue('F' . $numrow, $data->nama_user);
                    $worksheet->setCellValue('G' . $numrow, $data->divisi);
                    $worksheet->setCellValue('H' . $numrow, $data->keterangan);

                    $no++;
                    $numrow++;
                }
            }
            $lastVehicle = $vehicleList['id_kendaraan'];
            $sheet_index++;
        }
        $spreadsheet->setActiveSheetIndex(0);
        $spreadsheet->removeSheetByIndex($spreadsheet->getSheetCount() - 1);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;' . 'filename=' . $spreadsheet_title);
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
