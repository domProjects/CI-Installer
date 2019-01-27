<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends CI_Controller {

	protected $config_tpl;
	protected $config_src;
	protected $db_tpl;
	protected $db_src;
	protected $site_url;
	protected $data = array();

	public function __construct()
	{
		parent::__construct();

		$this->data = array();

		// Load Helper & Library CodeIgniter
		$this->load->helper('url');
		$this->load->library('form_validation');

		//
		$this->config_tpl = 'install/src-ci/config.php';
		$this->config_src = 'application/config/config.php';

		//
		$this->db_tpl = 'install/src-ci/database.php';
		$this->db_src = 'application/config/database.php';

		//
		if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')
		{
		    $is_secure = TRUE;
		}
		elseif ( ! empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' OR ! empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on')
		{
		    $is_secure = TRUE;
		}
		else
		{
			$is_secure = FALSE;
		}

		$protocol = $is_secure ? 'https' : 'http';

		$this->site_url = $protocol.'://'.str_replace('[::1]', 'localhost', $_SERVER['HTTP_HOST']).str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
	}

	public function index()
	{
		//
		$this->data['site_url'] = $this->site_url;

		//
		$this->form_validation->set_rules('base-url', 'Base URL', 'trim|required');
		$this->form_validation->set_rules('db-hostname', 'Address of the database', 'trim|required');
		$this->form_validation->set_rules('db-login', 'Login', 'trim|required');
		$this->form_validation->set_rules('db-password', 'Password');
		$this->form_validation->set_rules('db-name', 'Name of the database', 'trim|required');
		$this->form_validation->set_rules('db-prefix', 'Prefix of tables', 'trim|required');

		//
		if ($this->form_validation->run() == FALSE)
		{
			// Load view step 1
			$this->load->view('step_1', $this->data);
		}
		else
		{
			// Load Helper CodeIgniter
			$this->load->helper('file');

			//
			// File .htaccess gestion
			//
			if ($this->input->post('clean-url') == 'true')
			{
				$htaccess_filename = '.htaccess';

				if ( ! file_exists($htaccess_filename))
				{
					$hta = 'RewriteEngine On'."\r\n";
					$hta .= 'RewriteCond %{REQUEST_FILENAME} !-f'."\r\n";
					$hta .= 'RewriteCond %{REQUEST_FILENAME} !-d'."\r\n";
					$hta .= 'RewriteRule ^(.*)$ index.php/$1 [L]';

					$this->data['htaccess_exist'] = $this->_result('NO', 'info');

					if ( ! write_file($htaccess_filename, $hta))
					{
						$this->data['htaccess_create'] = $this->_result('KO', 'danger');
						$this->data['htaccess_write'] = $this->_result('KO', 'danger');
					}
					else
					{
						$this->data['htaccess_create'] = $this->_result('OK', 'success');
						$this->data['htaccess_write'] = $this->_result('OK', 'success');
					}
				}
				else
				{
					$this->data['htaccess_exist'] = $this->_result('OK', 'success');
					$this->data['htaccess_create'] = $this->_result('NO', 'warning');
					$this->data['htaccess_write'] = $this->_result('NO', 'warning');
				}
			}
			else
			{
				$this->data['htaccess_exist'] = $this->_result('-', 'dark');
				$this->data['htaccess_create'] = $this->_result('-', 'dark');
				$this->data['htaccess_write'] = $this->_result('-', 'dark');
			}

			//
			// File config.php gestion
			//
			$config_tpl_content = file_get_contents($this->config_tpl, FILE_USE_INCLUDE_PATH);
			$config_values = str_replace('%BASEURL%', $this->input->post('base-url'), $config_tpl_content);

			if ($this->input->post('clean-url') == 'true')
			{
				$config_values = str_replace('%INDEXPAGE%', '', $config_values);
			}
			else
			{
				$config_values = str_replace('%INDEXPAGE%', 'index.php', $config_values);
			}

			if (file_exists($this->config_src))
			{
				$this->data['config_exist'] = $this->_result('OK', 'success');

				if ( ! write_file($this->config_src, $config_values, 'w+'))
				{
					$this->data['config_write'] = $this->_result('KO', 'danger');
				}
				else
				{
					$this->data['config_write'] = $this->_result('OK', 'success');
				}
			}
			else
			{
				$this->data['config_exist'] = $this->_result('NO', 'danger');
				$this->data['config_write'] = $this->_result('NO', 'danger');
			}

			//
			// File database.php gestion
			//
			$db_tpl_content = file_get_contents($this->db_tpl, FILE_USE_INCLUDE_PATH);
			$db_values = str_replace('%HOSTNAME%', $this->input->post('db-hostname'), $db_tpl_content);
			$db_values = str_replace('%USERNAME%', $this->input->post('db-login'), $db_values);
			$db_values = str_replace('%PASSWORD%', $this->input->post('db-password'), $db_values);
			$db_values = str_replace('%DATABASE%', $this->input->post('db-name'), $db_values);
			$db_values = str_replace('%PREFIXE%', $this->input->post('db-prefix'), $db_values);

			if (file_exists($this->db_src))
			{
				$this->data['db_exist'] = $this->_result('OK', 'success');

				if ( ! write_file($this->db_src, $db_values, 'w+'))
				{
					$this->data['db_write'] = $this->_result('KO', 'warning');
				}
				else
				{
					$this->data['db_write'] = $this->_result('OK', 'success');
				}
			}
			else
			{
				$this->data['db_exist'] = $this->_result('NO', 'danger');
				$this->data['db_write'] = $this->_result('NO', 'danger');
			}

			// Load view step 2
			$this->load->view('step_2', $this->data);
		}
	}

	public function db_test()
	{
		$host = $_POST['host'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$base = $_POST['base'];

		$cnx = @mysqli_connect($host, $user, $pass);

		if ($cnx)
		{
			if (@mysqli_select_db($cnx, $base))
			{
				echo $this->_result('Successful database connection', 'success');
			}
			else
			{
				echo $this->_result('The database does not exist', 'danger');
			}
		}
		else
		{
			echo $this->_result('Error in the connection string', 'danger');
		}
	}

	public function _result($text = '', $status = '')
	{
		return '<span class="badge badge-'.$status.'">'.$text.'</span>';
	}
}
