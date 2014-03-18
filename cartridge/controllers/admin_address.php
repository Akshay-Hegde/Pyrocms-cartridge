<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_address extends Admin_Controller {

    protected $section = 'address';
    
    public function __construct()
    {
	parent::__construct();
	$this->load->library('form_validation');
	$this->load->model('cartridge_m');
	$this->lang->load('cartridge');
	$this->load->model('users/user_m');
	$this->data = new stdClass();
    }
    public function index ()
    {
	$q = isset($_GET['q']) ? $_GET['q'] : '';
	$this->data->address = $this->cartridge_m->get_address();
	if (isset($_GET['q']))
	{
	    $this->data->users = $this->db->select('users.id, users.username, profiles.display_name')->
				    from('profiles')->
				    join('users', 'profiles.user_id = users.id')->
				    like('username', $_GET['q'])->
				    or_like('profiles.display_name', $_GET['q'])->
				    get()->result();
	}
	else
	{
	    $this->data->users = $this->db->select('id, username')->get('users')->result();
	}
        $this->template->title($this->module_details['name'])->build('admin/address', $this->data);
    }
    
    public function edit ($id = NULL)
    {
        $this->data->address = $this->cartridge_m->get_address_by_user($id);
	$this->data->active_id = $id;
	$this->template->title($this->module_details['name'])->build('admin/address_form', $this->data);
    }
    
    public function delete ($id = NULL)
    {
	$this->cartridge_m->delete_address($id);
	$this->session->set_flashdata('success', lang('message_deleted_succesfully'));
	redirect ('/admin/cartridge/address');
    }
    
    public function save ()
    {
	if (isset($_POST) and isset($_POST['user']))
	{
	    $check = $this->cartridge_m->check_address($_POST['user']);
	    if ($check == 0)
	    {
		$this->cartridge_m->add_address($_POST);
		$this->session->set_flashdata('success', lang('message_added_succesfully'));
	    }
	    else
	    {
		$this->cartridge_m->update_address($_POST);
		$this->session->set_flashdata('success', lang('message_updated_succesfully'));
	    }
	    redirect ('/admin/cartridge/address');
	}
    }
}