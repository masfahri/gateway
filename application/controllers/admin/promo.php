<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of promo
 *
 * @author Syiewa
 */
class Promo extends Admin_Controller {

    //put your code here
    var $template = 'admin/template';
    var $aktif = array(
        '0' => 'Non-Aktif',
        '1' => 'Aktif'
    );

    public function __construct() {
        parent::__construct();
        $this->load->model('m_promo');
        $this->load->model('m_kelas');
        $this->load->model('m_room');

    }

    public function index() {
        $this->data['promo'] = $this->m_promo->get_all(1);
        $this->data['class'] = $this->m_kelas->get_dropdown();
        $this->data['getAll'] = $this->m_promo->getAllKelasRooms();

        $this->data['content'] = 'admin/promo/index';
        $this->load->view($this->template, $this->data);
    }

    public function addAjaxKelas($idKelas)
    {
      $this->data['getKelas'] = $this->m_room->getRoomByKelasId($idKelas);
      $kelas = $this->m_promo->getRoomById($idKelas);
      $data = "<option value=''>- Pilih Kelas -</option>";
      foreach ($kelas as $kelas) {
        $data .="<option value='".$kelas['idrooms']."'>".$kelas['numbers']."</option>";
      }
      echo $data;
    }

    public function aktif($id = 0, $aktif = 0) {
        $id OR redirect(site_url('admin/promo'));
        $this->m_promo->update(array('status' => $aktif), $id);
        redirect(site_url('admin/promo'));
    }

     public function add() {
        $this->load->model('m_promo');
        $this->data['getAll'] = $this->m_promo->getAllKelasRooms();
        $this->data['get'] = $this->m_kelas->get_array();
        $this->data['content'] = 'admin/promo/add';
        $this->load->view('admin/modal', $this->data);
        if ($this->input->post('submit')) {
            $data = array(
                    'idclass'     => $this->input->post('idclass'),
                    'idrooms'     => $this->input->post('idrooms'),
                    'title'       => $this->input->post('title'),
                    'start_date'  => $this->input->post('start_date'),
                    'end_date'    => $this->input->post('end_date'),
                    'discount'    => $this->input->post('discount'),
                    'description' => $this->input->post('description'),
                    'status'      => '1');
        $this->m_promo->add($data);
        $this->session->set_flashdata('success', 'Promo Sudah Di Tambahkan');
        redirect('admin/promo');
        }
        //$this->data['promo'] = $this->m_promo->get_promokelas();
    }

    public function edit($id = 1) {
        $this->data['promo'] = $this->m_promo->get(1);
        $this->data['aktif'] = $this->aktif;
        $this->data['class'] = $this->m_kelas->get_dropdown();
        if ($this->input->post('update')){
            $data = $this->m_promo->array_from_post(array('idclass','title','discount','start_date','end_date','description','status'));
            $this->m_promo->update($data,1);
            $this->session->set_flashdata('success', 'Promosi Updated');
            redirect('admin/promo');
        }
        $this->data['content'] = 'admin/promo/edit';
        $this->load->view('admin/modal', $this->data);
    }

}

?>
