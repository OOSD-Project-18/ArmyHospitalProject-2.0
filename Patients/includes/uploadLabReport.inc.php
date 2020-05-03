<?php
include 'class-autoload.inc.php';
if (isset($_POST['upload'])){
  if(isset($_POST['date']) && isset($_FILES['image']) && isset($_POST['testType'])){
    session_start();
    $nic = $_SESSION['nic'];
    $date = $_POST['date'];
    $testType = $_POST['testType'];

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
          $image_base64 = base64_encode(file_get_contents($tempLocation));
          $patient = new PatientContr();
          $patient->uploadReport($nic, $date, $testType, $image_base64);

        }

      }
}
  }
}



 ?>
