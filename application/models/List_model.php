<?php 
    class List_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_lists(){
            $this->db->from('lists');
            $this->db->join('tasks', 'lists.Id = tasks.listId', 'left outer');

            

            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_list($id){
            $this->db->from('lists');
            $this->db->where("Id=".$id);
            $this->db->join('tasks', 'lists.Id = tasks.listId', 'left outer');

            $query = $this->db->get();
            return $query->result_array();
        }

        public function set_item(){
            $this->load->helper('url');

            $data = array(
                'Title' => $this->input->post('title')
            );

            return $this->db->insert('lists', $data);
        }

        public function delete_item($id){
            $this->db->from('lists');
            $this->db->where('Id', $id);
            $this->db->delete();
        }

    } 