<?php
/**
 * Created by PhpStorm.
 * User: MyRobo
 * Date: 2/15/2017
 * Time: 9:16 PM
 */
class LabModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function LabMainModel($key,$data)
    {
        if($key=='create'){
            $this->db->insert('client',$data);
            return $this->db->affected_rows();
        }
        else if($key=='list')
        {
            $this->db->order_by('account_creation_date','DESC');
            $this->db->where('client_role','client');
            return $this->db->get('client')->result();
        }
        else if($key=='delete')
        {
            $this->db->delete('client',$data);
            return $this->db->affected_rows();
        }

    }
    function LabDetailsModel($lab_id)
    {
        return $this->db->get_where('client',array('id'=>$lab_id))->row();
    }
    function SaveLabTest($data)
    {
        $this->db->insert('client_lab_test',$data);
        return $this->db->affected_rows();
    }
    function DeleteLabTest($test_name,$client_phone)
    {
        $this->db->delete('client_test',array('test_name'=>$test_name,'client_id'=>$client_phone));
        //echo $this->db->last_query();
        return $this->db->affected_rows();
    }
    function LabTestValueByTransactionId($transaction_id,$column_id)
    {
        return $this->db->get_where('test_column_values',array('transaction_id'=>$transaction_id,'field_id'=>$column_id))->row();
    }

}