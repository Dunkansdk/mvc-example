<?php 

    class Example {

        private $db;

        public function __construct()
        {
            $this->db = new Database('database_name');
        }

        public function get_table($table)
        {
            $this->db->query("SELECT * FROM `$table` WHERE id = '1'");
            return $this->db->obtain_once();
        }
        
    }
?>