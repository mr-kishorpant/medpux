<?php
/**
 * Created by PhpStorm.
 * User: MyRobo
 * Date: 2/8/2017
 * Time: 8:44 PM
 */
class Test extends Backend_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('AdminTestModel');
    }
    function index()
    {

    }
    function AddTest()
    {
        $data['test_name']=$this->input->post('test_name');
        $data['test_price']=$this->input->post('test_price');
        $data['test_child_test']=$this->input->post('child_enable');
        $data['client_id']=$this->session->client_id;//that can be change
        $data['created_by']=$this->session->client_id;
        $result=$this->AdminTestModel->AddNewTest($data);
        if($result>0)
            redirect('/Admin/Test/ViewTest');

    }
    function NewTest()
    {
        $data['msg']=true;
        $this->show('/Admin/Backend/Test/NewTest',$data);
    }
    function ViewTest()
    {
        $key='';
        $data['list_of_test']=$this->AdminTestModel->ListTest($key,true);
        //print_r($data);
        $this->show('/Admin/Backend/Test/ViewTest',$data);
    }
    function TestFields($test_id=null)
    {
        $data['']='';
        $data['test_id']=$test_id;
        $data['test_data']=$this->AdminTestModel->PriceFinder($test_id);
        $data['test_columns']=$this->AdminTestModel->ListColumns($test_id);
        //print_r($data['test_columns']);
        $this->show('/Admin/Backend/Test/TestFieldValues',$data);
    }
    function SaveColumns()
    {
        $data['test_id']=$this->input->post('test_id');
        $data['field_name']=$this->input->post('field_name');
        $data['column_1']=$this->input->post('column_1');
        $data['column_2']=$this->input->post('column_2');
        $data['column_3']=$this->input->post('column_3');
        $data['column_4']=$this->input->post('column_4');
        $data['column_5']=$this->input->post('column_5');
	$data['default_note']=$this->input->post('note');
        if(empty($data['column_1'])) $data['column_1']='a';
        if(empty($data['column_2'])) $data['column_2']='a';
        if(empty($data['column_3'])) $data['column_3']='a';
        if(empty($data['column_4'])) $data['column_4']='a';
        if(empty($data['column_5'])) $data['column_5']='a';
        $result=$this->AdminTestModel->SaveColumn($data);
        redirect('/Admin/Test/TestFields/'.$data['test_id']);
    }
    function UpdateColumns()
    {
        $column_id=$this->input->post('column_id');
        $data['test_id']=$this->input->post('test_id');
        $data['field_name']=$this->input->post('field_name');
        $data['default_field_name']=$this->input->post('default_field_name');
		$data['default_column_1']=$this->input->post('default_column_1');
        $data['default_column_2']=$this->input->post('default_column_2');
		$data['default_column_3']=$this->input->post('default_column_3');
		$data['default_column_4']=$this->input->post('default_column_4');
		$data['default_column_5']=$this->input->post('default_column_5');
		$data['column_1']=$this->input->post('column_1');
        $data['column_2']=$this->input->post('column_2');
        $data['column_3']=$this->input->post('column_3');
        $data['column_4']=$this->input->post('column_4');
        $data['column_5']=$this->input->post('column_5');
	$data['default_note']=$this->input->post('note');
        if(empty($data['column_1'])) $data['column_1']='a';
        if(empty($data['column_2'])) $data['column_2']='a';
        if(empty($data['column_3'])) $data['column_3']='a';
        if(empty($data['column_4'])) $data['column_4']='a';
        if(empty($data['column_5'])) $data['column_5']='a';
	if(empty($data['default_note'])) $data['default_note']='a';

        $result=$this->AdminTestModel->UpdateColumn($data,$column_id);
        redirect('/Admin/Test/TestFields/'.$data['test_id']);
    }
    function DeleteTestColumn($test_id=null,$column_id=null)
    {
        $result=$this->AdminTestModel->DeleteColumn($column_id);
        //echo $result;
        redirect('/Admin/Test/TestFields/'.$test_id);

    }
}