<?php

class My_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

}
class Admin_Controller extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    function show($pagename,$data)
    {
        $this->load->view('header');
        $this->load->view($pagename,$data);
        $this->load->view('footer');
    }
}

class Backend_Controller extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    function show($pagename,$data)
    {
        // $this->load->view('header');
        $this->load->view('Admin/Backend/admin_backmenu');
        $this->load->view($pagename,$data);
        $this->load->view('footer');
    }
}
class Report_Controller extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    function show($pagename,$data)
    {
        // $this->load->view('header');
        $this->load->view('header');
        $this->load->view('/CommonReportPart',$data);
        $this->load->view($pagename,$data);
        $this->load->view('footer');
    }
}
class Admin extends My_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function view($pagename,$data)
    {
        $this->load->view('head_menu');
        $this->load->view($pagename,$data);
        $this->load->view('foot_menu');
    }
}


?>