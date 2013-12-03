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
			redirect('user/profile', 'refresh');
		}
	}

	function validateLogin()
	{
		$user 	= $this->input->post('identity');
		$pw 	= $this->input->post('password');

		if ($this->ion_auth->login($user, $pw)) {
			redirect('user/profile','refresh');
		} else {
			echo "fail.";
		}
	}

	function changePassword()
	{
		$this->form_validation->set_rules('old_pw', 'old password', 'trim|required|xss_clean');
		$this->form_validation->set_rules(
			'new_pw', 
			'new password', 
			'trim|required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|xss_clean');
		$this->form_validation->set_rules(
			'verify_pw', 
			'verify password', 
			'trim|required|matches[new_pw]|xss_clean');

		if ($this->form_validation->run() == false)
		{
			$this->session->set_flashdata('type', 'alert-danger');
			$this->session->set_flashdata('message', validation_errors());
			redirect('user/password', 'redirect');
		} else {
			$identity 	= $this->session->userdata('username');
			$old_pw		= $this->input->post('old_pw');
			$new_pw 	= $this->input->post('new_pw');
			$change 	= $this->ion_auth->change_password($identity, $old_pw, $new_pw);
			if($change) {
				$this->session->set_flashdata('type', 'alert-success');
				$this->session->set_flashdata('message', 'Password successfully changed.');
				redirect('user/profile', 'redirect');
			} else {
				$this->session->set_flashdata('type', 'alert-danger');
				$this->session->set_flashdata('message', 'Password change FAILED. Please try again!');
				redirect('user/profile', 'redirect');
			}
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