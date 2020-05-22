<?php

class superUser extends User{
  private $_db;
  private $groupId;

  public function __construct(){
    parent::__construct();
    $this->_db = Db::getInstance();

  }

  public function getId(){
    $results= $this->_db->get('grps', array('name', '=', 'Administrator'));
    if($results->count()){
        $groupData=$results->first();
    }
    $this->groupId = $groupData->id;
    return $this->groupId;
  }

  public function createSuperUser($fields=array()){
      if(!$this->_db->insert('users',$fields)){

          throw new Exception('There was a problem creating an account');
      }
  }
  public function getAllRecords(){
    $sql = "SELECT * FROM unverified_users;";
    $this->_db->query($sql);
    $results = $this->_db->results();
    return $results;

  }
}
 ?>
