<?php
/**
 * Created by PhpStorm.
 * User: MyRobo
 * Date: 2/9/2017
 * Time: 9:54 PM
 */
class mobile extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MobileApiModel');
    }
    function index()
    {
        $var=urlencode("ksihorpant/9557731786/kishorpant@gmail.com/9557731786/27-07-1991");
        echo trim('http://app.medpux.com/index.php/mobile/signup/'.urlencode('kishorpant').'/'.urlencode('kishorpant1991@gmail.com').'/'.urlencode('9557731786').'/'. urlencode('9557731786').'/'.urlencode('27-07-1991'));
    }
    function signup()
    {
       $data['customer_name']=$this->input->post('username');
        $data['customer_email']=$this->input->post('email');
        $data['customer_phone']=$this->input->post('mobile');
        $data['customer_password']=md5($this->input->post('password'));
        $data['customer_dob']=$this->input->post('dob');
        $result=$this->MobileApiModel->CheckExistance('email',$data['customer_email']);
        if(isset($result))
        {
            echo json_encode(array('status'=>0,'error'=>'Email Already Exist'));
            die;
        }
        $result=$this->MobileApiModel->CheckExistance('mobile',$data['customer_phone']);
        if(isset($result))
        {
            echo json_encode(array('status'=>0,'error'=>'Phone Already Exist'));
            die;
        }
        else
        {
            $result=$this->MobileApiModel->CreateAccount($data);
            echo json_encode(array('status'=>1));
        }
    }
    function login()
    {
        $data['customer_phone']=$this->input->post('phone_no');
        $data['customer_password']=$this->input->post('password');


        $result = $this->MobileApiModel->Login_Authentication($data);
        //print_r($result);
                if (isset($result)) {

            $subname = explode(' ', $result->customer_name);
            $this->session->set_userdata('patient_name',$result->customer_phone);
            $returndata['status'] = '1';
            $returndata['user_data'] = array(
                'username' => $result->customer_phone,
                'first_name' => $subname[0],
                'last_name' => $subname[1],
                'email' => $result->customer_email,
                'lab_check' => false
            );
            $returndata['opt_verified'] = $result->phone_verified;
            $returndata['SESSION_ID'] = session_id();
            echo json_encode($returndata);
        }
        else
        {
            echo json_encode(array('status'=>0,'error'=>"Invalid Credentials"));
        }
    }
    //session Logout
          function logout()
          {
              $this->session->sess_destroy();
              echo json_encode('Logged Out');
          }
    function CheckExistance()
    {
       $keyemail=$this->input->post('email');
        $mobilevalue=$this->input->post('mobile');
        $emailexist=$this->MobileApiModel->CheckExistance('email',$keyemail);
        $mobilexist=$this->MobileApiModel->CheckExistance('mobile',$mobilevalue);
            if (isset($emailexist)) {
                echo json_encode(array('status' => 0, 'error' => 'Email Already Exists'));
                die;
            }
            if (isset($mobilexist)) {
                echo json_encode(array('status' => 0, 'error' => 'Phone No Already Exists'));
                die;
            }
            if (!isset($emailexist) && !isset($mobilexist)) {
                echo json_encode(array('status' => 1));
                die;
            }
    }
    //check list of transaaction;
    function prepare()
    {
        // list of test aasigned for the mobile no.
        $pmtr=$this->input->get('parameter');
        $results['data']=$this->MobileApiModel->PrepareTestList($pmtr);
        //print_r($result);
        echo json_encode($results);
    }
    function prepare_details()
    {
        $test_id=$this->input->get('test_id');
    }
    function feedback()
    {
        //list of feedback point 8
        $data['patient_id']=$this->input->post('mobile');
//        $data['topic']=$this->input->post('topic');
//        $data['content']=$this->input->post('content');
        $data['topic']=$this->input->post('topic');
        $data['content']=$this->input->post('content');

        $result=$this->MobileApiModel->SaveFeeback($data);
        echo json_encode(array('status'=>$result));
    }
    function Booking()
    {
        // arrange booking
        $data['customer_id']=$this->input->post('mobile');
        //$data['lab_id']=$this->input->post('lab_id');
        $data['lab_id']=$this->input->post('lab_id');
        $result=$this->MobileApiModel->SaveNotification($data);
        echo json_encode(array('status'=>$result));
    }
    function get_labs()
    {
        $key=$this->input->get('parameter');
        $value=$this->input->get('code');
        $result=$this->MobileApiModel->SerachModel($key,$value);
        $data['status']='1';
        $data['data']=$result;
        echo json_encode($data);
    }
    function medical_index()
    {
        $mobile_no=$this->input->post('mobile');
        $method=$this->input->post('method');
        if($method=='post')
        {
            $data['customer_dob']=$this->input->post('dob');
            $data['sex']=$this->input->post('sex');
            $data['height']=$this->input->post('height');
            $data['weight']=$this->input->post('weight');
            $data['blood_group']=$this->input->post('blood_group');
            $data['bmi']=$this->input->post('bmi');
            $data['allergy']=$this->input->post('allergy');
            $data['surgery']=$this->input->post('surgery');

            if(empty($data['sex']))
            {
                echo json_encode(array('status'=>0));
                die;
            }
            else
            {
                $result=$this->MobileApiModel->UpdateIndex($data,$mobile_no);
                if($result>0)
                    echo json_encode(array('status'=>1));
            }
        }
        else
        {
            $result['data']=$this->MobileApiModel->MyIndex($mobile_no);
            echo json_encode($result);
        }
    }
    function home_collection()
    {
        $pincode=$this->input->get('code');
        $data['data']=$this->MobileApiModel->HomeCollection($pincode);
        echo json_encode($data);
    }
    function get_transaction_id()
    {
        $mobile=$this->input->get('mobile');
        $data['data']=$this->MobileApiModel->ListMyTransaction($mobile);
        echo json_encode($data);
    }
    function get_receipt_id()
    {

    }
    function list_of_tests()
    {
        $lab_id=$this->input->get('lab_id');
        $result['data']=$this->MobileApiModel->ListOfTest($lab_id);
        echo json_encode($result);
    }
    function forgot_password()
    {
        $password=md5($this->input->post('password'));
        $mobile=$this->input->post('phone_no');

        $result=$this->MobileApiModel->UpdatePassword($mobile,$password);
        if($result>0)
            echo json_encode(array('status'=>1));
        else

            echo json_encode(array('status'=>0));
    }


}