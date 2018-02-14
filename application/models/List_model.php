<?php
class List_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }


        public function get_list()
        {
                $query = $this->db->get_where('lists');
                return $query->result_array();
        }
}