<?php
/**
 * Created by PhpStorm.
 * User: MyRobo
 * Date: 2/15/2017
 * Time: 3:18 PM
 */
class TransactionModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function ListTransaction($client_id)
    {
        $this->db->order_by('transaction_date','DESC');
        $this->db->where('transaction_by',$client_id);
        $this->db->join('customers','customers.customer_phone=transactions.patient_contact_no');
        return $this->db->get('transactions')->result();
    }
}