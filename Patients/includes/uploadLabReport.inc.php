<?php
include 'class-autoload.inc.php';
echo $_POST['testType'];
if (isset($_POST['upload'])){
  if(isset($_POST['day']) && isset($_FILES['image']) && $_POST['testType'] !== "Select Lab Test"){
    session_start();
    $nic = $_SESSION['nic'];
    $day = $_POST['day'];
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
          $image_base64 = base64_encode(file_get_contents(addslashes($tempLocation)));
          $patient = new PatientContr();
          $patient->uploadReport($nic, $day, $testType, $image_base64);
          Redirect::to("../labtests.php?status=success");
        }

      }
}
}
}
Redirect::to("../labtests.php?status=error");


 ?>
