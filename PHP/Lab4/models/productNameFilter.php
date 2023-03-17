<?php
class productNameFilter implements filter_interface{
    
    private $_search;
    
    public function __construct($search){
        $this -> _search = $search;    
    }
    
    public function get_sql(){
        return " `product_name` like '" . $this -> _search . "%' ";
    }
    
}