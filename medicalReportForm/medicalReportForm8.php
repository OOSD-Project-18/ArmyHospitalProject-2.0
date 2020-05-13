<?php
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
    <div class="container py-4">  
    <div class="medical-report">
      <h1>Medical Report</h1><br>
      <form action="includes/form8.inc.php" method="post">
        <div class="section"><span>9</span>Physical Capacity</div><br>
        <div class="inner-wrap">
          <div class="section"><span>a</span><p><b>Identification</b></p></div><br>
          <label>Color of eyes : </label> <input type="text" name="eyesColor"><br>
          <label>Color of Hair :</label> <input type="text" name="hairColor"><br>
          <label>Complexion :</label> <input type="text" name="complexion"><br><br>

          <label>Height(Inches) :</label> <textarea rows = '1' cols = '33' name = 'height' placeholder='without boots/shoes, to nearest 1/4"'></textarea><br><br>
          <label>Weight(lbs) :</label> <textarea rows = '1' cols = '33' name = 'weight' placeholder='without boots/shoes, to nearest lb'></textarea><br><br>

          <label>Scars, tattoo marks, &c., state site:</label> <textarea rows = '1' cols = '64' name = 'scars' ></textarea><br><br>

          <div class="section"><span>b</span><p><b>Urine Examination</b> </p></div><br>
          <label>Appearance :</label> <input type="text" name="appearance"><br>
          <label>Albumen :</label> <input type="text" name="albumen"><br>
          <label>Sugar :</label> <input type="text" name="sugar"><br>
          <label>Special Gravity :</label> <input type="text" name="spGravity"><br><br>

          <div class="section"><span>c</span><p><b>Physique</b></p></div><br>
          <textarea rows = '3' cols = '50' name = 'physique' ></textarea><br><br>

          <div class="section"><span>d</span><p><b>Genito-urinary and perineum</b></p> </div>
          <label>(Hydrocele, varicocele, undescended test is haemorrhoids, evidence of previous V.D.)</label>
          <textarea rows = '3' cols = '50' name = 'guap' ></textarea><br><br>

          <div class="section"><span>e</span><p><b>Skin</b> </p> </div><br> <textarea rows = '3' cols = '50' name = 'skin' ></textarea><br><br>

          <div class="section"><span>f</span><p><b>Endocrine conditions</b> </p> </div><br> <textarea rows = '3' cols = '50' name = 'eConditions' ></textarea><br><br>

          <div class="section"><span>g</span><p><b>Cardio Vascular System</b> </p> </div><br>
          <label>Heart Size :</label> <input type="text" name="heartSize"><br>
          <label>Sounds :</label> <textarea rows = '1' cols = '40' name = 'sounds' ></textarea><br>
          <label>Arterial Walls :</label> <textarea rows = '1' cols = '40' name = 'arterialWalls' ></textarea><br><br>

          <table class='table'>
            <tr>
              <th>Pules Rate</th><th>E.TT. (if carried out) B.P. (if taken)</th>
            </tr>
            <tr>
              <td><input type="number" name="pulseRate"></td><td><textarea rows = '1' cols = '50' name = 'bp' ></textarea></td>
            </tr>
          </table><br><br>

          <div class="section"><span>h</span><p><b>Respiratory System</b> </p> </div><br><textarea rows = '3' cols = '60' name = 'respSystemInfo' ></textarea><br>
          <br><label><b>Chest Measurements (to nearest 1/2 inch)</b></label>
          <label>Full Expiration(Inches) :</label> <input type="number" name="fullExpChest"><br>
          <label>Range of Expansion(Inches) :</label> <input type="number" name="rangeOfExp"><br><br>

          <div class="section"><span>i</span><p><b>Central Nervous System</b> </p> </div>
          <label>(Reflexes, tromors)</label>
          <textarea rows = '3' cols = '60' name = 'centralNerveSys' ></textarea><br>

          <div class="section"><span>j</span><p><b>Abdomen</b> </p> </div>
          <label>(Hernia, muscle tone and organs)</label>
          <textarea rows = '3' cols = '60' name = 'abdomen' ></textarea><br>

          <div class="section"><span>k</span><p><b>Any Abnormalities or Conditions Affecting Physical Papacity</b> </p> </div>
          <label>(not already noted)</label>
          <textarea rows = '3' cols = '60' name = 'abnormalities' ></textarea><br>

          <label>Gender :</label>
          Male <input type="radio" name="gender" value="male">
          Female <input type="radio" name="gender" value="female"><br><br>

          <div class="section"><span>l</span><p><b>Women</b> </p> </div>
          <label>(Breasts, menstrual history, vaginal dischargbe, prolapse)</label>
          <textarea rows = '3' cols = '60' name = 'womenInfo' ></textarea><br><br>
          <label>L.M.P.(date) :</label> <input type='date' name='lmpDate'><br><br>
          <label>Marital State :</label> Married<input type='radio' name='maritalState' value='yes'> Not Married<input type='radio' name='maritalState' value='no'><br>

          <br><br> <label><b>If Married : </b></label>
          <label>No. of Children :</label> <input type="number" name="numChildren"><br>
          <label>No. of Pregnancies :</label> <input type="number" name="numPregs"><br>
          <label>Date of Last Confinement :</label> <input type="date" name="dateLastConf"><br><br>


          <div class="button-section">
            <button type="submit" name="next">Next</button>
          </div>

        </div>

      </form>
    </div>
    </div>
    </main>
  </body>
</html>
