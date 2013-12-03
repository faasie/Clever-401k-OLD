<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			$data['content'] = 'login/login_view';
			$this->load->view('template', $data);
		}
		else 
		{
			redirect('login/profile', 'refresh');
		}
	}

// Need to figure out if this needs separate controller due to not checking if currently logged in...
	function profile()
	{
		$data['user'] = $this->ion_auth->user()->row();
		$data['content'] = 'login/profile_view';
		$this->load->view('template', $data);
	}

	function validate()
	{
		$user 	= $this->input->post('identity');
		$pw 	= $this->input->post('password');

		if ($this->ion_auth->login($user, $pw)) {
			redirect('login/profile','refresh');
		} else {
			echo "fail.";
		}
	}

	function logout()
	{
		$this->ion_auth->logout();
		$this->session->set_flashdata('type', 'alert-success');
		$this->session->set_flashdata('message', 'Logout successful.');
		redirect('site','refresh');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */