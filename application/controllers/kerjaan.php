<?php defined('BASEPATH') OR exit('No direct script access allowed');

class kerjaan extends MY_Controller {

  public function __construct()
  {
    parent::__construct();

    $this->cekLogin();
    $this->load->model('model_pekerjaan');
  }

  public function index()
  {
    $this->load->library('pagination');
    $config['base_url'] = base_url('kerjaan/index/');
    $config['total_rows'] = $this->model_pekerjaan->get()->num_rows();
    $config['per_page'] = 10;
    $config['offset'] = $this->uri->segment(3);
    $config['first_link'] = false;
    $config['last_link'] = false;

    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';

    $config['num_tag_open'] = '<li class="waves-effect">';
    $config['num_tag_close'] = '</li>';

    $config['prev_tag_open'] = '<li class="waves-effect">';
    $config['prev_tag_close'] = '</li>';

    $config['next_tag_open'] = '<li class="waves-effect">';
    $config['next_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';

    $this->pagination->initialize($config);
    $data['pageTitle'] = 'Regulator';
    $data['kerjaan'] = $this->model_pekerjaan->get_offset($config['per_page'], $config['offset'])->result();
    $data['pageContent'] = $this->load->view('kerjaan/listpekerjaan', $data, TRUE);


    $this->load->view('template/layout', $data);
  }

  public function add()
  {
    if ($this->input->post('submit')) {

      $this->form_validation->set_rules('desk_pekerjaan', 'desk_pekerjaan', 'required');
      $this->form_validation->set_rules('tgl_mulai', 'tgl_mulai', 'required');
      $this->form_validation->set_rules('tgl_berakhir', 'tgl_berakhir', 'required');
      $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
      $this->form_validation->set_rules('status', 'status', 'required');
      
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');

			if ($this->form_validation->run() === TRUE) {

        $data = array(
          'desk_pekerjaan' => $this->input->post('desk_pekerjaan'),
          'tgl_mulai' => date_format(date_create($this->input->post('tgl_mulai')), 'Y-m-d'),
          'tgl_berakhir' => date_format(date_create($this->input->post('tgl_berakhir')), 'Y-m-d'),
          'keterangan' => $this->input->post('keterangan'),
          'status' => $this->input->post('status')
        );

        $query = $this->model_pekerjaan->insert($data);
        if ($query) $message = array('status' => true, 'message' => 'Berhasil menambahkan Regulator');
        else $message = array('status' => false, 'message' => 'Gagal menambahkan Regulator');

        $this->session->set_flashdata('message', $message);
        redirect('kerjaan/add', 'refresh');
			}
    }

    $data['pageTitle'] = 'Tambah Data Regulator';
    $data['pageContent'] = $this->load->view('kerjaan/tambahpekerjaan', $data, TRUE);
    $this->load->view('template/layout', $data);
  }


  public function detail($id_pekerjaan = null)
  {

    $kerjaan = $this->model_pekerjaan->get_where(array('id_pekerjaan' => $id_pekerjaan))->row();

    if (!$kerjaan) show_404();

    $data['pageTitle'] = 'Detail Regulator';
    $data['kerjaan'] = $kerjaan;
    $data['pageContent'] = $this->load->view('kerjaan/detailpekerjaan', $data, TRUE);

    $this->load->view('template/layout', $data);
  }

  public function edit($id_pekerjaan = null)
  {
    if ($this->input->post('submit')) {

      $this->form_validation->set_rules('desk_pekerjaan', 'desk_pekerjaan', 'required');
      $this->form_validation->set_rules('tgl_mulai', 'tgl_mulai', 'required');
      $this->form_validation->set_rules('tgl_berakhir', 'tgl_berakhir', 'required');
      $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
      $this->form_validation->set_rules('status', 'status', 'required');
      
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');

			if ($this->form_validation->run() === TRUE) {

        $data = array(
          'desk_pekerjaan' => $this->input->post('desk_pekerjaan'),
          'tgl_mulai' => date_format(date_create($this->input->post('tgl_mulai')), 'Y-m-d'),
          'tgl_berakhir' => date_format(date_create($this->input->post('tgl_berakhir')), 'Y-m-d'),
          'keterangan' => $this->input->post('keterangan'),
          'status' => $this->input->post('status')
        );

        $query = $this->model_pekerjaan->update($id_pekerjaan, $data);

        if ($query) $message = array('status' => true, 'message' => 'Berhasil memperbarui Regulator');
        else $message = array('status' => true, 'message' => 'Gagal memperbarui Regulator');

        $this->session->set_flashdata('message', $message);

        redirect('kerjaan/edit/'.$id_pekerjaan, 'refresh');
			}
    }

    $kerjaan = $this->model_pekerjaan->get_where(array('id_pekerjaan' => $id_pekerjaan))->row();
    $kerjaan->tgl_mulai = date_format(date_create($kerjaan->tgl_mulai), 'd-m-Y');
    $kerjaan->tgl_berakhir = date_format(date_create($kerjaan->tgl_berakhir), 'd-m-Y');
    if (!$kerjaan) show_404();
    $data['pageTitle'] = 'Edit Data Regulator';
    $data['kerjaan'] = $kerjaan;
    $data['pageContent'] = $this->load->view('kerjaan/ubahpekerjaan', $data, TRUE);

    $this->load->view('template/layout', $data);
  }

  public function delete($id_pekerjaan)
  {
    $kerjaan = $this->model_pekerjaan->get_where(array('id_pekerjaan' => $id_pekerjaan))->row();

    if (!$kerjaan) show_404();
    $query = $this->model_pekerjaan->delete($id_pekerjaan);
    if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus Regulator');
    else $message = array('status' => true, 'message' => 'Gagal menghapus Regulator');

    $this->session->set_flashdata('message', $message);

    redirect('kerjaan', 'refresh');
  }

}
