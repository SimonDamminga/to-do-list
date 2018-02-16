<?php 
    class Task_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function set_task(){
            $this->load->helper('url');

            $data = array(
                'listId' => 2,
                'Name' => $this->input->post('name'),
                'Description' => $this->input->post('description')
            );

            return $this->db->insert('tasks', $data);

        }
    }