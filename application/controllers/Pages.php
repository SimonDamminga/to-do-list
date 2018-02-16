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

        public function create(){
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');


            $this->form_validation->set_rules('title', 'Title', 'required');
            
            if ($this->form_validation->run() === FALSE){
                
                $this->load->view('templates/header');
                $this->load->view('pages/create');
                $this->load->view('templates/footer');
        
            }else{
                $this->list_model->set_item();
                redirect(base_url());
            }
        }
    }