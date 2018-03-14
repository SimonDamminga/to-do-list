<?php 
    class Task_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_task($id){
            $this->db->from('tasks');
            $this->db->where('taskId', $id);

            $query = $this->db->get();
            return $query->result_array();
        }

        public function set_task(){
            $this->load->helper('url');

            $data = array(
                'listId' => $this->input->post('list'),
                'Name' => $this->input->post('name'),
                'Description' => $this->input->post('description'),
                'Duration' => $this->input->post('duration'),
                'Status' => $this->input->post('status')
            );

            return $this->db->insert('tasks', $data);

        }

        public function delete_task($id){
            $this->db->from('tasks');
            $this->db->where('listId', $id);
            $this->db->delete();
        }

        public function delete_single_task($id){
            $this->db->from('tasks');
            $this->db->where('taskId', $id);
            $this->db->delete();
        }

        public function edit_task(){
            $this->load->helper('url');

            $this->db->where('taskId', $this->input->post('id'));

            $data = array(
                'Name' => $this->input->post('name'),
                'Description' => $this->input->post('description'),
                'Duration' => $this->input->post('duration'),
                'Status' => $this->input->post('status')
            );

            $this->db->update('tasks', $data);
        }
    }