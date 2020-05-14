<?php
require_once('../core/initfromhandlers.php');
$nic = $_SESSION['nic'];
$type = $_SESSION['patientType'];
$patientObj = new PatientContr();

if (isset($_POST['submit'])){
  $file = $_FILES['image'];
  $fileName = $file['name'];
  $tempLocation = $file['tmp_name'];
  $fileSize = $file['size'];
  $error = $file['error'];

  $temp = explode('.', $fileName);
  $fileExtension = strtolower(end($temp));
  $allowed = ['jpg', 'jpeg', 'png'];

  if (in_array($fileExtension, $allowed)){
    if ($error === 0){
      if ($fileSize < 1000000){
          $newFileName = "profile".$nic.".".$fileExtension;
          $fileDestination = "../profilepics/".$newFileName;
          move_uploaded_file($tempLocation, $fileDestination);
          $actualDestination = "profilepics/".$newFileName;
          $patientObj->addProfilePic($nic, $type, $actualDestination);
          Redirect::to('../views/patientProfile.php');

      } else {
        Redirect::to('../views/uploadPhoto.php?error=size');
      }
    } else {
      Redirect::to('../views/uploadPhoto.php?error=generic');
    }
  } else {
    Redirect::to('../views/uploadPhoto.php?error=type');
  }






}


 ?>
