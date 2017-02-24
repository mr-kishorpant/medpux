<?php
/**
 * Created by PhpStorm.
 * User: MyRobo
 * Date: 2/8/2017
 * Time: 7:44 PM
 */
class AuthenticationModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function CheckAuthetication($data)
    {
        if(empty($data['client_id'])|| empty($data['client_password']))
        {
            $result['msg']='Some Empty Field Found';

        }
        else
        {
            $this->db->where('client_id',$data['client_id']);
            $this->db->where('client_password',md5($data['client_password']));
            return $this->db->get('client')->row();
        }
    }
}