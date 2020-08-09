<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Access extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $employee_code = $this->session->userdata('employee_code');
        $employee_name = $this->session->userdata('employee_name');
        $employee_email = $this->session->userdata('employee_email');
        $department = $this->session->userdata('department');

        if ($employee_code == NULL && $employee_name == NULL && $employee_email == NULL && $department == NULL) {
            redirect('admin', 'refresh');
        }
    }

    public function index() {
        $data['title'] = 'Dashboard';
        $data['maincontent'] = $this->load->view('dashboard', '', true);
        $this->load->view('master', $data);
    }

    public function input_data() {
        $data['title'] = 'Input Utility Status';
        $data['maincontent'] = $this->load->view('input_data', '', true);
        $this->load->view('master', $data);
    }

    public function update_data() {
        $data['title'] = 'Update Utility Status';

        $date = date('Y-m-d');
        $date_plus_1 = date('Y-m-d', strtotime($date . ' -2 day'));

        $inputed_time_ids = '';
        if($date != '1970-01-01' && $date_plus_1 != '1970-01-01'){
            $data_1['result'] = $this->access_model->getInputedTimes($date, $date_plus_1);
        }

        $data['maincontent'] = $this->load->view('update_data', $data_1, true);
        $this->load->view('master', $data);
    }

    public function getRestData(){
        $dt = $this->input->post("date");
        $date = date('Y-m-d', strtotime($dt));
        $date_plus_1 = date('Y-m-d', strtotime($dt . ' +1 day'));

        $inputed_time_ids = '';
        if($date != '1970-01-01'){
            $result_1 = $this->access_model->getInputedTimeId($date, $date_plus_1);
            if( !empty($result_1)) {
                $inputed_time_ids = $result_1[0]['inputed_time'];
            }
            $result_2 = $this->access_model->getNotInputedTimes($inputed_time_ids);

            $i=0;
            $sl=1;
            $new_line = '';

            foreach ($result_2 as $v){

                if($v['status'] == 'current'){
                    $data_date = $date;
                }
                if($v['status'] == 'next'){
                    $data_date = $date_plus_1;
                }

                $new_line .= '<tr style="padding: 0px;" class="center">';

                $new_line .= '<td style="padding: 0px; width: 80px;">' . $v['time'] .'<input type="hidden" value="'. $v['id'] .'" name="time[]" id="time'. $i .'"><input type="hidden" value="'. $data_date .'" name="data_date[]" id="data_date'. $i .'"></td>';
                $new_line .= '<td style="padding: 0px; width: 80px;">' . $data_date .'</td>';
                $new_line .= '<td style="padding: 0px; width: 80px;"><input type="text" style="width: 80px;" name="generator_gas_pressure[]" id="generator_gas_pressure'. $i .'" onkeyup="checkGeneratorGasPressure('. $i .', id);"></td>';
                $new_line .= '<td style="padding: 0px; width: 80px;"><input type="text" style="width: 80px;" name="gen_1[]" id="gen_1'. $i .'" onkeyup="checkGenerator01('. $i .', id);"></td>';
                $new_line .= '<td style="padding: 0px; width: 80px;"><input type="text" style="width: 80px;" name="gen_3[]" id="gen_3'. $i .'" onkeyup="checkGenerator03('. $i .', id);"></td>';
                $new_line .= '<td style="padding: 0px; width: 80px;"><input type="text" style="width: 80px;" name="gen_4[]" id="gen_4'. $i .'" onkeyup="checkGenerator04('. $i .', id);"></td>';
                $new_line .= '<td style="padding: 0px; width: 80px;"><input type="text" style="width: 80px;" name="gen_2[]" id="gen_2'. $i .'" onkeyup="checkGenerator02('. $i .', id);"></td>';
                $new_line .= '<td style="border-right: 2px solid blue; padding: 0px; width: 80px;"><input type="text" style="width: 80px;" name="gen_remarks[]" id="gen_remarks'. $i .'"></td>';
                $new_line .= '<td style="padding: 0px; width: 80px;"><input type="text" style="width: 80px;" name="boil_steam_gas_pressure[]" id="boil_steam_gas_pressure'. $i .'" onkeyup="checkBoilGasPressure('. $i .', id);"></td>';
                $new_line .= '<td style="padding: 0px; width: 80px;"><input type="text" style="width: 80px;" name="boiler_1[]" id="boiler_1'. $i .'" onkeyup="checkBoiler01('. $i .', id);"></td>';
                $new_line .= '<td style="padding: 0px; width: 80px;"><input type="text" style="width: 80px;" name="boiler_2[]" id="boiler_2'. $i .'" onkeyup="checkBoiler02('. $i .', id);"></td>';
//                $new_line .= '<td style="padding: 0px; width: 80px;"><input type="text" style="width: 80px;" name="boiler_3[]" id="boiler_3'. $i .'" onkeyup="checkBoiler03('. $i .', id);"></td>';
                $new_line .= '<td style="padding: 0px; width: 80px;"><input type="text" style="width: 80px;" name="boiler_4[]" id="boiler_4'. $i .'" onkeyup="checkBoiler04('. $i .', id);"></td>';
                $new_line .= '<td style="padding: 0px; width: 80px;"><input type="text" style="width: 80px;" name="boiler_remarks[]" id="boiler_remarks'. $i .'"></td>';

                $new_line .= '</tr>';

                $sl++;
                $i++;
            }

            echo $new_line;
        }

    }

    public function save_utility_data()
    {
        $dt = $this->input->post("date");
        $dt_string_split = explode("-", $dt);

        $dt_month = $dt_string_split[0];
        $dt_day = $dt_string_split[1];
        $dt_year = $dt_string_split[2];

        $date = date('Y-m-d', strtotime($dt_year . '-' . $dt_month . '-' . $dt_day));

        $data_dt = $this->input->post("data_date");
        $times = $this->input->post("time");

        $generator_gas_pressure = $this->input->post("generator_gas_pressure");
        $gen_1 = $this->input->post("gen_1");
        $gen_3 = $this->input->post("gen_3");
        $gen_4 = $this->input->post("gen_4");
        $gen_2 = $this->input->post("gen_2");
        $gen_remarks = $this->input->post("gen_remarks");
        $boil_steam_gas_pressure = $this->input->post("boil_steam_gas_pressure");
        $boiler_1 = $this->input->post("boiler_1");
        $boiler_2 = $this->input->post("boiler_2");
        //$boiler_3 = $this->input->post("boiler_3");
        $boiler_4 = $this->input->post("boiler_4");
        $boiler_remarks = $this->input->post("boiler_remarks");

        $data = array();
        $data_3 = array();

            foreach ($times as $key => $v) {
                $data_date = date('Y-m-d', strtotime($data_dt[$key]));

                $data['date'] = $data_date;
                $data['time_id'] = $times[$key];

                $data['generator_gas_pressure'] = $generator_gas_pressure[$key];
                $data['gen_1'] = $gen_1[$key];
                $data['gen_3'] = $gen_3[$key];
                $data['gen_4'] = $gen_4[$key];
                $data['gen_2'] = $gen_2[$key];
                $data['gen_remarks'] = $gen_remarks[$key];

                $data['boil_steam_gas_pressure'] = $boil_steam_gas_pressure[$key];
                $data['boiler_1'] = $boiler_1[$key];
                $data['boiler_2'] = $boiler_2[$key];
//                $data['boiler_3'] = $boiler_3[$key];
                $data['boiler_3'] = 0;
                $data['boiler_4'] = $boiler_4[$key];
                $data['boiler_remarks'] = $boiler_remarks[$key];
                $data['inserted_by'] = $this->session->userdata('employee_code');

                $datex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));
                $data['inserting_date_time'] = $datex->format('Y-m-d H:i:s');

                $insertion_res = $this->access_model->checkIsDataInputed($data_date, $times[$key]);

                if(empty($insertion_res)){
                    if (($data['generator_gas_pressure'] != '') || ($data['gen_1'] != '') || ($data['gen_3'] != '') || ($data['gen_4'] != '') || ($data['gen_2'] != '') || ($data['gen_remarks'] != '') || ($data['boil_steam_gas_pressure'] != '') || ($data['boiler_1'] != '') || ($data['boiler_2'] != '') || ($data['boiler_3'] != '') || ($data['boiler_4'] != '') || ($data['boiler_remarks'] != '')) {
                        $this->access_model->insertingData('tb_utility_data', $data);
                    }
                }
            }

        $data_1['message'] = 'Successfully Inserted!';
        $this->session->set_userdata($data_1);

        redirect('access/input_data', 'refresh');
    }

    public function update_utility_data()
    {
        $id = $this->input->post("id");

        $generator_gas_pressure = $this->input->post("generator_gas_pressure");
        $gen_1 = $this->input->post("gen_1");
        $gen_3 = $this->input->post("gen_3");
        $gen_4 = $this->input->post("gen_4");
        $gen_2 = $this->input->post("gen_2");
        $gen_remarks = $this->input->post("gen_remarks");
        $boil_steam_gas_pressure = $this->input->post("boil_steam_gas_pressure");
        $boiler_1 = $this->input->post("boiler_1");
        $boiler_2 = $this->input->post("boiler_2");
//        $boiler_3 = $this->input->post("boiler_3");
        $boiler_4 = $this->input->post("boiler_4");
        $boiler_remarks = $this->input->post("boiler_remarks");

        $data = array();

            foreach ($id as $key => $v) {
                $data['generator_gas_pressure'] = $generator_gas_pressure[$key];
                $data['gen_1'] = $gen_1[$key];
                $data['gen_3'] = $gen_3[$key];
                $data['gen_4'] = $gen_4[$key];
                $data['gen_2'] = $gen_2[$key];
                $data['gen_remarks'] = $gen_remarks[$key];
                $data['boil_steam_gas_pressure'] = $boil_steam_gas_pressure[$key];
                $data['boiler_1'] = $boiler_1[$key];
                $data['boiler_2'] = $boiler_2[$key];
//                $data['boiler_3'] = $boiler_3[$key];
                $data['boiler_3'] = 0;
                $data['boiler_4'] = $boiler_4[$key];
                $data['boiler_remarks'] = $boiler_remarks[$key];
                $data['updated_by'] = $this->session->userdata('employee_code');

                $datex = new DateTime(null, new DateTimeZone('ASIA/Dhaka'));
                $data['updating_date_time'] = $datex->format('Y-m-d H:i:s');

                if (($data['generator_gas_pressure'] != '') || ($data['gen_1'] != '') || ($data['gen_3'] != '') || ($data['gen_4'] != '') || ($data['gen_2'] != '') || ($data['gen_remarks'] != '') || ($data['boil_steam_gas_pressure'] != '') || ($data['boiler_1'] != '') || ($data['boiler_2'] != '') || ($data['boiler_3'] != '') || ($data['boiler_4'] != '') || ($data['boiler_remarks'] != '')) {
                    $this->access_model->updatingData('tb_utility_data', $data, $id[$key]);
                }

            }

        $data_1['message'] = 'Successfully Updated!';
        $this->session->set_userdata($data_1);

        redirect('access/update_data', 'refresh');
    }

    public function logout() {
        $this->session->unset_userdata('employee_code');
        $this->session->unset_userdata('employee_name');
        $this->session->unset_userdata('employee_email');
        $this->session->unset_userdata('department');
        session_destroy();
        $data['message'] = 'Successfully Logged Out!';
        $this->session->set_userdata($data);
        redirect('admin');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */