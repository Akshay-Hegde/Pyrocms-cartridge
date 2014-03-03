<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Admin_Controller {

    protected $section = 'cartidge';
    
    public function __construct()
    {
	parent::__construct();
	$this->load->library('form_validation');
	$this->load->model('cartridge_m');
	$this->lang->load('cartridge');
	$this->data = new stdClass();
    }

    public function index()
    {
	$this->form_validation->set_rules('contractor', 'Select the contractor', 'trim|required');
	$this->form_validation->set_rules('template', 'Template', 'trim|required');
		
	if ($this->form_validation->run() == FALSE)
	{
	    $this->data->settings = $this->cartridge_m->get_settings();
	    $this->data->contractors = $this->cartridge_m->get_contrators();
	    $this->template->title($this->module_details['name'])->build('admin/index', $this->data);
	}
            else
            {
                if (isset($_GET['action']) and $_GET['action'] == 'save')
                {
                    if (isset($_POST) and isset($_POST['id']))
                    {
                        $this->cartridge_m->update_settings($_POST);
                        $this->session->set_flashdata('success', "Settings updated");
                        redirect ('/admin/cartridge');
                    }
                    else
                    {
                        $this->cartridge_m->add_settings($_POST);
                        $this->session->set_flashdata('success', "Settings added");
                        redirect ('/admin/cartridge');
                    }
                }
            }
    }
}