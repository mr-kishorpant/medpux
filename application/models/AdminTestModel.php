<?php
/**
 * Created by PhpStorm.
 * User: MyRobo
 * Date: 2/8/2017
 * Time: 8:39 PM
 */
class AdminTestModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function AddNewTest($data)
    {
        $this->db->insert('client_test',$data);
        return $this->db->affected_rows();
    }
    function ListTest($key,$state)
    {
        $this->db->order_by('test_id', 'DESC');
        if($this->session->client_role=='admin') {

        }
        else
        {
            $this->db->where('client_id',$this->session->client_id);
        }
        return $this->db->get('client_test')->result();
    }
    function PriceFinder($test_id)
    {
        if(!empty($test_id))
        {
            return $this->db->get_where('client_test',array('test_id'=>$test_id))->row();
        }
    }
    function SaveColumn($data)
    {
        $this->db->insert('test_columns',$data);
        return $this->db->affected_rows();
    }
    function ListColumns($test_id)
    {
        $this->db->order_by('id','DESC');
        return $this->db->get_where('test_columns',array('test_id'=>$test_id))->result();
    }
    function UpdateColumn($data,$col_id)
    {
        $this->db->update('test_columns',$data,array('id'=>$col_id));
        return $this->db->affected_rows();

    }
    function DeleteColumn($column_id)
    {
        $this->db->delete('test_columns',array('id'=>$column_id));
        return $this->db->affected_rows();
    }
}