<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data['content'] = 'login/login_view';
		$this->load->view('template', $data);
	}

	public function validate() 
	{
		echo "validate <br />";
		$this->doLogin();
	}

	public function doLogin()
	{
		$username = 'mike faas';
		$pw = 'password';
		$login = $this->ion_auth->login($username, $pw, TRUE);

		echo $login;
		// if ($this->ion_auth->login($username, $pw, TRUE)) {
		// 	echo "Logged IN!";
		// } else {
		// 	 echo "FAIL!";
		// }
	} 

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */