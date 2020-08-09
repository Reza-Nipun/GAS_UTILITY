<?php

class Dashboard_model extends CI_Model {
    //put your code here


    public function getDefaultTwoDaysReport($pre_date, $cur_date){
        //$sql   = "Select A.*, B.time From (SELECT *  FROM `tb_utility_data` 
         //         WHERE `date` between '$pre_date' and '$cur_date' Order By date ASC, time_id ASC) as A
         //         Inner join `tb_time` as B ON A.time_id=B.id";
		$sql   = "Select A.*, B.time From (SELECT *  FROM `tb_utility_data` 
                 WHERE `date` = '$cur_date' Order By date ASC, time_id ASC) as A
                 Inner join `tb_time` as B ON A.time_id=B.id";
				 
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function getDefaultOneDayReport($date_formatted_1, $nxt_date){
         $sql   = "Select A.*, B.time From (SELECT *  FROM `tb_utility_data` 
                  WHERE `date` between '$date_formatted_1' and '$nxt_date' Order By date ASC, time_id ASC) as A
                  Inner join `tb_time` as B ON A.time_id=B.id";

         $query = $this->db->query($sql);

         return $query->result_array();
    }

    public function getReportByFirstDate($date){
        $sql   = "Select A.*, B.time From (SELECT *  FROM `tb_utility_data` 
                  WHERE `date` = '$date' Order By date ASC, time_id ASC) as A
                  Inner join `tb_time` as B ON A.time_id=B.id
                  Where B.status='current'";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function getReportByLastDate($date){
        $sql   = "Select A.*, B.time From (SELECT *  FROM `tb_utility_data` 
                  WHERE `date` = '$date' Order By date ASC, time_id ASC) as A
                  Inner join `tb_time` as B ON A.time_id=B.id
                  Where B.status='next'";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function getReportByEntireDates($date){
        $sql   = "Select A.*, B.time From (SELECT *  FROM `tb_utility_data` 
                  WHERE `date` = '$date' Order By date ASC, time_id ASC) as A
                  Inner join 
                  (Select * From `tb_time` Order By sequence) as B ON A.time_id=B.id";

        $query = $this->db->query($sql);

        return $query->result_array();
    }
    
}

?>