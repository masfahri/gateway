<?php 


class Restaurant extends Admin_Controller {

	var $template = 'admin/template';

    function __construct() {
        parent::__construct();
        $this->load->model('m_restaurant');
    }

    function index() {
        $this->load->model('m_restaurant');
        $this->data['kat_kantin'] = $this->m_restaurant->kat_kantin();
        $this->data['kantin']  =  $this->m_restaurant->get_one_kantin();
        $this->data['all'] = $this->m_restaurant->get_all_kantin();
        $this->data['jumlah'] = count($this->data['kantin']);
        if (isset($_GET['id'])) {
            $this->data['kantin']  =  $this->m_restaurant->get_one_kantin($_GET['id']);
            $this->data['hitung'] = $this->m_restaurant->countKantin($_GET['id']);
        }
        if ($this->input->post('add')) {
            $id_kategori_kantin= $this->input->post('id_kategori_kantin');
                $data = array(
                    'id_kategori_kantin' => $id_kategori_kantin,
                    'nama_makanan' => $this->input->post('nama_makanan'));
                $this->m_restaurant->add($data);
            $this->session->set_flashdata('success', 'Makanan Terupdated');
            redirect('admin/restaurant');
        }

        $this->data['content'] = 'admin/restaurant/index';
        $this->load->view($this->template, $this->data);
    }
}
