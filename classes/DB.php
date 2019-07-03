<?php

class DB {

    protected $params_type = array();
    private static $mysqli = 0;
    public $error = 0;
    public static $affected_rows;
    public $insert_id;
    public $num_rows;
    
    protected static function connect() {

        if (!self::$mysqli) {
            self::$mysqli = new \mysqli(HOST, USERNAME, PASSWORD, DATABASE);

            if (self::$mysqli->connect_errno) {
                printf("Connect failed: %s\n", self::$mysqli->connect_errno);
                exit();
            }
            self::$mysqli->query("set names utf8") or die("Can't set to utf8: " . self::$mysqli->error);
        }
    }

    public function execute_select($the_params = array()) {
        if ($the_params) {
            $all_params = array_merge($this->params_type, $the_params);
            $references = array();
            foreach ($all_params as $key => $value) {
                $references[] = &$all_params[$key];
            }

            call_user_func_array(array($this->stmt, 'bind_param'), $references);
        }
        $this->stmt->execute();
        
        $result = $this->stmt->get_result();
        $data = array();
        while ($row = $result->fetch_assoc())
        {
            $data[] = $row;
        }
        
        $this->num_rows = $result->num_rows;
        $this->stmt->free_result();
        return $data;
    }

    public function prepare($sql, $params_type='') {
        $this->stmt = "";
        self::connect();
        $this->stmt = self::$mysqli->prepare($sql);
        if (!$this->stmt) {
            $this->error = self::$mysqli->error;
            return false;
        }
        $this->params_type = array($params_type);
        //$this->params_type = array($params_type . implode($this->params_type));

        return true;
    }

    public function execute($values) {
        if (!is_array($values)) {
            $values = array($values);
        }
        $params = array_merge($this->params_type, $values); // we should pass array of references to stmt->bind_param, otherwise it's not functioning
        $references = array();
        foreach ($params as $key => $value) {
            $references[] = &$params[$key];
        }
        call_user_func_array(array($this->stmt, 'bind_param'), $references);

        if (!$this->stmt->execute()) {
            $this->error = self::$mysqli->error;
            return false;
        }

        self::$affected_rows = self::$mysqli->affected_rows;
        $this->insert_id = self::$mysqli->insert_id;
        return true;
    }

}
