<?php
/**
 * Created by PhpStorm.
 * User: MyRobo
 * Date: 2/8/2017
 * Time: 8:23 PM
 */
class AdminDashboard extends Backend_Controller
{

        function __construct()
        {
            parent::__construct();

        }
        function index()
        {
            $data['msg']='';
            $this->show('/Admin/Backend/Dashboard',$data);
        }
}