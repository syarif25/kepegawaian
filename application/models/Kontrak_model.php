<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrak_model extends CI_Model {
	var $table = 'kontrak_kerja';
	var $column_order = array('id_kontrak','nama_pelamar',null);
	var $column_search = array('id_kontrak','nama_pelamar'); 
	var $order = array('id_kontrak' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function _get_datatables_query()
	{
		// $this->db->from($this->table);
        $this->db->select('*');
        $this->db->from($this->table);
        // $this->db->join('magang', 'magang.id_magang = kontrak_kerja.nik', 'left');
        $this->db->join('pelamar', 'pelamar.nik = kontrak_kerja.nik', 'left');

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
		$this->db->update('kontrak_kerja', $data, $where);
		return $this->db->affected_rows();
	}

    public function get_last_id() {
        $this->db->select_max('id_kontrak');
        $query = $this->db->get('kontrak_kerja');
        
        $result = $query->row();
        $last_id = (int) substr($result->id_kontrak, 3); // Mengambil angka dari belakang ID
        
        return $last_id;
    }


	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_kontrak',$id);
		$query = $this->db->get();

		return $query->row();
	}
}
