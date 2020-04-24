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

      <form action="includes/form9.inc.php" method="post">
        <div class="section"><span>10</span>Mental Capacity and Emotional stability</div><br>
        <div class="inner-wrap">
          <div class="section"><span>a</span><p><b>Speech</b></p></div><br>
          <textarea rows = "10" cols = "60" name = "speech">
          </textarea><br><br>

          <div class="section"><span>b</span><p><b>Evidence Suggesting</b></p></div><br>
          <label> Mental Backwardness :</label>
          <textarea rows = "6" cols = "60" name = "mentalBackwardness">
          </textarea><br><br>
          <label> Emotional Instability :</label>
          <textarea rows = "6" cols = "60" name = "emotionalInstability">
          </textarea><br><br>


          <table class='table'>
          <tr><th> M </th> <th> S </th> </tr>
          <tr><td>  <input type="text" name="m"></td><td>  <input type="text" name="s"></td></tr>
          </table><br><br>
          <label> Effect on P. if any :</label><input type="text" name="effect"><br><br>

          <div class="button-section">
            <button type="submit" name="next">Next</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
