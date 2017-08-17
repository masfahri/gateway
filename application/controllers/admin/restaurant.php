<?php


class Restaurant extends Admin_Controller {

  var $template = 'admin/template';
  var $gallerypath;
  var $gallery_path_url;

    function __construct() {
        parent::__construct();
        $this->load->model('m_restaurant');
        $this->gallerypath = realpath(APPPATH . '../assets/img');
        $this->gallery_path_url = base_url() . 'assets/img/';
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
                    'nama_makanan' => $this->input->post('nama_makanan'),
                    'deskripsi_makanan' => $this->input->post('deskripsi_makanan'),
                    'harga_makanan' => $this->input->post('price'));
                $config = array(
                    'allowed_types' => 'jpg|jpeg|gif|png',
                    'upload_path' => $this->gallerypath,
                    'max_size' => 2000,
                    'file_name' => strtolower($data['title'])
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto_makanan')) {
                    $file1 = $this->upload->data();
                    $konfigurasi = array(
                        'source_image' => $file1['full_path'],
                        'new_image' => $this->gallerypath . '/thumbnails',
                        'maintain_ratio' => false,
                        'width' => 300,
                        'height' => 100
                    );
                    $this->load->library('image_lib', $konfigurasi);
                    $this->image_lib->resize();
                    $data['foto_makanan'] = $file1['file_name'];
                $this->m_restaurant->add($data);
            $this->session->set_flashdata('success', 'Makanan Sudah Di Tambahkan');
            redirect('admin/restaurant');
        }
      }
      $this->data['content'] = 'admin/restaurant/index';
      $this->load->view($this->template, $this->data);
    }

    public function aktif($idclass = 0, $id = 0, $aktif = 0) {
        $id OR redirect(site_url('admin/restaurant'));
        $this->m_restaurant->update(array('status' => $aktif), $id);
        redirect(site_url('admin/restaurant?id=' . $idclass));
    }
}
