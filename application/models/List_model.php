<?php 
    class List_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_lists(){
            $this->db->from('lists');
            $this->db->join('tasks', 'lists.Id = tasks.listId', 'left outer');

            

            $query = $this->db->get();
            print_r($query->result_array());
            return $query->result_array();
        }
    }