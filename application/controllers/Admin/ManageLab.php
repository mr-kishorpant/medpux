<?php
/**
 * Created by PhpStorm.
 * User: MyRobo
 * Date: 2/15/2017
 * Time: 8:41 PM
 */
class ManageLab extends Backend_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('LabModel','AdminTestModel','TestModel'));
    }
    function index()
    {

        $data['labs']=$this->LabModel->LabMainModel('list',array());
        $this->show('/Admin/Backend/Labs/ManageLabs',$data);
    }
    function CreateLab()
    {
        $data['client_id']=$this->input->post('contact_no');
        $data['client_password']=md5($this->input->post('contact_no'));
        $data['client_role']='client';
        $data['account_status']=1;
        $data['client_phone']=$this->input->post('contact_no');
        $data['lab_address']=$this->input->post('address');
        $data['no_of_doc']=$this->input->post('doctors');
        $data['lab_email']=$this->input->post('lab_email');
        $data['no_of_test']=$this->input->post('no_of_test');
        $data['client_name']=$this->input->post('lab_name');
        $result=$this->LabModel->LabMainModel('create',$data);
        if($result>0)
            redirect('/Admin/ManageLab');
    }
    function MapTestWithLab($lab_id)
    {
	
        $key='';
        $state='';
        $data['tests']=$this->AdminTestModel->ListTest($key,$state);
	//$lab_id=$this->LabModel->LabDetailsModel($lab_id)->client_id;
        $data['my_test']=$this->TestModel->ListTest($lab_id);
	
        $data['lab_id']=$this->LabModel->LabDetailsModel($lab_id)->client_id;
		//echo $data['lab_id'];
        $data['id']=$lab_id;
        $this->show('/Admin/Backend/Labs/MapTestWithLabs',$data);
    }
    function SaveLabTest()
    {
        $data['test_id']=$this->input->post('test_id');
        $data['test_name']=$this->TestModel->TestDetails($this->input->post('test_id'))->test_name;
        $data['test_price']=$this->input->post('test_price');
        $data['lab_id']=$this->input->post('client_id');
        $data['created_by']=$this->session->client_id;
        $data['test_status']=1;
        $id=$this->input->post('id');
        $result=$this->LabModel->SaveLabTest($data);
        redirect('/Admin/ManageLab/MapTestWithLab/'.$id);
    }
    function DeleteLab($lab_id)
    {
        $data['id']=$lab_id;
        $this->LabModel->LabMainModel('delete',$data);
        redirect('/Admin/ManageLab');
    }
    function DeleteTestFromLab($lab_phone,$test_name)
    {

            $this->LabModel->DeleteLabTest(urldecode($test_name),$lab_phone);
            echo '<script>window.history.back();</script>';
    }
}