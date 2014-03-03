<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_contractor extends Admin_Controller {

    protected $section = 'contractor';
    
    public function __construct()
    {
	parent::__construct();
	$this->load->library('form_validation');
	$this->load->model('cartridge_m');
	$this->lang->load('cartridge');
	$this->data = new stdClass();
    }
    public function index ()
    {
	$this->data->contractors = $this->cartridge_m->get_contrators();
	$this->template->title($this->module_details['name'])->build('admin/contractor', $this->data);
	
    }
    
    public function add ()
    {
        $this->template->title($this->module_details['name'])->build('admin/contractor_form', $this->data);
    }
    
    public function edit ($id = NULL)
    {
	$this->data->contractor = $this->cartridge_m->get_contractor($id);
	$this->template->title($this->module_details['name'])->build('admin/contractor_form', $this->data);
    }
    
    public function delete ($id = NULL)
    {
	$this->cartridge_m->delete_contractor($id);
	$this->session->set_flashdata('success', "Contractor deleted successfly");
	redirect ('/admin/cartridge/contractor');
    }
    
    public function save ()
    {
	if (isset($_POST) and isset($_POST['id']))
	{
	    $this->cartridge_m->update_contractor($_POST);
	    $this->session->set_flashdata('success', "Contractor " . $_POST['name'] . " updated");
	    redirect ('/admin/cartridge/contractor');
	}
	elseif (isset($_POST) and empty($_POST['id']))
	{
	    $this->cartridge_m->add_contractor($_POST);
	    $this->session->set_flashdata('success', "Contractor " . $_POST['name'] . " added");
	    redirect ('/admin/cartridge/contractor');
	}
    }
}