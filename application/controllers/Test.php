
<?php
/**
 * Created by PhpStorm.
 * User: MyRobo
 * Date: 2/8/2017
 * Time: 11:01 PM
 */
class  Test extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('AdminTestModel','PatientModel'));
    }
    function index()
    {
        redirect('Dashboard');
    }
    function PriceFinder($test_id=null)
    {
        $result=$this->AdminTestModel->PriceFinder($test_id);
        echo json_encode(array('price'=>$result->test_price));
    }
    function AddTest($customer_contact=null)
    {
        $key='';
        $state=true;
        //print_r($_SESSION);
       $data['customer_contact']=$customer_contact;
        $data['temporary_test']=$this->PatientModel->ListTemporaryTest($customer_contact);
        $data['patient']=$this->PatientModel->Patient_Details($customer_contact);
        $data['TestAvailable']=$this->PatientModel->LabHavingTest($key,$state);
//        $data['TestAvailable']=$this->AdminTestModel->ListTest($key,$state);
            $this->show('Admin/AddNewTest',$data);
    }
    function TemporaryTest()
    {
            $data['mobile_no']=$this->input->post('phone_no');
            $data['test_id']=$this->input->post('test_name');
            $data['test_price']=$this->input->post('test_price');
            $data['coupon_value']=$this->input->post('coupon_value');
            if(empty($data['coupon_value']))
                $data['coupon_value']=0;
           // $data['net_value']=$data['test_price']-$data['coupon_value'];
            $result=$this->PatientModel->AddTemporaryTest($data);
            if($result>0)
                redirect('/Test/AddTest/'.$data['mobile_no']);

    }
    function ApplyCouponValue()
    {
            $coupon_value=$this->input->post('coupon_value');
            $contact_no=$this->input->post('contact_no');
            echo $coupon_value.$contact_no;
//            $result=$this->PatientModel->ApplyCoupon($coupon_value,$contact_no);
//            echo "<script>window.history.back();</script>";
    }
    function RemoveTempData($mobile=null,$rowid=null)
    {
        $this->PatientModel->RemoveTemporaryRows($rowid);
        redirect('/Test/AddTest/'.$mobile);
    }
    function SaveTransaction($customer_contact=null)
    {
        $total_price=0;
        $temp_data=$this->PatientModel->ListTemporaryTest($customer_contact);
        foreach ($temp_data as $data)
        {
            $total_price=$total_price+$data->test_price;
        }
        $data1['price']=$total_price;
        $data1['lab_id']=$this->session->client_id;
        $data1['patient_contact_no']=$customer_contact;
        $data1['transaction_id']=md5(rand());
        $data1['transaction_by']=$this->session->client_id;
   $result=$this->PatientModel->AddTransaction($data1);

            if($result>0)
            {
                foreach ($temp_data as $list)
                {
                    $history['transaction_row_id']=$result;
                    $history['test_id']=$list->test_id;
                    $history['mobile_no']=$list->mobile_no;
                    $history['price']=$list->test_price;
                    $history['transaction_by']=$this->session->client_id;
                    $result2=$this->PatientModel->SaveHistory($history);
                }
                if($result2>0)
                {
                    $status=$this->PatientModel->RemoveTempData($customer_contact);
                    if($status>0)
                        redirect('/Dashboard/Transactions/'.$customer_contact);
                }
            }

    }

}