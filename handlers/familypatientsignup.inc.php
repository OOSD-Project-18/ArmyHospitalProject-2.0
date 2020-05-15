    <?php
      require_once('../core/initfromhandlers.php');
      if (isset($_POST['submit'])) {
        $force_id = $_POST["force_id"];
        $force = $_POST["force"];
        $relation = $_POST["relation"];
        $gender = $_POST['gender'];
        $first = $_POST["first"];
        $last = $_POST["last"];
        $nic= $_POST["nic"];
        $email = $_POST["email"];
        $dob = $_POST["dob"];
        $height = $_POST["height"];
        $weight = $_POST["weight"];
        $address = $_POST["address"];
        $mobile = $_POST["mobile"];

        if (empty($force) || empty($first) || empty($relation) || empty($last) || empty($gender) || empty($nic) || empty($force_id) || empty($email) || empty($dob) || empty($height) || empty($weight) || empty($address) || empty($mobile)) {
            Redirect::to('../views/familypatientsignup.php');
        } else {
          if( !preg_match("/^[a-zA-Z]*$/", $relation) || !preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
            header("Location: ../views/familypatientsignup.php?signup=char");//make changes using register handler for user
          }else{
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              header("Location: ../views/familypatientsignup.php?signup=invalidemail");
            }else{
              $patientContrObject = new PatientContr();
              $patientContrObject->createFamilyPatient($force_id, $force, $relation, $first, $last, $nic, $gender, $email, $dob, $height, $weight, $address, $mobile);

              header("Location: ../views/familypatientsignup.php?signup=success");
            }
          }
        }
    }
