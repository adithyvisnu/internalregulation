<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->cekLogin();
    $this->load->model('model_pekerjaan');
  }

  public function index()
  {
    $data['pageTitle'] = 'Dashboard';
    $data['pageContent'] = $this->load->view('dashboard/content', $data, true);

    $this->load->view('template/layout', $data);
  }
}
