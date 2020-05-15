<?php
require_once '../core/initFromMedicalReport.php';
$user=new User();
if(!$user->isLoggedIn()){
    Redirect::to('../index.php');
}

?>
<!DOCTYPE html>
<html>
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
      <h1>Medical Report</h1><br><br>
      <form action="includes/form1.inc.php" method="post">
        <div class="section"><span>1</span>Service No and NIC</div>
        <div class="inner-wrap">
          <label>Service No : </label> <input type="text" name="force_id" placeholder='Ex: s/xxxxx'><br><br>
          <label>NIC: </label> <input type="text" name="nic" placeholder='Ex: 97xxxxxxxv'><br><br>
        </div>

        <div class="section"><span>2</span>Date</div>
        <div class="inner-wrap">
          <input type="date" name="date"><br><br>
        </div>

        <div class="section"><span>3</span>Personal History</div>
        <div class="inner-wrap">
          <div class="table">
            <table>
              <tr>
                <th>Illness</th> <th>Yes/No</th><th>If "Yes", at what age?</th>
              </tr>
              <tr> <td>Bronchitis</td><td><input type="text" name="bronchdata"></td><td><input type="text" name="bronchage"></td></tr>
              <tr> <td>Asthma</td><td> <input type="text" name="asthmadata"></td><td><input type="text" name="asthmaage"></td></tr>
              <tr> <td>Tuberculosis</td><td> <input type="text" name="tbdata"></td><td><input type="text" name="tbage"></td></tr>
              <tr> <td>Fits</td><td> <input type="text" name="fitsdata"></td><td><input type="text" name="fitsage"></td></tr>
              <tr> <td>Gastric Disorders</td><td> <input type="text" name="gasdata"></td><td><input type="text" name="gasage"></td></tr>
              <tr> <td>Rheumatism</td><td> <input type="text" name="rheumatismdata"></td><td><input type="text" name="rheumatismage"></td></tr>
              <tr> <td>Nervous Breakdown</td><td> <input type="text" name="nervedata"></td><td><input type="text" name="nerveage"></td></tr>
              <tr> <td>Mental Illness</td><td> <input type="text" name="mentaldata"></td><td><input type="text" name="mentalage"></td></tr>
              <tr> <td>Filariasis</td><td> <input type="text" name="filariasisdata"></td><td><input type="text" name="filariasisage"></td></tr>
              <tr> <td>Any Other Illness</td><td> <input type="text" name="otherdata"></td><td><input type="text" name="otherage"></td></tr>
            </table><br><br>
          </div>

          <label>Mention other illness if applicable : </label>
          <textarea rows = "5" cols = "62" name = "other">
          </textarea><br><br>
          <label>Have you ever had a discharge or running from the ears :</label> <input type="checkbox" name="data[]" value="ears"><br><br>
          <label>Has your chest ever been X-Rayed :</label> <input type="checkbox" name="data[]" value="xray"><br><br>
          <label>If so, when and for what reason :</label> <input type="text" name="xraydata"><br><br>
          <label>Have you ever been discharged as medically unfit from any bramch of the services :</label> <input type="checkbox" name="data[]" value="discharged"><br><br>
          <label>Have you ever been rejected as medically unfit from any branch of the services :</label> <input type="checkbox" name="data[]" value="rejected"><br><br>
          <label>Are you, or have you been, in receipt of a disability pension :</label> <input type="checkbox" name="data[]" value="disabilitypension"><br><br>
        </div>

        <br>
        <div class="button-section">
          <button type="submit" name="next">Next</button>
        </div>

      </form>
    </div>
  </div>
  </main>
  </body>
</html>
