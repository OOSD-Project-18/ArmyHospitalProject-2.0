<?php
    include_once '../core/initfromhandlers.php';

    if (isset($_POST['submit'])) {
        $nic= $_SESSION["nic"];
        $doa = $_POST["doa"];
        $reason = $_POST["reason"];
        $history = $_POST["history"];
        $cm = $_POST["cm"];
        $doctor = $_POST["doctor"];
        $ward = $_POST["ward"];

        if (empty($nic) || empty($doa) || empty($reason) ||  empty($history) || empty($doctor) || empty($ward)) {
          header("Location: ../views/newAdmission.php?status=empty");
        } else {
            if(!preg_match("/^[a-zA-Z\.]*$/", $doctor)){
                header("Location: ../views/newAdmission.php?status=char");

        }else{
              $patientContrObject = new PatientContr();
              $patientContrObject-> createNewRecord($nic, $doa, $reason, $history, $cm, $doctor, $ward);
              $patientView = new PatientView();
              $results = $patientView->showCurrentVisit($nic);
              if ($results[0]["doa"] == $doa){
              header("Location: ../views/newAdmission.php?status=success");
            } else{
              header("Location: ../views/newAdmission.php?status=dberror");
              }
            }
        }
    }
