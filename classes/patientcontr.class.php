<?php

include_once "patientmodel.class.php";

class PatientContr extends PatientModel{
  public function createForcesPatient($force, $first, $last, $nic, $force_id, $gender, $regiment, $rank, $email, $dob, $height, $weight, $address, $mobile){
    $this->setForcesPatient($force, $first, $last, $nic, $force_id, $gender, $regiment, $rank, $email, $dob, $height, $weight, $address, $mobile);
  }
  public function createFamilyPatient($force_id, $force, $relation, $first, $last, $nic, $gender, $email, $dob, $height, $weight, $address, $mobile){
    $this->setFamilyPatient($force_id, $force, $relation, $first, $last, $nic, $gender, $email, $dob, $height, $weight, $address, $mobile);
  }

  public function createNewRecord($nic, $doa, $reason, $history, $cm, $doctor, $ward){
    $this->setNewRecord($nic, $doa, $reason, $history, $cm, $doctor, $ward);
  }

  public function createMedicalRecord($force_id, $nic, $date, $serializedPersonalHistory, $serializedHospitalTreatments, $serializedOtherMedicalTreatments, $otherInfo, $summary, $serializedEyes, $serializedEarsNoseThroat, $serializedUpperLimbsLocomotion, $serializedPhysicalCapacityObject, $serializedMentalCapacity, $serializedForm10, $serializedSpecialistReportObject){
    $this->setMedicalRecord($force_id, $nic, $date, $serializedPersonalHistory, $serializedHospitalTreatments, $serializedOtherMedicalTreatments, $otherInfo, $summary, $serializedEyes, $serializedEarsNoseThroat, $serializedUpperLimbsLocomotion, $serializedPhysicalCapacityObject, $serializedMentalCapacity, $serializedForm10, $serializedSpecialistReportObject);
  }

  public function changeDoctor($nic, $doctor, $doa){
    $this->setNewDoctor($nic, $doctor, $doa);
  }

  public function addPrescription($nic, $doa, $prescription){
    $this->setPrescription($nic, $doa, $prescription);
  }

  public function issue($prescription){
    $this->setIssued($prescription);
  }

  public function createBasicECGRequest($nic, $serializedBasicECGRequest){
    $this->setBasicECGRequest($nic, $serializedBasicECGRequest);
  }

  public function createABPMonitoringRequest($nic, $serializedABPMonitoringRequest){
    $this->setABPMonitoringRequest($nic, $serializedABPMonitoringRequest);
  }

  public function createHolterMonitoringRequest($nic, $serializedHolterMonitoringRequest){
    $this->setHolterMonitoringRequest($nic, $serializedHolterMonitoringRequest);
  }

  public function createHistopathologyRequest($nic, $serializedHistopathologyRequest){
    $this->setHistopathologyRequest($nic, $serializedHistopathologyRequest);
  }

  public function createImmunoassayRequest($nic, $serializedImmunoassayRequest){
    $this->setImmunoassayRequest($nic, $serializedImmunoassayRequest);
  }

  public function createXRayRequest($nic, $serializedXRayRequest){
    $this->setXRayRequest($nic, $serializedXRayRequest);
  }

  public function createGeneralLabTestRequest($nic, $serializedGeneralLabTestRequest){
    $this->setGeneralLabTestRequest($nic, $serializedGeneralLabTestRequest);
  }

  public function addDischarge($nic, $doa, $dischargeDate, $summary){
    $this->setDischarge($nic, $doa, $dischargeDate, $summary);
  }

  public function addDetails($nic,$doa, $details){
    $this->setDetails($nic,$doa, $details);
  }

  public function addProfilePic($nic, $type, $photoLocation){
    $this->setProfilePic($nic, $type, $photoLocation);
  }

  public function uploadReport($nic, $day, $testType, $image_base64){
    $this->insertReport($nic, $day, $testType, $image_base64);
  }
}
