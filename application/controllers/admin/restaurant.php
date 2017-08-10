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


        $this->data['content'] = 'admin/restaurant/index';
        $this->load->view($this->template, $this->data);
    }
}
