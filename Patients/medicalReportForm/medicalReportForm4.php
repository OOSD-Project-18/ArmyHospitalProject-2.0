<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Report</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/medicalReport2.css">
</head>
<body>
  <div class="medical-report">
    <h1>Medical Report</h1><br><br>
    <div class="inner-wrap">
      <form action="includes/form4.inc.php" method="POST">
        <label>Medical Examiner's Summary of important points in 3 and 4 above with comments and additional information of significance :</label>
        <textarea rows = "20" cols = "60" name = "summary">
        </textarea><br><br>

        <div class="button-section">
          <button type="submit" name="next">Next</button>
        </div>

      </form>
    </div>
  </div>

</body>
</html>
