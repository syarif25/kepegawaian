<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {
	var $table = 'pengguna';
	var $column_order = array('id_pengguna','username',null);
	var $column_search = array('id_pengguna','username'); 
	var $order = array('id_pengguna' => 'desc'); // default order 

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
		$this->db->update('pengguna', $data, $where);
		return $this->db->affected_rows();
	}


    public function get_last_id() {
        $this->db->select_max('id_pengguna');
        $query = $this->db->get('pengguna');
        
        $result = $query->row();
        $last_id = (int) substr($result->id_pengguna, 3); // Mengambil angka dari belakang ID
        
        return $last_id;
    }


	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_pengguna',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function delete($item_id) {
        // Lakukan proses penghapusan data sesuai kebutuhan
        // Contoh penghapusan data dari tabel 'items'
        $this->db->where('id_pengguna', $item_id);
        $this->db->delete('pengguna');

        return $this->db->affected_rows() > 0;
    }
}
