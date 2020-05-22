<?php

class superUser extends User{
  private $_db;
  private $groupId;

  public function __construct(){
    parent::__construct();
  }


  public function getId(){
    $this->_db = Db::getInstance();
    $results= $this->_db->get('grps', array('name', '=', 'Administrator'));
    if($results->count()){
        $groupData=$results->first();
    }
    $this->groupId = $groupData->id;
    return $this->groupId;
  }

}
 ?>
