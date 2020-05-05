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
      <div class="section"><span>12</span>Specialist Reports amd Results of Investigations</div><br>
      <div class="inner-wrap">
        <form action="includes/form11.inc.php" method="post">
            <textarea rows = '30' cols = '150' name = 'sraroi'></textarea><br><br>
            <div style="overflow-x:scroll;">
            <table class='table' border="1">
              <tr>
                <th> </th><th>Vision without glasses</th><th>Sph.</th><th>Cyl.</th><th>Axis standard notation</th><th>Vision with glasses</th>
              </tr>
              <tr>
                <td>R</td><td><textarea rows = '2' cols = '30' name = 'right[]'></textarea></td><td><textarea rows = '2' cols = '30' name = 'right[]'></textarea></td><td><textarea rows = '2' cols = '30' name = 'right[]'></textarea></td><td><textarea rows = '2' cols = '30' name = 'right[]'></textarea></td><td><textarea rows = '2' cols = '30' name = 'right[]'></textarea></td>
              </tr>
              <tr>
                <td>L</td><td><textarea rows = '2' cols = '30' name = 'left[]'></textarea></td><td><textarea rows = '2' cols = '30' name = 'left[]'></textarea></td><td><textarea rows = '2' cols = '30' name = 'left[]'></textarea></td><td><textarea rows = '2' cols = '30' name = 'left[]'></textarea></td><td><textarea rows = '2' cols = '30' name = 'left[]'></textarea></td>
            </table><br>
            </div>
            <br><label>Date : </label> <input type="date" name="dateOfReport"><br><br>

            <div class="section"><span>a</span><p><b>Initial PULHEEMS Assessment</b></p></div><br>
            <div style="overflow-x:scroll;">
            <table class='table'>
            
              <tr>
                <th>Y.O.B</th><th>P</th><th>U</th><th>L</th><th>H</th><th>E</th><th>E</th><th>M</th><th>S</th>
              </tr>
              <tr>
                <td><input type="text" name="iyob"></td><td><input type="text" name="ipulheems[]"></td><td><input type="text" name="ipulheems[]"></td><td><input type="text" name="ipulheems[]"></td><td><input type="text" name="ipulheems[]"></td><td><input type="text" name="ipulheems[]"></td><td><input type="text" name="ipulheems[]"></td><td><input type="text" name="ipulheems[]"></td><td><input type="text" name="ipulheems[]"></td>
              </tr>
            </table><br><br>
            </div>
            <label>Height(inches) : </label> <input id='short'type="number" name="iheight"><br><br>
            <label>CP.            : </label> <input id='short'type="number" name="icp"><br><br>
            <label>Weight(lbs)    : </label> <input id='short'type="number" name="iweight"><br><br>

            <label>P : </label> <input id='short'type="number" name="ip"><br><br>
            <label>U : </label> <input id='short'type="number" name="iu"><br><br>
            <label>L : </label> <input id='short'type="number" name="il"><br><br>
            <label>S : </label> <input id='short'type="number" name="is"><br><br>

            <label>Date : </label> <input id='short'type="date" name="dateIPulheems"><br><br>

            <div class="section"><span>b</span><p><b>Service PULHEEMS Assessment</b></p></div><br>
            <div style="overflow-x:scroll;">
            <table class='table'>
            
              <tr>
                <th>Y.O.B</th><th>P</th><th>U</th><th>L</th><th>H</th><th>E</th><th>E</th><th>M</th><th>S</th>
              </tr>
              <tr>
                <td><input type="text" name="syob"></td><td><input type="text" name="spulheems[]"></td><td><input type="text" name="spulheems[]"></td><td><input type="text" name="spulheems[]"></td><td><input type="text" name="spulheems[]"></td><td><input type="text" name="spulheems[]"></td><td><input type="text" name="spulheems[]"></td><td><input type="text" name="spulheems[]"></td><td><input type="text" name="spulheems[]"></td>
              </tr>
            </table><br>
            </div>
            <label>Height(inches) : </label> <input id='short'type="number" name="sheight"><br><br>
            <label>CP. : </label> <input id='short'type="number" name="scp"><br><br>
            <label>Weight(lbs) : </label> <input id='short'type="number" name="sweight"><br><br>

            <label>P : </label> <input id='short'type="text" name="sp"><br><br>
            <label>U : </label> <input id='short'type="text" name="su"><br><br>
            <label>L : </label> <input id='short'type="text" name="sl"><br><br>
            <label>S : </label> <input id='short'type="text" name="ss"><br><br>

            <label>Date : </label> <input id='short'type="date" name="dateSPulheems"><br><br>

            <div class="button-section">
              <button type="submit" name="next">Next</button>
            </div>
        </form>
      </div>
    </div>
    </div>
    </main>
  </body>
</html>
