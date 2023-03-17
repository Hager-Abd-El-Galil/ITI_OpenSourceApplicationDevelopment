<?php 
interface DBHandler{
    
    public function connect();
    public function disconnect(); 
    public function get_all_records_paginated($fields = array(), $start = 0);
    public function get_record_by_id($id, $primary_key = "id");
      
}