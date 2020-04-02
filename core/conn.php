<?php
require_once('ripcord.php');

class Conexion{

    private $url = "http://192.168.147.131:8069";
    private $db = "vive_oficial";
    private $username = "admin";
    private $password = "Artesania99..";
    public $model;
    private $uid;
    private $common;
    public function __construct(){
        $this->model = ripcord::client($this->url."/xmlrpc/2/object");
        $this->common = ripcord::client($this->url."/xmlrpc/2/common");
        $this->uid = $this->common->authenticate($this->db, $this->username, $this->password, array());
    }

    public function getRecords(string $modelo, array $fields){
        
        $data = $this->model->execute_kw($this->db, $this->uid, $this->password,
        $modelo, 'search_read',
        array(),
        array('fields'=>$fields));
    
        return $data;
        
    }

    function getRecord(string $modelo, array $field, string $key, $value){
        $data = $this->model->execute_kw($this->db, $this->uid, $this->password,
        $modelo, 'search_read',
        array(array(array($key, '=', $value))),
        array('fields'=>$field));
    
        return $data;
    }

    function create(string $modelo, array $fields){
        $id = $this->model->execute_kw($this->db, $this->uid, $this->password,
        $modelo, 'create',
        array($fields));
        return $id;
    }


        


}






