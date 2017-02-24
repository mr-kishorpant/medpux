<?php
/**
 * Created by PhpStorm.
 * User: MyRobo
 * Date: 2/8/2017
 * Time: 10:41 PM
 */
class PatientModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function LabHavingTest($lab_id)
    {
        $lab_id=$this->session->client_id;
        $result=$this->db->get_where('client_lab_test',array('lab_id'=>$lab_id))->result();
        return $result;
    }
    function ShowPatientList()
    {
        return $this->db->get_where('customers')->result();
    }
    function Patient_Details($customer_contact)
    {
        if(!empty($customer_contact))
            return $this->db->get_where('customers',array('customer_phone'=>$customer_contact))->row();
    }
    function AddTemporaryTest($data)
    {
        $this->db->insert('test_history',$data);
        return $this->db->affected_rows();
    }
    function ApplyCoupon($coupon_value,$contact_no)
    {
        $this->db->update('test_history',array('coupon_value'=>$coupon_value),array('mobile_no'=>$contact_no));
        return $this->db->affected_rows();

    }
    function ListTemporaryTest($mobile_no)
    {
        $this->db->join('client_test','client_test.test_id=test_history.test_id');
        return $this->db->get_where('test_history',array('mobile_no'=>$mobile_no))->result();
    }
    function RemoveTemporaryRows($id)
    {
        $this->db->delete('test_history',array('id'=>$id));
        return $this->db->affected_rows();
    }
    function AddTransaction($data)
    {
        $this->db->insert('transactions',$data);
        return $this->db->insert_id();
    }
    function SaveHistory($history)
    {
        $this->db->insert('transaction_history',$history);
        return $this->db->affected_rows();
    }
    function RemoveTempData($customer_contact)
    {
        $this->db->delete('test_history',array('mobile_no'=>$customer_contact));
        return $this->db->affected_rows();
    }
    function ListTransaction($contact_no)
    {
        $this->db->order_by('transaction_date','DESC');
        $this->db->where('lab_id',$this->session->client_id);
        return $this->db->get_where('transactions',array('patient_contact_no'=>$contact_no))->result();
    }
    function ListTransactionItems($row_id)
    {
        $this->db->join('transactions','transactions.id=transaction_history.transaction_row_id');
        $this->db->join('client_test','client_test.test_id=transaction_history.test_id');
        return $this->db->get_where('transaction_history',array('transaction_row_id'=>$row_id))->result();
    }
    function VerifyPatinetInfo($patient_phone)
    {
        $this->db->select('customer_phone,phone_verified');
        $this->db->where('customer_phone',$patient_phone);
        return $this->db->get('customers')->row();
    }
    function PatientTransactions($patient_phone,$transaction_no)
    {
        $this->db->select('id');
        $this->db->where('transaction_id',$transaction_no);
        $this->db->where('patient_contact_no',$patient_phone);
        return $this->db->get('transactions')->row();
    }
    function CreatePatientAccount($data)
    {
        $this->db->insert('customers',$data);
        return $this->db->affected_rows();
    }

}