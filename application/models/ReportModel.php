<?php
/**
 * Created by PhpStorm.
 * User: MyRobo
 * Date: 2/10/2017
 * Time: 12:48 AM
 */
class  ReportModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function ListColumns($test_id)
    {
        return $this->db->get_where('test_columns',array('test_id'=>$test_id))->result();
    }
    function ColumnValue($field_id,$transaction_id)
    {
        return $this->db->get_where('test_column_values',array('field_id'=>$field_id,'transaction_id'=>$transaction_id))->row();
    }

}