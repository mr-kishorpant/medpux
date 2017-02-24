<?php
/**
 * Created by PhpStorm.
 * User: MyRobo
 * Date: 2/9/2017
 * Time: 9:58 PM
 */
class MobileApiModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function CreateAccount($data)
    {
        $this->db->insert('customers',$data);
            return $this->db->affected_rows();

    }
    function Login_Authentication($data)
    {
//        print_r($data);

            //$this->db->select('username,first_name,last_name,email,lab_check');
            $this->db->where('customer_password',md5($data['customer_password']));
            $result= $this->db->get_where('customers',array('customer_phone'=>$data['customer_phone']))->row();
           // echo $this->db->last_query();
            return $result;

    }
    function MyTests($mobile_no)
    {
        $this->db->select('id,transaction_id,patient_contact_no as user,lab_id as lab');
        return $this->db->get_where('transactions',array('patient_contact_no'=>$mobile_no))->result();
    }
    function SerachModel($key,$keyvalue)
    {
        $this->db->select('empanelment,facilities,payment_mode,google_maps,image,id,client_name as name,lab_address as address,empanelment,hours,collection_time,report_time,lab_pincode as code');
        if($key=='near_by')
            return $this->db->get_where('client',array('lab_pincode'=>$keyvalue))->result();
        else
            return false;
    }
    function HomeCollection($pincode)
    {
        $this->db->select('empanelment,facilities,payment_mode,google_maps,image,id,client_name as name,lab_address as address,empanelment,hours,collection_time,report_time,lab_pincode as code');
        $this->db->where('home_collection',1);
        return $this->db->get_where('client',array('lab_pincode'=>$pincode))->result();
    }
    function SaveNotification($data)
    {
        $this->db->insert('lab_booking',$data);
        return $this->db->affected_rows();
    }
    function SaveFeeback($data)
    {
        $this->db->insert('feedback',$data);
        return $this->db->affected_rows();
    }
    function UpdateIndex($data,$mobile)
    {
        $this->db->update('customers',$data,array('customer_phone'=>$mobile));
        return $this->db->affected_rows();
    }
    function MyIndex($mobile)
    {
        $this->db->select('customer_dob as dob,height,weight,sex,blood_group,bmi,allergy,surgery,');
        $result=$this->db->get_where('customers',array('customer_phone'=>$mobile))->row();
        //echo $this->db->last_query();
        return $result;
    }
    function ListOfTest($lab_id)
    {
        $lab=$this->db->get_where('client',array('id'=>$lab_id))->row();
        $this->db->select('test_id as id,test_name as main_test,test_price as price');

        return $this->db->get_where('client_lab_test',array('lab_id'=>$lab->client_id))->result();
    }
    function PrepareTestList($pmtr)
    {
        if(empty($pmtr))
            return $this->db->get('pretest')->result();
        else
        {
            $this->db->like('test_name',$pmtr);
            return $this->db->get('pretest')->result();

        }
        //return $result;
    }
    function ListMyTransaction($mobile)
    {
        $this->db->select('client_test.test_id as id,transaction_id,patient_contact_no as user_id,transaction_history.transaction_by as lab,test_name as main_test,date(transaction_date) as reported');
        $this->db->join('transaction_history','transaction_history.transaction_row_id=transactions.id');
        $this->db->join('client_test','client_test.test_id=transaction_history.test_id');

        return $this->db->get_where('transactions',array('patient_contact_no'=>$mobile))->result();
    }
    function UpdatePassword($mobile,$password)
    {
        $this->db->update('customers',array('customer_password'=>$password),array('customer_phone'=>$mobile));
        return $this->db->affected_rows();
    }
    function CheckExistance($key,$keyvalue)
    {
        if($key=='email')
        {
            $this->db->select('customer_email');
            $this->db->where('customer_email',$keyvalue);
        }
        if($key=='mobile')
        {
            $this->db->select('customer_phone');
            $this->db->where('customer_phone',$keyvalue);
        }
        return $this->db->get('customers')->row();
    }
    function ListOfTestByLabs($lab_id)
    {
        return $this->db->get_where('client_test',array('lab_id'=>$lab_id))->result();
    }
}