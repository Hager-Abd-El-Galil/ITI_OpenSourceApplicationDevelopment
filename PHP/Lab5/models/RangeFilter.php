<?php
class RangeFilter implements filter_interface{
    
    private $_range;
    
    public function __construct($range){
        $this -> _range = $range;   
    }
    
    public function get_sql(){
        return " `list_price` <= " . intval($this -> _range) ;
    }
    
}