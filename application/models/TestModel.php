<?php
/**
 * Created by PhpStorm.
 * User: MyRobo
 * Date: 2/11/2017
 * Time: 12:39 AM
 */
class TestModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function ListTestColumns($test_id)
    {
        return $this->db->get_where('test_columns',array('test_id'=>$test_id))->result();
    }
    function TestDetails($test_id)
    {
        return $this->db->get_where('client_test',array('test_id'=>$test_id))->row();
    }
    function SaveTestValue($data,$transaction_id)
    {
        $result=$this->db->get_where('test_column_values',array('transaction_id'=>$transaction_id,'field_id'=>$data['field_id']));
        if($result->num_rows()>0)
        {
            $this->db->update('test_column_values',$data,array('transaction_id'=>$transaction_id,'field_id'=>$data['field_id']));
        }
        else
        {
                $this->db->insert('test_column_values',$data);
        }
        return $this->db->affected_rows();
    }
    function ListTest($lab_id)
    {
	//echo $lab_id;
        $result=$this->db->get_where('client',array('id'=>$lab_id))->row();
	//print_r($result);
	$this->db->order_by('row_id','DESC');
        $result=$this->db->get_where('client_lab_test',array('lab_id'=>$result->client_id))->result();
	//echo $this->db->last_query();
	return $result;
    }
}