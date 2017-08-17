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
        parent::set_tabel('class', 'idclass');
        parent::set_tabel('rooms', 'idrooms');
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
        $this->db->select('promote.idpromo, class.title as "nmclass", class.price, promote.discount, promote.start_date, promote.end_date, promote.description as "desc", promote.title as "prom", foto_produk.thumb');
        $this->db->join('class', 'promote.idclass = class.idclass','left');
        $this->db->join('foto_produk', 'promote.idclass = foto_produk.idclass','left');
        $this->db->where('promote.end_date >=', date('Y-m-d'));
        $this->db->where('promote.status', 1);
        $this->db->group_by('promote.idpromo');
        return parent::get_all();
    }

}

?>
