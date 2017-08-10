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
class M_restaurant extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function kat_kantin()
    {
        $this->db->select('*');
        $this->db->from('kategori_kantin');
        // $this->db->where('post_id', $initial_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else return null;
    }

    public function get_all_kantin($initial_id="") {
        $this->db->select('*');
        $this->db->from('kantin');
        if( $initial_id != "" ){
            $this->db->where('id_kategori_kantin', $initial_id);
        }
        $query = $this->db->get();
        if($query->num_rows() > 0){
          return $query->result_array();  
        }else return null;
    }

    public function get_one_kantin($initial_id="") {
        $this->db->select('*');
        $this->db->from('kantin');
        $this->db->where('id_kategori_kantin', $initial_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else return null;
    }

}

?>
