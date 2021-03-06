<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questions extends Priv_Controller {

	private $demographics;
	private $financial;
	private $risk;

	function __construct()
	{
		parent::__construct();
		$this->load->model('questions_model');
		$this->load->library('form_builder');
		$this->load->library('form_validation');
		$this->load->library('question');
		$this->load->helper('form');
	}

	public function index()
	{
		$this->demographics 	= $this->questions_model->getQuestions('1');
		$this->financial 		= $this->questions_model->getQuestions('2');
		$this->risk 			= $this->questions_model->getQuestions('3');

		// echo "<pre>";
		// print_r($demographics);
		// echo "</pre>";

		$data = array(
			'content' 		=> 'questions/questions_view',
			'demographics'	=> $this->demographics,
			'financial'		=> $this->financial,
			'risk'			=> $this->risk
			);
		$this->load->view('template', $data);
	}

	function submit()
	{
		// echo "<pre>";
		// print_r($this->input->post());
		// echo "</pre>";
		// die;

		$this->form_validation->set_rules('1'	, 'Demographics-Education'			, 'trim|required|xss_clean');
		$this->form_validation->set_rules('2'	, 'Demographics-Age'				, 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('3'	, 'Demographics-Retire Age'			, 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('4'	, 'Financial-401K Amount'			, 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('5'	, 'Financial-401K Contribution'		, 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('6'	, 'Financial-Saving Enough'			, 'trim|required|xss_clean');
		$this->form_validation->set_rules('7'	, 'Financial-Houshold Income Enough', 'trim|required|xss_clean');
		$this->form_validation->set_rules('8'	, 'Financial-Life Event'			, 'trim|required|xss_clean');
		$this->form_validation->set_rules('9'	, 'Financial-Life Event Amount'		, 'trim|required|xss_clean');
		$this->form_validation->set_rules('10'	, 'Financial-Retirement Portion'	, 'trim|required|xss_clean');
		$this->form_validation->set_rules('11'	, 'Financial-Investment Length'		, 'trim|required|xss_clean');
		$this->form_validation->set_rules('12'	, 'Financial-Income Sources'		, 'trim|required|xss_clean');
		$this->form_validation->set_rules('18'	, 'Financial-Average American'		, 'trim|required|xss_clean');
		$this->form_validation->set_rules('19'	, 'Financial-Salary or Commission'	, 'trim|required|xss_clean');
		$this->form_validation->set_rules('13'	, 'Risk-Fluctuation'				, 'trim|required|xss_clean');
		$this->form_validation->set_rules('14'	, 'Risk-Declines'					, 'trim|required|xss_clean');
		$this->form_validation->set_rules('15'	, 'Risk-Degree'						, 'trim|required|xss_clean');
		$this->form_validation->set_rules('16'	, 'Risk-Percent Downturn'			, 'trim|required|xss_clean');
		$this->form_validation->set_rules('17'	, 'Risk-Three Month'				, 'trim|required|xss_clean');
		$this->form_validation->set_rules('20'	, 'Risk-Losses or Gains'			, 'trim|required|xss_clean');


		// RUN form validation here and determine outputs...
		// NEED to figure out how to re-populate form -> redirect clears out $_POST and any other way won't re-query DB for questions (not efficiently)
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('type', 'alert-danger');
			$this->session->set_flashdata('message', validation_errors());
			redirect('questions/index');

		} else {
			$set_id = $this->questions_model->createDataSet($this->input->post('user_id'));
			foreach ($this->input->post() as $question => $value) {
				if ($question == 'user_id') { continue; }
				else {
				$data = array(
					'u_set_id' 	=> $set_id,
					'q_id'		=> $question,
					'q_value'	=> $value
					 );
				$this->db->insert('u_answers', $data);
				}
			}
			$this->session->set_flashdata('type', 'alert-success');
			$this->session->set_flashdata('message', 'Answers successfully recorded.');
			redirect('dashboard/index');
		}
	}

}

/* End of file questions.php */
/* Location: ./application/controllers/questions.php */