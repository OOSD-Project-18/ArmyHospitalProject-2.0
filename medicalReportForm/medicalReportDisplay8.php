<?php
  //session_start();
  include_once "classes/physicalCapacity.class.php";
  include_once "classes/physicalCapacityFemale.class.php";
  include_once "classes/physicalCapacityFemaleMarried.class.php";
  include_once "../includes/class-autoload.inc.php";
  require_once '../includes/initFromPatients.php';
  $user=new User();
  if(!$user->isLoggedIn()){
      Redirect::to('../index.php');
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Medical Report</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/medicalReport.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </head>
  <body>
  <?php include('_header.med.php') ?>
  <main  id=main>
  
        <?php include('_sideNav.med.php') ?>

    <?php
      $results = $_SESSION['results'];

      $serializedPhysicalCapacityObject = $results[0]['serializedPhysicalCapacityObject'];

      $physicalCapacityObject = unserialize($serializedPhysicalCapacityObject);

      $eyesColor = $physicalCapacityObject->getProperty('eyesColor');
      $hairColor = $physicalCapacityObject->getProperty('hairColor');
      $complextion = $physicalCapacityObject->getProperty('complextion');
      $height = $physicalCapacityObject->getProperty('height');
      $weight = $physicalCapacityObject->getProperty('weight');
      $scars= $physicalCapacityObject->getProperty('scars');
      $urAppearance = $physicalCapacityObject->getProperty('urAppearance');
      $urAlbumen = $physicalCapacityObject->getProperty('urAlbumen');
      $urSugar = $physicalCapacityObject->getProperty('urSugar');
      $urSpGravity = $physicalCapacityObject->getProperty('urSpGravity');
      $physique = $physicalCapacityObject->getProperty('physique');
      $guap = $physicalCapacityObject->getProperty('guap');
      $skin = $physicalCapacityObject->getProperty('skin');
      $eConditions = $physicalCapacityObject->getProperty('eConditions');
      $heartSize = $physicalCapacityObject->getProperty('heartSize');
      $sounds = $physicalCapacityObject->getProperty('sounds');
      $arterialWalls = $physicalCapacityObject->getProperty('arterialWalls');
      $pulseRate = $physicalCapacityObject->getProperty('pulseRate');
      $bp = $physicalCapacityObject->getProperty('bp');
      $respSystemInfo = $physicalCapacityObject->getProperty('respSystemInfo');
      $fullExpChest = $physicalCapacityObject->getProperty('fullExpChest');
      $rangeOfExp = $physicalCapacityObject->getProperty('rangeOfExp');
      $centralNerveSys = $physicalCapacityObject->getProperty('centralNerveSys');
      $abdomen =$physicalCapacityObject->getProperty('abdomen');
      $abnormalities = $physicalCapacityObject->getProperty('abnormalities');

     ?>

     <div class="medical-report">
       <h1>Medical Report</h1><br>
       <form action="medicalReportDisplay9.php" method="post">
         <div class="section"><span>9</span>Physical Capacity</div><br>
         <div class="inner-wrap">
           <div class="section"><span>a</span><p><b>Identification</b></p></div><br>
           <label>Color of eyes : </label> <?php echo $eyesColor; ?><br><br>
           <label>Color of Hair :</label> <?php echo $hairColor; ?><br><br>
           <label>Complexion :</label> <?php echo $complextion; ?><br><br>

           <label>Height(Inches) :</label> <?php echo $height; ?><br><br>
           <label>Weight(lbs) :</label> <?php echo $weight; ?><br><br>

           <label>Scars, tattoo marks, &c., state site:</label> <?php echo $scars; ?><br><br>

           <div class="section"><span>b</span><p><b>Urine Examination</b> </p></div><br>
           <label>Appearance :</label><?php echo $urAppearance; ?><br><br>
           <label>Albumen :</label> <?php echo $urAlbumen; ?><br><br>
           <label>Sugar :</label><?php echo $urSugar; ?><br><br>
           <label>Special Gravity :</label><?php echo $urSpGravity; ?><br><br>

           <div class="section"><span>c</span><p><b>Physique</b></p></div><br>
           <?php echo $physique; ?><br><br>

           <div class="section"><span>d</span><p><b>Genito-urinary and perineum</b></p> </div>
           <label>(Hydrocele, varicocele, undescended test is haemorrhoids, evidence of previous V.D.)</label>
           <?php echo $guap; ?><br><br>

           <div class="section"><span>e</span><p><b>Skin</b> </p> </div><br> <?php echo $skin; ?><br><br>

           <div class="section"><span>f</span><p><b>Endocrine conditions</b> </p> </div><br><?php echo $eConditions; ?><br><br>

           <div class="section"><span>g</span><p><b>Cardio Vascular System</b> </p> </div><br>
           <label>Heart Size :</label><?php echo $heartSize; ?><br><br>
           <label>Sounds :</label><?php echo $sounds; ?><br><br>
           <label>Arterial Walls :</label><?php echo $arterialWalls; ?><br><br>

           <table class='table'>
             <tr>
               <th>Pules Rate</th><th>E.TT. (if carried out) B.P. (if taken)</th>
             </tr>
             <tr>
               <td><?php echo $pulseRate; ?></td><td><?php echo $bp; ?></td>
             </tr>
           </table><br><br>

           <div class="section"><span>h</span><p><b>Respiratory System</b> </p> </div><br><?php echo $respSystemInfo; ?><br>
           <br><label><b>Chest Measurements (to nearest 1/2 inch)</b></label>
           <label>Full Expiration(Inches) :</label><?php echo $fullExpChest; ?><br><br>
           <label>Range of Expansion(Inches) :</label> <?php echo $rangeOfExp; ?><br><br>

           <div class="section"><span>i</span><p><b>Central Nervous System</b> </p> </div>
           <label>(Reflexes, tromors)</label>
           <?php echo $centralNerveSys; ?><br>

           <div class="section"><span>j</span><p><b>Abdomen</b> </p> </div>
           <label>(Hernia, muscle tone and organs)</label>
           <?php echo $abdomen; ?><br><br>

           <div class="section"><span>k</span><p><b>Any Abnormalities or Conditions Affecting Physical Papacity</b> </p> </div>
           <label>(not already noted)</label>
           <?php echo $abnormalities; ?><br><br>

           <?php
             if ($physicalCapacityObject instanceof PhysicalCapacityFemale) {
               $gender = 'Female';

               echo "<label>Gender :</label>
               ".$gender."<br><br>";

               $womenInfo = $physicalCapacityObject->getPropertyF('womenInfo');
               $lmpDate = $physicalCapacityObject->getPropertyF('lmpDate');
               $maritalState = $physicalCapacityObject->getPropertyF('maritalState');

               echo " <div class='section'><span>l</span><p><b>Women</b> </p> </div>
                <label>(Breasts, menstrual history, vaginal dischargbe, prolapse)</label>
                ".$womenInfo."<br><br>
                <label>L.M.P.(date) :</label>".$lmpDate."<br><br>";

               if ($maritalState == 'yes') {
                 echo "<label>Marital State :</label>Married<br><br>";

                 $numChildren = $physicalCapacityObject->getPropertyFM('numChildren');
                 $numPregs = $physicalCapacityObject->getPropertyFM('numPregs');
                 $dateLastConf = $physicalCapacityObject->getPropertyFM('dateLastConf');

                 echo '<label>No. of Children :</label>'.$numChildren.'<br><br>
                 <label>No. of Pregnancies :</label>'.$numPregs.'<br><br>
                 <label>Date of Last Confinement :</label>'.$dateLastConf.'<br><br>';

               }else {
                 echo "<label>Marital State :</label>Not Married<br><br><br>";
               }

             }else{
               $gender = 'Male';

               echo "<label>Gender :</label>
               ".$gender."<br><br>";

             }

           ?>

           <div class="button-section">
             <button type="submit" name="next">Next</button>
           </div>

         </div>

       </form>
     </div>
     </main>

  </body>
</html>
