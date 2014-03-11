<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cartridge_m extends MY_Model
{
    public function get_contrators ()
    {
        return $this->db->get('cartridge_contractors')->result();
    }
    
    public function get_contractor ($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('cartridge_contractors')->result();
    }
    
    public function update_contractor ($input)
    {
	$data = array(
            'name' => $input['name'],
            'phone' => $input['phone'],
            'mail' => $input['mail'],
            'address' => $input['address'],
            'active' => $input['active'],
            'comment' => $input['comment']
            );

	$this->db->where('id', $input['id']);
	$this->db->update('cartridge_contractors', $data);
    }
    
    public function add_contractor ($input)
    {
	$this->db->set('name', $input['name']);
        $this->db->set('phone', $input['phone']);
        $this->db->set('mail', $input['mail']);
        $this->db->set('address', $input['address']);
        $this->db->set('active', $input['active']);
        $this->db->set('comment', $input['comment']);
	$this->db->insert('cartridge_contractors');
    }
    
    public function delete_contractor ($id)
    {
	$this->db->where('id', $id);
	$this->db->delete('cartridge_contractors');
    }

    public function get_settings ()
    {
        return $this->db->get('cartridge_settings')->result();
    }
    
    public function add_settings ($input)
    {
	$this->db->set('contractor', $input['contractor']);
        $this->db->set('email', $input['email']);
        $this->db->set('template', $input['template']); //items_order
        $this->db->set('items_order', $input['items_order']); 
	$this->db->insert('cartridge_settings');
    }
    
    public function update_settings ($input)
    {
	$data = array(
            'contractor' => $input['contractor'],
            'email' => $input['email'],
            'template' => $input['template'],
            'items_order' => $input['items_order'],
            );

	$this->db->where('id', $input['id']);
	$this->db->update('cartridge_settings', $data);
    }
    
    public function get_cartridges ()
    {
        return $this->db->get('cartridge_list')->result();
    }

    public function get_cartridge ($id)
    {
	$this->db->where('id', $id);
        return $this->db->get('cartridge_list')->result();
    }
    
    public function add_cartridge ($input)
    {
	$this->db->set('name', $input['name']);
	$this->db->insert('cartridge_list');
    }
    
    public function update_cartridge ($input)
    {
	$data = array(
            'name' => $input['name'],
            );
	$this->db->where('id', $input['id']);
	$this->db->update('cartridge_list', $data);
    }
    
    public function delete_cartridge ($id)
    {
	$this->db->where('id', $id);
	$this->db->delete('cartridge_list');
    }
    
    public function count_active_orders ($user)
    {
	$this->db->select('SUM(count_request) AS SUM');
	$this->db->where('user_id', $user);
	$this->db->where('status', 1);
	return $this->db->get('cartridge_orders')->result();
    }
    
    public function add_order ($input)
    {
	$this->db->set('cartridge_id', $input['cartridge_id']);
        $this->db->set('user_id', $input['user_id']);
        $this->db->set('count_request', $input['count_request']);
        $this->db->set('comment', $input['comment']);
        $this->db->set('status', 1); 
	$this->db->insert('cartridge_orders');
    }
    
    public function get_orders ($user_id, $active = '000')
    {
	if ($active != 000) { $this->db->where('status', $active); }
	$this->db->limit(5);
	$this->db->order_by('id', 'DESC');
	return $this->db->get('cartridge_orders')->result();
    }

    public function get_order ($id , $user)
    {
	$this->db->where('id', $id);
	$this->db->where('user_id', $user);
	return $this->db->get('cartridge_orders')->result();
    }
    
    public function close_order ($id, $user, $received)
    {
	$this->db->where('id', $id);
	$this->db->where('user_id', $user);
	$this->db->set('date_close', 'NOW()', FALSE);
	$data['count_recived'] = $received;
	$data['status'] = 0;
	$this->db->update('cartridge_orders', $data);
    }
    

    function get_address ()
    {
	return $this->db->get('cartridge_address')->result();
    }
    function get_address_by_user ($id)
    {
	$this->db->where('user', $id);
	return $this->db->get('cartridge_address')->result();
    }
    function update_address ($input)
    {
	$data = array(
        'address' => $input['address']
        );
	$this->db->where('user', $input['id']);
	return $this->db->get('cartridge_address')->result();
    }
    public function delete_address ($id)
    {
	$this->db->where('user', $id);
	$this->db->delete('cartridge_address');
    }
    public function add_address ($input)
    {
	$this->db->set('address', $input['address']);
        $this->db->set('user', $input['user']);
	$this->db->insert('cartridge_address');
    }
    public function check_address ($id)
    {
	$this->db->where('user', $id);
	return $this->db->get('cartridge_address')->num_rows();
    }
}