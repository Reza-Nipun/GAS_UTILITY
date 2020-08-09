<?php

class Access_model extends CI_Model {
    //put your code here

    public function getInputedTimeId($date, $date_plus_1){
        $sql   = "SELECT GROUP_CONCAT(CONVERT(B.time_id, CHAR(8)) separator ', ') as inputed_time 
                  FROM `tb_time` as A 
                  Inner Join 
                  `tb_utility_data` as B 
                  ON A.id = B.time_id where B.date='$date' and A.status='current' group by '$date'";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function checkIsDataInputed($data_date, $time_id){
        $sql   = "SELECT * from `tb_utility_data` where date='$data_date' and time_id=$time_id";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function getNotInputedTimes($inputed_time_ids){
        $where = '';

        if($inputed_time_ids == ''){
            $where .= "";
        }else{
            $where .= " and id not in ($inputed_time_ids)";
        }

        $sql   = "SELECT * FROM `tb_time` WHERE 1 $where";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function getInputedTimes($date, $date_plus_1){
        $sql   = "SELECT t1.*, t2.time FROM `tb_utility_data` as t1 
                  Inner Join `tb_time` as t2 ON t1.time_id=t2.id 
                  where t1.date between '$date_plus_1' and '$date' order by t1.id";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function insertingData($tbl, $data)
    {
        $this->db->INSERT($tbl, $data);
    }

    public function updatingData ( $tbl, $data, $id )
    {
        $this->db->where( 'id', $id );
        return $this->db->update( $tbl, $data );
    }
}

?>