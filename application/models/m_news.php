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
class M_news extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
        parent::set_tabel('post_article', 'post_id');

    }

    public function get_all($initial_id="") {
        $this->db->select('*');
        $this->db->from('post_article');
        if( $initial_id != "" ){
            $this->db->where('post_id', $initial_id);
        }
        $this->db->order_by('create_date','desc');
        $query = $this->db->get();
        if($query->num_rows() > 0){
          return $query->result_array();
        }else return null;
    }

    public function get_one($initial_id) {
        $this->db->select('*');
        $this->db->from('post_article');
        $this->db->where('post_id', $initial_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else return null;
    }

}

?>
