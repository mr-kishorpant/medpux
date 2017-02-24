<?php
/**
 * Created by PhpStorm.
 * User: MyRobo
 * Date: 2/7/2017
 * Time: 11:32 PM
 */
class Dashboard extends  Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('PatientModel','TestModel','ReportModel','TransactionModel','LabModel'));
    }
    function index()
    {
        $data['source']=$this->config->item('source');
        //$data['patient_list']=$this->PatientModel->ShowPatientList();
        $data['transactions']=$this->TransactionModel->ListTransaction($this->session->client_id);
        $this->show('Admin/Dashboard',$data);
    }
    function Transactions($contact_no)
    {
        $data['transactions']=$this->PatientModel->ListTransaction($contact_no);
        $this->show('Admin/MyTransactions',$data);

    }
    function NewCustomer()
    {
        //this function means that new customers request
        $data['']='';
        $this->show('Admin/NewPatient',$data);
    }
    function CreatePatientProfile()
    {
    }
    //certain searching algorith already applied here.
    function SearchTerm()
    {
        $patient_phone=$this->input->post('mobile_no');
        $transaction_no=$this->input->post('transaction_no');

        if(!empty($patient_phone))
        {
            $resultCustomer=$this->PatientModel->VerifyPatinetInfo($patient_phone);
            if(isset($resultCustomer->customer_phone))
            {
                //inside when customer is registetd but dont know that customer phone is verified or not
                if($transaction_no=='no')
                {
                    // redirect it to add new Test for this phone no.
                    redirect('Test/AddTest/'.$patient_phone);
                }
                else
                {
                    $ListTransaction=$this->PatientModel->PatientTransactions($patient_phone,$transaction_no);
                    if(count($ListTransaction)>0)
                        redirect('Dashboard/Transactions/'.$patient_phone.'/'.$ListTransaction->id);
                }
            }
            else
            {
                // inside here means entered phone no doesn;t exist with our DB redirect to create new account.
                redirect('/Dashboard/NewCustomer');
            }
        }

    }

    function TransactionItem($customer_id=null,$row_id=null)
    {
        $data['transaction_items']=$this->PatientModel->ListTransactionItems($row_id);
        //print_r($data);
        $data['customer_phone']=$customer_id;
        $this->show('Admin/TransactionItem',$data);
    }
    function TestValues($transactin_id=null,$test_id=null)
    {
        $data['column_names']=$this->TestModel->ListTestColumns($test_id);
        $data['test']=$this->TestModel->TestDetails($test_id);
        $data['transaction_id']=$transactin_id;
        //print_r($data['column_names']);
        $this->show('Admin/TestColumnValues',$data);
    }
    function SaveColumnValues()
    {
        $data['field_value']=$this->input->post('field_value');
        $data['field_id']=$this->input->post('field_id');
        $data['test_id']=$this->input->post('test_id');
        $data['transaction_id']=$this->input->post('transaction_id');
        $data['value1']=$this->input->post('value1');
        $data['value2']=$this->input->post('value2');
        $data['value3']=$this->input->post('value3');
        $data['value4']=$this->input->post('value4');
        $data['value5']=$this->input->post('value5');
	$data['note']=$this->input->post('note');
        $result=$this->TestModel->SaveTestValue($data,$data['transaction_id']);
        redirect('/Dashboard/TestValues/'.$data['transaction_id'].'/'.$data['test_id']);
    }
    function CreatePatientAccount()
    {
        $data['customer_name']=$this->input->post('patient_name');
        $data['customer_phone']=$this->input->post('patient_phone');
        $data['customer_email']=$this->input->post('patient_email');
        $data['customer_password']=md5($this->input->post('patient_phone'));
        $data['phone_verified']='true';
        $data['created_through']=2;
        $data['status']=1;

        if($this->PatientModel->CreatePatientAccount($data)>0)
        {

            redirect('/Dashboard');
        }

    }
	function Logout()
	{
		$this->session->sess_destroy();
		redirect('','refresh');
	}
}