<?php

class Db{
    private static $_instance=null; //to connect only once to the database
    private $_pdo;
    private $_query;    //hold the last query exceuted
    private $_error;
    private $_results;  //store result set
    private $_count;    //count of the results

    private function __construct(){
        try{
            $this->_error=false;
            $this->_count=0;
            $dsn='mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/dbName');
            $this->_pdo=new PDO($dsn,Config::get('mysql/username'),Config::get('mysql/password'));



        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public static function getInstance(){//to connect to database only once
        if(!isset(self::$_instance)){
            self::$_instance=new Db();

        }
        return self::$_instance;

    }

    public function query($sql,$params=array()){

        $this->_error=false;
        if($this->_query=$this->_pdo->prepare($sql)){
            $x=1;
            if(count($params)){
                foreach($params as $param){
                    $this->_query->bindValue($x,$param);
                    $x++;
                }
            }

        }

        if($this->_query->execute()){
            $this->_results=$this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_count=$this->_query->rowCount();
        }else{
            $this->_error=true;
        }

        return $this;

    }
    public function error(){
        return $this->_error;
    }

    public function action($action,$table,$where){

        if(count($where)===3){
            $operators=array('=','.','<','>=','<=');
            $field=$where[0];
            $operator=$where[1];
            $value=$where[2];
            if (in_array($operator,$operators)){
                $sql="{$action} FROM {$table} WHERE {$field} {$operator} ?";
                if(!$this->query($sql,array($value))->error()){
                    return $this;
                }
            }

        }

        return false;

    }
    public function get($table,$where){
        return $this->action('SELECT *',$table,$where);


    }
    public function delete($table,$where){
        return $this->action('DELETE',$table,$where);
    }
    public function count(){
        return $this->_count;
    }
    public function results(){
        return $this->_results;
    }
    public function first(){
        return $this->results()[0];
    }
    public function insert($table,$fields=array()){

        $keys=array_keys($fields);
        $values=null;
        $x=1;
        foreach ($fields as $field){
            $values.="?";
            if($x<count($fields)){
                $values.=',';
            }
            $x++;
        }

        $sql="INSERT INTO {$table}(`".implode('`,`',$keys)."`) VALUES ({$values})";
        if(!$this->query($sql,$fields)->error()){
            return true;

        }
        return false;

    }
    public function update($table,$id,$fields=array()){
        $set='';
        $x=1;

        foreach($fields as $name=>$value){
            $set.="{$name}=?";
            if($x<count($fields)){
                $set.=', ';
            }
            $x++;
        }
        $sql="UPDATE {$table} SET {$set} WHERE  id={$id} ";
        if(!$this->query($sql,$fields)->error()){
            return true;

        }
        return false;

    }
    public function getPDO(){
      return $this->_pdo;
    }

}
