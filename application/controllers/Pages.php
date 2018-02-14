<?php
class Pages extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('List_model');
            $this->load->helper('url_helper');
    }

    public function view($page = 'home')
    {
            $data['list'] = $this->List_model->get_list();
            $data['title'] = 'lijst';
    
            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');

    }



}