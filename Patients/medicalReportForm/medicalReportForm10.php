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
      <form action="includes/form10.inc.php" method="post">
        <div class="section"><span>11</span>Each Examiner will initial here and indicate any specialist examinations or other investigations considered necessary before a final #### assessment is given</div><br>
        <div class="inner-wrap">
          <br><br><div class="section"><span>1</span></div><label><input type="text" name="one"><br><br> Initials of examiner </label><input type="text" name="initials1"><br><br>
          <div class="section"><span>2</span></div><label><input type="text" name="two"><br><br> Initials of examiner </label><input type="text" name="initials2"><br><br>
          <div class="section"><span>3</span></div><label><input type="text" name="three"><br><br> Initials of examiner </label><input type="text" name="initials3"><br><br>
          <div class="section"><span>4</span></div><label><input type="text" name="four"><br><br> Initials of examiner </label><input type="text" name="initials4"><br><br>
        </div>

        <div class="button-section">
          <button type="submit" name="next">Next</button>
        </div>
      </form>
    </div>
  </body>
</html>
