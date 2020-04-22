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
      <form action="includes/form6.inc.php" method="post">
        <div class="section"><span>7</span>Ears, Nose, Throat</div>
        <div class="inner-wrap">
          <label>Hearing : </label>
          <table class='table'>
            <tr> <th></th> <th>Hears F.W. at </th><th>Hears C.V. at </th> </tr>
            <tr><th>Right</th><td> <input type="text" name="rfw"></td><td><input type="text" name = "rcv"></td></tr>
            <tr><th>Left</th><td> <input type="text" name="lfw"></td><td><input type="text" name = "lcv"></td></tr>
            <tr><th>Both</th><td> <input type="text" name="bothfw"></td><td><input type="text" name = "bothcv"></td></tr>

          </table>
          <br>
          <label>Wax : </label>
          <table class='table'>

            <tr> <th></th> <th>Present </th><th>Removed</th> </tr>

            <tr><th>Right</th><td> <input type="text" name="rpresent" placeholder="Yes/No"></td><td><input type="text" name = "rremoved" placeholder="Yes/No"></td></tr>
            <tr><th>Left</th><td> <input type="text" name="lpresent" placeholder="Yes/No"></td><td><input type="text" name = "lremoved" placeholder="Yes/No"></td></tr>

          </table>

          <br>
          <label>Diseases, etc : </label>
          <textarea rows = "5" cols = "60" name = "diseases">
          </textarea><br><br>

          <table class='table'>
          <tr><th> H </th> </tr>

          <tr><td>  <input type="text" name="h"></td></tr>

          </table>
          <br>
          <label>Effect on P. if any : </label> <input id= 'short' type="text" name="effect"><br>
          <br><br>
          <div class="button-section">
            <button type="submit" name="next">Next</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
