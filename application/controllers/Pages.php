<?php
    class Pages extends CI_Controller{
        public function __construct()
        {
                parent::__construct();
                $this->load->model('list_model');
                $this->load->model('task_model');
                $this->load->helper('url_helper');
        }

        public function view($page = 'home'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = ucfirst($page);
            $data['lists'] = $this->list_model->get_lists();

            if(empty($data['lists'])){
                $data['noResult'] = 'Geen taken...';
            }

            $this->load->helper('url');

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');      
        }

        public function edit($id = NULL){
            $this->load->helper(array('form', 'url'));

            $data['list'] = $this->list_model->get_list($id);

            if(empty($data['list'])){
                show_404();
            }


            $this->load->view('templates/header');
            $this->load->view('pages/edit', $data);
            $this->load->view('templates/footer'); 

        }

        public function update(){
            $this->list_model->update_item();
            redirect(base_url());
        }

        public function delete($id = NULL){
            $this->list_model->delete_item($id);
            $this->task_model->delete_task($id);

            redirect(base_url());
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

        public function createTasks(){

            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

            $data['lists'] = $this->list_model->get_lists();

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            
            if ($this->form_validation->run() === FALSE){

                $this->load->view('templates/header');
                $this->load->view('pages/create-tasks', $data);
                $this->load->view('templates/footer'); 

            }else{
                $this->task_model->set_task();
            }
        }
    }