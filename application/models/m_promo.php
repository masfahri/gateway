<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_kelas
 *
 * @author Syiewa
 */
class M_promo extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
        parent::set_tabel('promote', 'idpromo');

<<<<<<< HEAD
=======
    }
    public function del_promo($id) {
        $q = $this->db->query('Delete from promote where idpromo = ' . $id);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
>>>>>>> origin/hapus-promo
    }

    public function getAllKelasRooms($value='')
    {
      $this->db->select('*')
               ->from('class');
      $query = $this->db->get();
      if($query->num_rows() > 0){
        return $query->result_array();
      }else return null;
    }

    public function getRoomById($value='')
    {
      $this->db->select('*')
               ->from('rooms');
      if( $value != "" ){
        $this->db->where('idclass', $value);
      }
      $query = $this->db->get();
      if($query->num_rows() > 0){
        return $query->result_array();
      }else return null;
    }
    public function get_promo($initial_id="")
    {
      $this->db->select('*');
      $this->db->from('promote');
      $this->db->where('idpromo', $initial_id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
          return $query->row_array();
        }else return null;
    }
    public function get_all($initial_id="") {
        $this->db->select('*');
        $this->db->from('promote');
        if( $initial_id != "" ){
            $this->db->where('idpromo', $initial_id);
        }
        //$this->db->order_by('create_date','desc');
        $query = $this->db->get();
        if($query->num_rows() > 0){
          return $query->result_array();
        }else return null;
    }

    public function get_promokelas() {
        $this->db->select('promote.title as nmprom, class.*, promote.*');
        $this->db->from('promote');
        $this->db->join('class', 'promote.idclass = class.idclass','left');
        $this->db->where('end_date >=', date('Y-m-d'));
        $this->db->where('promote.status', 1);
        $this->db->group_by('promote.idpromo');
        $query = $this->db->get();
        if($query->num_rows() > 0){
          return $query->result_array();
        }else return null;    
    }

    public function add($data)
    {
        $this->db->insert('promote', $data);
    }

}

?>
