<?php
/**
 * Created by PhpStorm.
 * User: MyRobo
 * Date: 2/9/2017
 * Time: 11:58 PM
 */
class Report extends Report_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('ReportModel','PatientModel'));
    }
    function TestReports($customer_phone=null,$transaction_id=null,$testname=null,$test_id=null)
    {
            $test_name=urldecode($testname);
            $test_name=str_replace(' ','_',ucfirst($test_name));
            //$data['test_report']=$this->ReportModel->ListCustomerName($$transaction_id,$test_id);
            $data['customer']=$this->PatientModel->Patient_Details($customer_phone);
            $data['test_name']=str_replace('_',' ',$test_name);
            $data['transaction_id']=$transaction_id;
            $data['columns']=$this->ReportModel->ListColumns($test_id);
           // print_r($data['columns']);
            $this->show('Test_Report/'.$test_name,$data);
    }
}