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
      <h1>Medical Report</h1>
      <form action="includes/form5.inc.php" method="post">
        <div class="section"><span>6</span>Eyes</div>
        <div class="inner-wrap">
          <table class='table'>
            <tr>
              <th></th> <th>Right</th><th>Left</th><th>CP</th>
            </tr>
            <tr><th>Without Glasses</th><td> <input type="text" name="right"></td><td> <input type="text" name="left"></td><td> <input type="text" name="CP"></td>

            <tr><td><input type="text" name="emptyHeading"></td><td><input type="text" name="emptyRight"></td><td> <input type="text" name="emptyLeft"></td><td> <input type="text" name="emptyCP"></td></tr>
          </table><br><br>

          <label>Diseases, etc : </label><textarea rows = "5" cols = "60" name = "diseases"></textarea><br><br>

          <label>Effect on P. if any : </label><input id='short' type="text" name="effect"><br><br>

          <br>
          <div class="button-section">
            <button type="submit" name="next">Next</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
