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
class M_room extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
        parent::set_tabel('rooms', 'idrooms');
    }

    public function get_one_class($initial_id="") {
        $this->db->select('*');
        $this->db->from('class');
        $this->db->where('idclass', $initial_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else return null;
    }    

    public function del_room($id) {
        $q = $this->db->query('Delete from rooms where idrooms = ' . $id);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    public function getRoomByKelasId($initial_id) {
        $this->db->select('*');
        $this->db->from('rooms');
        $qr = $this->db->get();
        if($qr->num_rows() > 0){
            return $qr->result_array();
        }else return null;
    }

    public function get_allroom() {
        $data = $this->db->query(
                'SELECT r.* , c.price , c.`title` , 
                IFNULL(p.discount,0) AS discount , 
                IFNULL((c.price - c.`price` * (p.discount / 100)) , c.price) AS net  FROM rooms r
                LEFT JOIN class c ON c.`idclass` = r.`idclass`
                LEFT JOIN (
                SELECT * FROM promote
                WHERE STATUS = 1
                ) p ON p.idclass = r.`idclass`
                WHERE r.status = 0 
                GROUP BY idclass');
        return $data->result();
    }

    public function get_many_by($id) {
        $q = $this->db->query('SELECT * FROM (`rooms`) LEFT JOIN `guest` g ON `g`.`id` = `rooms`.`guest_id` WHERE `idclass` = ' . $id . ' ORDER BY `rooms`.`idrooms` ASC');
        return $q->result();
    }

    public function get_room($id = null) {
        $data = $this->db->query(
                'SELECT r.* , c.price , c.`title` , 
                IFNULL(p.discount,0) AS discount , 
                IFNULL((c.price - c.`price` * (p.discount / 100)) , c.price) AS net  FROM rooms r
                LEFT JOIN class c ON c.`idclass` = r.`idclass`
                LEFT JOIN promote p ON p.`idclass` = r.`idclass`
                WHERE r.status = 0 AND r.idclass= ' . $id . '
                GROUP BY idclass');
        return $data->result();
    }

    public function get_dropdown($idclass) {
        $data = array();
        foreach (parent::get_many_by_array(array('idclass' => $idclass, 'status' => 0)) as $row) {
            $data[$row['idrooms']] = $row['numbers'];
        }
        return $data;
    }

    public function add($data)
    {
        $this->db->insert('rooms', $data);
    }

}

?>
