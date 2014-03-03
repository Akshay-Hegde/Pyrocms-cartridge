<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_cartridges extends Admin_Controller {

    protected $section = 'cartridges';
    
    public function __construct()
    {
	parent::__construct();
	$this->load->library('form_validation');
	$this->load->model('cartridge_m');
	$this->lang->load('cartridge');
	$this->data = new stdClass();
    }
    
    public function index ($action = NULL, $id = NULL)
    {
	$this->data->cartridges = $this->cartridge_m->get_cartridges();
	$this->template->title($this->module_details['name'])->build('admin/cartridges', $this->data);
    }
    
    public function add ()
    {
        $this->template->title($this->module_details['name'])->build('admin/cartridge_form', $this->data);
    }
    
    public function edit ($id = null)
    {
        $this->data->cartridge = $this->cartridge_m->get_cartridge($id);
        $this->template->title($this->module_details['name'])->build('admin/cartridge_form', $this->data);
    }
    
    public function delete ($id = null)
    {
        $this->cartridge_m->delete_cartridge($id);
        $this->session->set_flashdata('success', "Cartridge deleted");
        redirect ('/admin/cartridge/cartridges');
    }
    public function save ()
    {
	if (isset($_POST) and isset($_POST['id']))
	{
	    $this->cartridge_m->update_cartridge($_POST);
	    $this->session->set_flashdata('success', "cardridge " . $_POST['name'] . " updated");
	    redirect ('/admin/cartridge/cartridges');
	}
	elseif (isset($_POST) and empty($_POST['id']))
	{
	    $this->cartridge_m->add_cartridge($_POST);
	    $this->session->set_flashdata('success', "cardridge " . $_POST['name'] . " added");
	    redirect ('/admin/cartridge/cartridges');
	}
    }
}