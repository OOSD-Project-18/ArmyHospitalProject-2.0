<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Medical Report </title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/medicalReport.css">

  </head>
  <body>
    <div class="medical-report">
      <h1>Medical Report</h1><br>

      <form action="includes/form7.inc.php" method="post">
        <div class="section"><span>8</span>Upper Limbs and Locomotor System</div><br>

        <div class="inner-wrap">
          <label>Upper Limbs (finger, hands, wrists, elbows, shoulder girdles, cervical and dorsal vertebrae) : </label>
          <textarea rows = "10" cols = "60" name = "upperLimbs">
          </textarea><br><br>
          <table class='table'>
          <tr><th> U </th> </tr>
          <tr><td>  <input type="text" name="u"></td></tr>
          </table><br>
           <label>Effect on P. if any : </label> <input id='short' type="text" name="effectUpperLimbs"><br><br>

          <label>Locomotion (Hahax valgus/rigidus, flat feet, joints, pelvis, lumbar and sacral vertebrae, coccys, varicose veins) : </label>
          <textarea rows = "10" cols = "60" name = "locomotion">
          </textarea><br><br>
          <table class='table'>
          <tr><th> L </th> </tr>
          <tr><td>  <input type="text" name="l"></td></tr>
          </table><br>
          <label> Effect on P. if any : </label> <input id= 'short' type="text" name="effectLocomotion"><br>

          <br><br>

          <div class="button-section">
            <button type="submit" name="next">Next</button>
          </div>
          
        </div>
      </form>
    </div>
  </body>
</html>
