<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index() {
        $data['title'] = 'Dashboard';

        $cur_date = date('Y-m-d');
        $pre_date = date('Y-m-d', strtotime($cur_date . ' -1 day'));

        $data['default_data'] = $this->dashboard_model->getDefaultTwoDaysReport($pre_date, $cur_date);
        $data['date_formatted_1'] = $pre_date;
        $data['nxt_date'] = $cur_date;

        $data['maincontent'] = $this->load->view('report/report_dashboard', $data, true);
        $this->load->view('report/report_master', $data);
    }

    public function utility_report_date_range() {
        $data['title'] = 'Dashboard';

        $cur_date = date('Y-m-d');
        $pre_date = date('Y-m-d', strtotime($cur_date . ' -1 day'));

        $data['default_data'] = $this->dashboard_model->getDefaultTwoDaysReport($pre_date, $cur_date);
        $data['date_formatted_1'] = $pre_date;
        $data['nxt_date'] = $cur_date;

        $data['maincontent'] = $this->load->view('report/report_dashboard_1', $data, true);
        $this->load->view('report/report_master', $data);
    }

    public function getReportByDate(){
        $date_1 = $this->input->post('date_formatted_1');

        $date_formatted_1 = date('Y-m-d', strtotime($date_1));
        $nxt_date = date('Y-m-d', strtotime($date_formatted_1 . ' +1 day'));

        $result = $this->dashboard_model->getDefaultOneDayReport($date_formatted_1, $nxt_date);

        $new_line = '';

        foreach ($result as $v){

            if($v['date'] == "$date_formatted_1" && $v['time_id'] <= 36){
                $new_line .= '<tr class="center">';

                $new_line .= '<td class="center" style="">' . $v['date'] .'</td>';
                $new_line .= '<td class="center" style="">' . $v['time'] .'</td>';

                if($v['generator_gas_pressure'] >= 8){
                $new_line .= '<td class="center" style="background-color: darkgreen; color: white;">'. $v['generator_gas_pressure'] .'</td>';
                }

                if($v['generator_gas_pressure'] >= 5.5 && $v['generator_gas_pressure'] <= 7.5){
                $new_line .= '<td class="center" style="background-color: yellow; color: balck;">'. $v['generator_gas_pressure'] .'</td>';
                }

                if($v['generator_gas_pressure'] < 5.5){
                $new_line .= '<td class="center" style="background-color: red; color: white;">'. $v['generator_gas_pressure'] .'</td>';
                }
                $new_line .= '<td class="center">'. $v['gen_1'] .'</td>';
                $new_line .= '<td class="center">'. $v['gen_3'] .'</td>';
                $new_line .= '<td class="center">'. $v['gen_4'] .'</td>';
                $new_line .= '<td class="center">'. $v['gen_2'] .'</td>';
                $new_line .= '<td class="center" style="border-right: 2px solid blue;">'. $v['gen_remarks'] .'</td>';


                if($v['boil_steam_gas_pressure'] >= 8){
                $new_line .= '<td class="center" style="background-color: darkgreen; color: white;">'. $v['boil_steam_gas_pressure'] .'</td>';
                }

                if($v['boil_steam_gas_pressure'] >= 5.5 && $v['boil_steam_gas_pressure'] <= 7.5){
                $new_line .= '<td class="center" style="background-color: yellow; color: balck;">'. $v['boil_steam_gas_pressure'] .'</td>';
                }

                if($v['boil_steam_gas_pressure'] < 5.5){
                $new_line .= '<td class="center" style="background-color: red; color: white;">'. $v['boil_steam_gas_pressure'] .'</td>';
                }

                if($v['boiler_1'] >= 3.5){
                $new_line .= '<td class="center" style="background-color: darkgreen; color: white;">'. $v['boiler_1'] .'</td>';
                }
                if($v['boiler_1'] >= 2.5 && $v['boiler_1'] < 3.5){
                $new_line .= '<td class="center" style="background-color: yellow; color: black;">'. $v['boiler_1'] .'</td>';
                }
                if($v['boiler_1'] < 2.5){
                $new_line .= '<td class="center" style="background-color: red; color: white;">'. $v['boiler_1'] .'</td>';
                }

                if($v['boiler_2'] >= 3.5){
                $new_line .= '<td class="center" style="background-color: darkgreen; color: white;">'. $v['boiler_2'] .'</td>';
                }
                if($v['boiler_2'] >= 2.5 && $v['boiler_2'] < 3.5){
                $new_line .= '<td class="center" style="background-color: yellow; color: black;">'. $v['boiler_2'] .'</td>';
                }
                if($v['boiler_2'] < 2.5){
                $new_line .= '<td class="center" style="background-color: red; color: white;">'. $v['boiler_2'] .'</td>';
                }

      //          if($v['boiler_3'] >= 3.5){
       //         $new_line .= '<td class="center" style="background-color: darkgreen; color: white;">'. $v['boiler_3'] .'</td>';
      //          }
       //         if($v['boiler_3'] >= 2.5 && $v['boiler_3'] < 3.5){
      //          $new_line .= '<td class="center" style="background-color: yellow; color: black;">'. $v['boiler_3'] .'</td>';
      //          }
      //          if($v['boiler_3'] < 2.5){
      //          $new_line .= '<td class="center" style="background-color: red; color: white;">'. $v['boiler_3'] .'</td>';
      //          }

                if($v['boiler_4'] >= 3.5){
                $new_line .= '<td class="center" style="background-color: darkgreen; color: white;">'. $v['boiler_4'] .'</td>';
                }
                if($v['boiler_4'] >= 2.5 && $v['boiler_4'] < 3.5){
                $new_line .= '<td class="center" style="background-color: yellow; color: black;">'. $v['boiler_4'] .'</td>';
                }
                if($v['boiler_4'] < 2.5){
                $new_line .= '<td class="center" style="background-color: red; color: white;">'. $v['boiler_4'] .'</td>';
                }
                $new_line .= '<td class="center" style="">'. $v['boiler_remarks'] .'</td>';

                $new_line .= '</tr>';
            }

            if($v['date'] == "$nxt_date" && $v['time_id'] >= 37 && $v['time_id'] <= 48){
                $new_line .= '<tr class="center">';

                $new_line .= '<td class="center" style="">' . $v['date'] .'</td>';
                $new_line .= '<td class="center" style="">' . $v['time'] .'</td>';

                if($v['generator_gas_pressure'] >= 8){
                $new_line .= '<td class="center" style="background-color: darkgreen; color: white;">'. $v['generator_gas_pressure'] .'</td>';
                }

                if($v['generator_gas_pressure'] >= 5.5 && $v['generator_gas_pressure'] <= 7.5){
                $new_line .= '<td class="center" style="background-color: yellow; color: balck;">'. $v['generator_gas_pressure'] .'</td>';
                }

                if($v['generator_gas_pressure'] < 5.5){
                $new_line .= '<td class="center" style="background-color: red; color: white;">'. $v['generator_gas_pressure'] .'</td>';
                }
                $new_line .= '<td class="center">'. $v['gen_1'] .'</td>';
                $new_line .= '<td class="center">'. $v['gen_3'] .'</td>';
                $new_line .= '<td class="center">'. $v['gen_4'] .'</td>';
                $new_line .= '<td class="center">'. $v['gen_2'] .'</td>';
                $new_line .= '<td class="center" style="border-right: 2px solid blue;">'. $v['gen_remarks'] .'</td>';


                if($v['boil_steam_gas_pressure'] >= 8){
                $new_line .= '<td class="center" style="background-color: darkgreen; color: white;">'. $v['boil_steam_gas_pressure'] .'</td>';
                }

                if($v['boil_steam_gas_pressure'] >= 5.5 && $v['boil_steam_gas_pressure'] <= 7.5){
                $new_line .= '<td class="center" style="background-color: yellow; color: balck;">'. $v['boil_steam_gas_pressure'] .'</td>';
                }

                if($v['boil_steam_gas_pressure'] < 5.5){
                $new_line .= '<td class="center" style="background-color: red; color: white;">'. $v['boil_steam_gas_pressure'] .'</td>';
                }

                if($v['boiler_1'] >= 3.5){
                $new_line .= '<td class="center" style="background-color: darkgreen; color: white;">'. $v['boiler_1'] .'</td>';
                }
                if($v['boiler_1'] >= 2.5 && $v['boiler_1'] < 3.5){
                $new_line .= '<td class="center" style="background-color: yellow; color: black;">'. $v['boiler_1'] .'</td>';
                }
                if($v['boiler_1'] < 2.5){
                $new_line .= '<td class="center" style="background-color: red; color: white;">'. $v['boiler_1'] .'</td>';
                }

                if($v['boiler_2'] >= 3.5){
                $new_line .= '<td class="center" style="background-color: darkgreen; color: white;">'. $v['boiler_2'] .'</td>';
                }
                if($v['boiler_2'] >= 2.5 && $v['boiler_2'] < 3.5){
                $new_line .= '<td class="center" style="background-color: yellow; color: black;">'. $v['boiler_2'] .'</td>';
                }
                if($v['boiler_2'] < 2.5){
                $new_line .= '<td class="center" style="background-color: red; color: white;">'. $v['boiler_2'] .'</td>';
                }

              //  if($v['boiler_3'] >= 3.5){
             //   $new_line .= '<td class="center" style="background-color: darkgreen; color: white;">'. $v['boiler_3'] .'</td>';
             //   }
             //   if($v['boiler_3'] >= 2.5 && $v['boiler_3'] < 3.5){
             //   $new_line .= '<td class="center" style="background-color: yellow; color: black;">'. $v['boiler_3'] .'</td>';
             //   }
             //   if($v['boiler_3'] < 2.5){
             //   $new_line .= '<td class="center" style="background-color: red; color: white;">'. $v['boiler_3'] .'</td>';
             //   }

                if($v['boiler_4'] >= 3.5){
                $new_line .= '<td class="center" style="background-color: darkgreen; color: white;">'. $v['boiler_4'] .'</td>';
                }
                if($v['boiler_4'] >= 2.5 && $v['boiler_4'] < 3.5){
                $new_line .= '<td class="center" style="background-color: yellow; color: black;">'. $v['boiler_4'] .'</td>';
                }
                if($v['boiler_4'] < 2.5){
                $new_line .= '<td class="center" style="background-color: red; color: white;">'. $v['boiler_4'] .'</td>';
                }
                $new_line .= '<td class="center" style="">'. $v['boiler_remarks'] .'</td>';

                $new_line .= '</tr>';
            }
        }

       echo $new_line;

    }

    public function getReportByDateRange(){
        $date_1 = $this->input->post('date_formatted_1');
        $date_2 = $this->input->post('date_formatted_2');

        $date_formatted_1 = date('Y-m-d', strtotime($date_1));
        $date_formatted_2 = date('Y-m-d', strtotime($date_2));

        $dates_array = $this->date_range($date_formatted_1, $date_formatted_2, $step = '+1 day', $output_format = 'Y/m/d' );

        $new_line = '';

        for($i=0; $i < sizeof($dates_array); $i++){
            if($i == min(array_keys($dates_array))){
                $result = $this->dashboard_model->getReportByFirstDate($dates_array[$i]);
            }

            if($i != min(array_keys($dates_array)) && $i != max(array_keys($dates_array))){
               $result = $this->dashboard_model->getReportByEntireDates($dates_array[$i]);
            }

            if($i == max(array_keys($dates_array))){
                $result = $this->dashboard_model->getReportByLastDate($dates_array[$i]);
            }

            foreach ($result as $v){
                    $new_line .= '<tr class="center">';

                    $new_line .= '<td class="center" style="">' . $v['date'] .'</td>';
                    $new_line .= '<td class="center" style="">' . $v['time'] .'</td>';

                    if($v['generator_gas_pressure'] >= 8){
                    $new_line .= '<td class="center" style="background-color: darkgreen; color: white;">'. $v['generator_gas_pressure'] .'</td>';
                    }

                    if($v['generator_gas_pressure'] >= 5.5 && $v['generator_gas_pressure'] <= 7.5){
                    $new_line .= '<td class="center" style="background-color: yellow; color: balck;">'. $v['generator_gas_pressure'] .'</td>';
                    }

                    if($v['generator_gas_pressure'] < 5.5){
                    $new_line .= '<td class="center" style="background-color: red; color: white;">'. $v['generator_gas_pressure'] .'</td>';
                    }
                    $new_line .= '<td class="center">'. $v['gen_1'] .'</td>';
                    $new_line .= '<td class="center">'. $v['gen_3'] .'</td>';
                    $new_line .= '<td class="center">'. $v['gen_4'] .'</td>';
                    $new_line .= '<td class="center">'. $v['gen_2'] .'</td>';
                    $new_line .= '<td class="center" style="border-right: 2px solid blue;">'. $v['gen_remarks'] .'</td>';


                    if($v['boil_steam_gas_pressure'] >= 8){
                    $new_line .= '<td class="center" style="background-color: darkgreen; color: white;">'. $v['boil_steam_gas_pressure'] .'</td>';
                    }

                    if($v['boil_steam_gas_pressure'] >= 5.5 && $v['boil_steam_gas_pressure'] <= 7.5){
                    $new_line .= '<td class="center" style="background-color: yellow; color: balck;">'. $v['boil_steam_gas_pressure'] .'</td>';
                    }

                    if($v['boil_steam_gas_pressure'] < 5.5){
                    $new_line .= '<td class="center" style="background-color: red; color: white;">'. $v['boil_steam_gas_pressure'] .'</td>';
                    }

                    if($v['boiler_1'] >= 3.5){
                    $new_line .= '<td class="center" style="background-color: darkgreen; color: white;">'. $v['boiler_1'] .'</td>';
                    }
                    if($v['boiler_1'] >= 2.5 && $v['boiler_1'] < 3.5){
                    $new_line .= '<td class="center" style="background-color: yellow; color: black;">'. $v['boiler_1'] .'</td>';
                    }
                    if($v['boiler_1'] < 2.5){
                    $new_line .= '<td class="center" style="background-color: red; color: white;">'. $v['boiler_1'] .'</td>';
                    }

                    if($v['boiler_2'] >= 3.5){
                    $new_line .= '<td class="center" style="background-color: darkgreen; color: white;">'. $v['boiler_2'] .'</td>';
                    }
                    if($v['boiler_2'] >= 2.5 && $v['boiler_2'] < 3.5){
                    $new_line .= '<td class="center" style="background-color: yellow; color: black;">'. $v['boiler_2'] .'</td>';
                    }
                    if($v['boiler_2'] < 2.5){
                    $new_line .= '<td class="center" style="background-color: red; color: white;">'. $v['boiler_2'] .'</td>';
                    }

                    if($v['boiler_3'] >= 3.5){
                    $new_line .= '<td class="center" style="background-color: darkgreen; color: white;">'. $v['boiler_3'] .'</td>';
                    }
                    if($v['boiler_3'] >= 2.5 && $v['boiler_3'] < 3.5){
                    $new_line .= '<td class="center" style="background-color: yellow; color: black;">'. $v['boiler_3'] .'</td>';
                    }
                    if($v['boiler_3'] < 2.5){
                    $new_line .= '<td class="center" style="background-color: red; color: white;">'. $v['boiler_3'] .'</td>';
                    }

                    if($v['boiler_4'] >= 3.5){
                    $new_line .= '<td class="center" style="background-color: darkgreen; color: white;">'. $v['boiler_4'] .'</td>';
                    }
                    if($v['boiler_4'] >= 2.5 && $v['boiler_4'] < 3.5){
                    $new_line .= '<td class="center" style="background-color: yellow; color: black;">'. $v['boiler_4'] .'</td>';
                    }
                    if($v['boiler_4'] < 2.5){
                    $new_line .= '<td class="center" style="background-color: red; color: white;">'. $v['boiler_4'] .'</td>';
                    }
                    $new_line .= '<td class="center" style="">'. $v['boiler_remarks'] .'</td>';

                    $new_line .= '</tr>';

              }
        }
        echo $new_line;
    }

    function date_range($first, $last, $step, $output_format ) {

        $dates = array();
        $current = strtotime($first);
        $last = strtotime($last);

        while( $current <= $last ) {

            $dates[] = date($output_format, $current);
            $current = strtotime($step, $current);
        }

        return $dates;
    }

    public function chartReport(){
        $data['title'] = 'Chart Report';

        //$cur_date = date('Y-m-d');
        //$pre_date = date('Y-m-d', strtotime($cur_date . ' -1 day'));

        //$data['default_data'] = $this->dashboard_model->getDefaultTwoDaysReport($pre_date, $cur_date);
        //$data['date_formatted_1'] = $pre_date;
        //$data['nxt_date'] = $cur_date;

        $this->load->view('report/chart_report_dashboard', $data);
    }

    public function getChartReport(){

        $cur_date = date('Y-m-d');
        $pre_date = date('Y-m-d', strtotime($cur_date . ' -1 day'));

        $data = $this->dashboard_model->getDefaultTwoDaysReport($pre_date, $cur_date);

                //         //data to json

                $responce->cols[] = array(
                    "id" => "",
                    "label" => "Topping",
                    "pattern" => "",
                    "type" => "string"
                );
                $responce->cols[] = array(
                            "id" => "",
                            "label" => "Total",
                            "pattern" => "",
                            "type" => "number"
                        );
                foreach($data as $cd)
                    {
                    $responce->rows[]["c"] = array(
                        array(
                            "v" => $cd['time'],
                            "f" => null
                        ) ,

                            array(
                                "v" => $cd['generator_gas_pressure'],
                                "f" => null

                            )

                    );
                    }

                echo json_encode($responce);
    }

    }