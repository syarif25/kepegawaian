<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lembaga_model extends CI_Model {
	var $table = 'tb_lembaga';
	var $column_order = array('id_lembaga','nama_lembaga',null);
	var $column_search = array('id_lembaga','nama_lembaga'); 
	var $order = array('id_lembaga' => 'desc'); // default order 

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
		$this->db->update('tb_lembaga', $data, $where);
		return $this->db->affected_rows();
	}


    public function get_last_id() {
        $this->db->select_max('id_lembaga');
        $query = $this->db->get('tb_lembaga');
        
        $result = $query->row();
        $last_id = (int) substr($result->id_lembaga, 3); // Mengambil angka dari belakang ID
        
        return $last_id;
    }


	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_lembaga',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function delete($item_id) {
        // Lakukan proses penghapusan data sesuai kebutuhan
        // Contoh penghapusan data dari tabel 'items'
        $this->db->where('id_lembaga', $item_id);
        $this->db->delete('tb_lembaga');

        return $this->db->affected_rows() > 0;
    }
}
