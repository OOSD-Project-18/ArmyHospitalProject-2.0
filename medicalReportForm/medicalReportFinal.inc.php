<?php
require_once '../core/initfromMedicalReport.php';

$user=new User();
if(!$user->isLoggedIn()){
    Redirect::to('../index.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!--link rel="stylesheet" href="../css/medicalReportForm.css"-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </head>
  <body id='main'>
    <?php include('_header.med.php') ?>
      <main>
          <?php include('_sideNav.med.php') ?>
    <div class="container py-1 mt-3 pt-5 pb-5" style="width: 100%; height:100%;">
    <div class=" pt-5 pb-4"></div>
                <div class=" card col-md-12 pt-5 pb-5">
                    <div style="text-align:center"class="m-5 pb-5" >
                        <h3 class="display-1 d-block">Successful!</h3>
                        <a href="../views/patientProfile.php">Back to patient profile</a>
                    </div>
                  </div>




    </div>
  </div>
  </main>
  </body>
</html>
<?php
  //session_start();
  //include_once "class-autoload.inc.php";

  $force_id = $_SESSION['force_id'];
  $nic  = $_SESSION['nic'];
  $date  = $_SESSION['date'];
  $serializedPersonalHistory  = $_SESSION['serializedPersonalHistory'];
  $serializedHospitalTreatments = $_SESSION['serializedHospitalTreatments'];
  $serializedOtherMedicalTreatments = $_SESSION['serializedOtherMedicalTreatments'];
  $otherInfo = $_SESSION['otherInfo'];
  $summary = $_SESSION['summary'];
  $serializedEyes = $_SESSION['serializedEyes'];
  $serializedEarsNoseThroat = $_SESSION['serializedEarsNoseThroat'];
  $serializedUpperLimbsLocomotion = $_SESSION['serializedUpperLimbsLocomotion'];
  $serializedPhysicalCapacityObject = $_SESSION['serializedPhysicalCapacityObject'];
  $serializedMentalCapacity = $_SESSION['serializedMentalCapacity'];
  $serializedForm10 = $_SESSION['serializedForm10'];
  $serializedSpecialistReportObject = $_SESSION['serializedSpecialistReportObject'];

  $patientContrObject = new PatientContr();
  $patientContrObject->createMedicalRecord($force_id, $nic, $date, $serializedPersonalHistory, $serializedHospitalTreatments, $serializedOtherMedicalTreatments, $otherInfo, $summary, $serializedEyes, $serializedEarsNoseThroat, $serializedUpperLimbsLocomotion, $serializedPhysicalCapacityObject, $serializedMentalCapacity, $serializedForm10, $serializedSpecialistReportObject);


?>
