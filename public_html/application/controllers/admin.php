<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {

	public function index()
	{
		$data['content'] = 'admin/admin_view';
		$this->load->view('template', $data);
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */