<?php
class statusCheck{

    public static function check($status){
      $topsuccess = "<div class = 'text-center'>
              <div class='alert alert-success ' role='alert'>";
      $toperror = "<div class = 'text-center'>
              <div class='alert alert-danger' role='alert'>";

      $bottom = "</div></div>";
        if (!isset($_GET[$status])) {
             false;
        }else{
            $statusCheck = $_GET[$status];
            if ($statusCheck == "empty") {
              echo $toperror . "You did not fill in all information." . $bottom;
            }elseif($statusCheck == "char"){
              echo $toperror . "You used invalid characters." . $bottom;
            }elseif($statusCheck == "invalidemail"){
              echo $toperror . "You used invalid e-mail." . $bottom;
            }elseif($statusCheck == "success"){
              echo $topsuccess ."Successful!" . $bottom;
            }elseif($statusCheck == "size"){
              echo $toperror ."File size is too big." . $bottom;
            }elseif($statusCheck == "type"){
              echo $toperror ."Invalid file type." . $bottom;
            }elseif($statusCheck == "generic"){
              echo $toperror ."The file could not be uploaded." . $bottom;
            }elseif($statusCheck == "error"){
              echo $toperror ."The file could not be uploaded." . $bottom;
            }elseif($statusCheck == "dberror"){
              echo $toperror ."Database Error" . $bottom;
            }
      }
    }
}
