<?php
public class welcome extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function getMsg()
	{
		$this->db->get('msg')->result();
	}
}


?>