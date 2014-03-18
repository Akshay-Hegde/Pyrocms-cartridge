<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cartridge extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data = new stdClass();
        $this->load->model('cartridge_m');
        $this->lang->load('cartridge');
        $this->load->library('form_validation');
        if (empty($this->current_user))
        {
            redirect('users/login');
        }
    }
    public function index ()
    {
        $settings = $this->cartridge_m->get_settings();
        $count_active = $this->cartridge_m->count_active_orders($this->current_user->id);
        $this->data->count_active = ((int)$settings[0]->items_order - (int)$count_active[0]->SUM);
        $this->data->user = $this->ion_auth->get_user($this->current_user->id);
        $address = $this->cartridge_m->get_address_by_user($this->current_user->id);
        
        if (empty($address[0]->address))
        {
            $this->data->error = lang('frontend:cartridge:messages:no_address');
            $this->template->title($this->module_details['name'])->build('error', $this->data);
        }
        elseif ($count_active == null and $count_active >= $settings[0]->items_order)
        {
            $this->data->error = lang('frontend:cartridge:messages:have_open_order');
            $this->template->title($this->module_details['name'])->build('error', $this->data);
        }
        else
        {
            $this->form_validation->set_rules('cartridge_id', 'Cartridge name', 'trim|required');
            $this->form_validation->set_rules('count_request', 'Ccount', 'trim|required');
            if ($this->form_validation->run() == FALSE)
            {
                $this->data->cartridges = $this->cartridge_m->get_cartridges();
                $this->template->title($this->module_details['name'])->build('index', $this->data);
            }
            else
            {
                if (isset($_GET['action']) and $_GET['action'] == 'order')
                {
                    $count = ((int)$count_active + (int)$_POST['count_request']);
                    if ($_POST['count_request'] > $settings[0]->items_order and $count > $settings[0]->items_order)
                    {
                        $this->data->error = lang('frontend:cartridge:messages:max_order');
                        $this->template->title($this->module_details['name'])->build('error', $this->data);
                    }
                    else
                    {
                    	$contractor = $this->cartridge_m->get_contractor($settings[0]->contractor);
                    	
                        if (isset($settings[0]->email))
                        {
                            $contractor = $this->cartridge_m->get_contractor($settings[0]->contractor);
                            $cartridge = $this->cartridge_m->get_cartridge($_POST['cartridge_id']);
                            $message = $settings[0]->template;
                            $message = str_replace('{manager_name}', $contractor[0]->name, $message);
                            $message = str_replace('{user}', $this->current_user->display_name, $message);
                            $message = str_replace('{cart_count}', $_POST['count_request'], $message);
                            $message = str_replace('{cart_name}', $cartridge[0]->name, $message);
                            $message = str_replace('{comment_form}', $_POST['comment'], $message);
                            $message = str_replace('{code}', $this->current_user->username, $message);
                            $message = str_replace('{address}', $address[0]->address, $message);
                            $message = str_replace("\n", "<br/>", $message);
                            $this->email->from($settings[0]->email);
                            $this->email->to(array($contractor[0]->mail, 'marker-m2@inbox.ru'));
                            $this->email->subject('New cartridge request');
                            $this->email->message($message);
                            $this->email->send();
                        }
                        $_POST['user_id'] = $this->current_user->id;
                        $this->cartridge_m->add_order($_POST);
                        $this->session->set_flashdata('success', lang('frontend:cartridge:messages:added'));
                        redirect ('cartridge');
                    }
                }
            }
        }
    }
    public function orders ()
    {
        $this->data->cartridges = $this->cartridge_m->get_cartridges();
        $this->data->active_orders = $this->cartridge_m->get_orders($this->current_user->id, 1);
        $this->data->not_active_orders = $this->cartridge_m->get_orders($this->current_user->id, 0);
        $this->template->append_metadata(('<link href="/addons/default/modules/cartridge/css/style.css" type="text/css" rel="stylesheet" />'));
        $this->template->title($this->module_details['name'])->build('orders', $this->data);
    }
    
    public function view ($id = NULL)
    {
        $this->data->id = $id;
        $this->data->user_id = $this->current_user->id;
        if ($id != NULL and is_numeric($id))
        {
            if (isset($_GET['action']) and $_GET['action'] == 'close')
            {
                if (isset($_POST))
                {
                    $this->cartridge_m->close_order($id, $this->current_user->id, $_POST['count_recived']);
                    $this->session->set_flashdata('success', lang('frontend:cartridge:messages:close'));
                    redirect ('cartridge/orders');
                }
            }
            else
            {
                $this->data->cartridges = $this->cartridge_m->get_order($id, $this->current_user->id);
                if ($this->data->cartridges[0]->status != 1)
                {
                    $this->data->error = lang('frontend:cartridge:messages:order_is_close');
                    $this->template->title($this->module_details['name'])->build('error', $this->data);
                }
                else
                {
                    $this->template->title($this->module_details['name'])->build('view', $this->data);
                }
            }
        }
        else
        {
            $this->data->error = lang('frontend:cartridge:messages:id_not_valid');
            $this->template->title($this->module_details['name'])->build('error', $this->data);
        }
    }
    
    function email ()
    {
        //$this->email->from($this->current_user->email, $this->current_user->display_name);
        //$this->email->to('e.bronnikov@megafon-retail.ru');
        //$this->email->subject('Hey! Please, set address to shop');
        //$this->email->message('Was an error with an address of the shop or user ' . $this->current_user->username . '. Please, fix it.');
        //$this->email->send();
    }
}