<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends CI_Controller {

	public $site_url;

	public function __construct()
	{
		parent::__construct();

		// Load Helper
		$this->load->helper('url');

		//
		if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')
		{
		    $is_secure = TRUE;
		}
		elseif ( ! empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || ! empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on')
		{
		    $is_secure = TRUE;
		}
		else
		{
			$is_secure = FALSE;
		}

		$protocol = $is_secure ? 'https' : 'http';

		$this->site_url = $protocol.'://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
	}

	public function index()
	{
		//
		$data['site_url'] = $this->site_url;

		//
		$this->load->view('install', $data);
	}
}
