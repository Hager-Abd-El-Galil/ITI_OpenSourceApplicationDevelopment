<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MySQLHandler
 *
 * @author Hager Abd El Galil
 */
class MySQLHandler {

    //put your code here
    private $_db_handler;
    private $_table;
    private $_primary_key;

    public function __construct($table, $primary_key = "id") {
        $this->_table = $table;
        $this->connect();
        $this->_primary_key = $primary_key;
    }

    public function connect() {
        $handler = mysqli_connect(__HOST__, __USER__, __PASS__, __DB__);
        if ($handler) {
            $this->_db_handler = $handler;
            return true;
        } else {
            return false;
        }
    }

    public function disconnect() {
        if ($this->_db_handler)
            mysqli_close($this->_db_handler);
    }

    public function get_data($fields = array(), $start = 0) {
        $table = $this->_table;
        if (empty($fields)) {
            $sql = "select * from `$table`";
        } else {
            $sql = "select ";
            foreach ($fields as $f) {
                $sql .= " `$f`, ";
            }
            $sql .= "from  `$table` ";
            $sql = str_replace(", from", "from", $sql);
        }
        $sql .= "limit $start," . __RECORDS_PER_PAGE__;
        return $this->get_results($sql);
    }

    public function get_record_by_id($id) {

        $primary_key = $this->_primary_key;

        $table = $this->_table;
        $sql = "select * from `$table` where `$primary_key` = '$id' ";

        return $this->get_results($sql);
    }

    private function get_results($sql) {
        $this->debug($sql);
        $_handler_results = mysqli_query($this->_db_handler, $sql);
        $_arr_results = array();

        if ($_handler_results) {
            while ($row = mysqli_fetch_array($_handler_results, MYSQLI_ASSOC)) {
                $_arr_results[] = array_change_key_case($row);
            }
            $this->disconnect();
            return $_arr_results;
        } else {
            $this->disconnect();
            return false;
        }
    }

    public function save($new_values) {
        if (is_array($new_values)) {
            $table = $this->_table;
            $sql1 = "insert into `$table` (";
            $sql2 = " values (";
            foreach ($new_values as $key => $value) {
                $sql1 .= "`$key` ,";
                if (is_numeric($value))
                    $sql2 .= " $value ,";
                else
                    $sql2 .= " '" . $value . "' ,";
            }
            $sql1 = $sql1 . ") ";
            $sql2 = $sql2 . ") ";
            $sql1 = str_replace(",)", ")", $sql1);
            $sql2 = str_replace(",)", ")", $sql2);
            $sql = $sql1 . $sql2;

        
            if (mysqli_query($this->_db_handler, $sql)) {
                $this->disconnect();
                return true;
            } else {
                $this->disconnect();
                return false;
            }
        }
    }

    public function search($column, $column_value) {
        $table = $this->_table;
        $sql = "select * from `$table` where `$column` like  '%" . $column_value . "%' ";
        return $this->get_results($sql);
    }

    public function update($edited_values, $id) {
        $table = $this->_table;
        $primary_key = $this->_primary_key;
        $sql = "update  `" . $table . "` set  ";
        foreach ($edited_values as $key => $value) {
            if ($key != $primary_key) {
                if (!is_numeric($value))
                    $sql .= " `$key` = '$value'  ,";
                else
                    $sql .= " `$key` = $value ,";
            }
        }

        $sql .= "where `" . $primary_key . "` = $id";
        $sql = str_replace(",where", "where", $sql);
 
        if (mysqli_query($this->_db_handler, $sql)) {
            $this->disconnect();
            return true;
        } else {
            $this->disconnect();
            return false;
        }
    }

    public function delete($id) {
        $table = $this->_table;
        $primary_key = $this->_primary_key;
        $sql = "delete  from `" . $table . "` where `" . $primary_key . "` = $id";
        $this->debug($sql);
        if (mysqli_query($this->_db_handler, $sql)) {
            $this->disconnect();
            return true;
        } else {
            $this->disconnect();
            return false;
        }
    }

    private function debug($sql) {
        if (__Debug__Mode__ === 1)
            echo "<h5>Sent Query: </h5>" . $sql . "<br/> <br/>";
    }

}