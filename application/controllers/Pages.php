<?php
    class Pages extends CI_Controller{
        public function __construct()
        {
                parent::__construct();
                $this->load->model('list_model');
                $this->load->helper('url_helper');
        }

        public function view($page = 'home'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = ucfirst($page);
            $data['lists'] = $this->list_model->get_lists();

            $this->load->helper('url');

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');      
        }
    }