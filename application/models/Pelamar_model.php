<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pelamar_model extends CI_Model {
	var $table = 'pelamar';
	var $column_order = array('id_pelamar','nama_pelamar',null);
	var $column_search = array('id_pelamar','nama_pelamar'); 
	var $order = array('id_pelamar' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function _get_datatables_query()
	{
		$this->db->from($this->table);
		$i = 0;
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->result();
	}

    public function create($table,$data)
	{
	    $query = $this->db->insert($table, $data);
	    return $this->db->insert_id();// return last insert id
	}

	public function update($where, $data)
	{
		$this->db->update('pelamar', $data, $where);
		return $this->db->affected_rows();
	}


    public function get_last_id() {
        $this->db->select_max('id_pelamar');
        $query = $this->db->get('pelamar');
        
        $result = $query->row();
        $last_id = (int) substr($result->id_pelamar, 3); // Mengambil angka dari belakang ID
        
        return $last_id;
    }


	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_pelamar',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function delete($item_id) {
        $this->db->where('id_pelamar', $item_id);
        $this->db->delete('pelamar');

        return $this->db->affected_rows() > 0;
    }
}
