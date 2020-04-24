<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Medical Report</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/medicalReport.css">

  </head>
  <body>
    <div class="medical-report">
      <h1>Medical Report</h1><br>
      <div class="section"><span>12</span>Specialist Reports amd Results of Investigations</div><br>
      <div class="inner-wrap">
        <form action="includes/form11.inc.php" method="post">
            <textarea rows = '30' cols = '150' name = 'sraroi'></textarea><br><br>
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
            <br><label>Date : </label> <input type="date" name="dateOfReport"><br><br>

            <div class="section"><span>a</span><p><b>Initial PULHEEMS Assessment</b></p></div><br>
            <table class='table'>
              <tr>
                <th>Y.O.B</th><th>P</th><th>U</th><th>L</th><th>H</th><th>E</th><th>E</th><th>M</th><th>S</th>
              </tr>
              <tr>
                <td><input type="text" name="iyob"></td><td><input type="text" name="ipulheems[]"></td><td><input type="text" name="ipulheems[]"></td><td><input type="text" name="ipulheems[]"></td><td><input type="text" name="ipulheems[]"></td><td><input type="text" name="ipulheems[]"></td><td><input type="text" name="ipulheems[]"></td><td><input type="text" name="ipulheems[]"></td><td><input type="text" name="ipulheems[]"></td>
              </tr>
            </table><br><br>
            <label>Height(inches) : </label> <input id='short'type="number" name="iheight"><br><br>
            <label>CP.            : </label> <input id='short'type="number" name="icp"><br><br>
            <label>Weight(lbs)    : </label> <input id='short'type="number" name="iweight"><br><br>

            <label>P : </label> <input id='short'type="number" name="ip"><br><br>
            <label>U : </label> <input id='short'type="number" name="iu"><br><br>
            <label>L : </label> <input id='short'type="number" name="il"><br><br>
            <label>S : </label> <input id='short'type="number" name="is"><br><br>

            <label>Date : </label> <input id='short'type="date" name="dateIPulheems"><br><br>

            <div class="section"><span>b</span><p><b>Service PULHEEMS Assessment</b></p></div><br>
            <table class='table'>
              <tr>
                <th>Y.O.B</th><th>P</th><th>U</th><th>L</th><th>H</th><th>E</th><th>E</th><th>M</th><th>S</th>
              </tr>
              <tr>
                <td><input type="text" name="syob"></td><td><input type="text" name="spulheems[]"></td><td><input type="text" name="spulheems[]"></td><td><input type="text" name="spulheems[]"></td><td><input type="text" name="spulheems[]"></td><td><input type="text" name="spulheems[]"></td><td><input type="text" name="spulheems[]"></td><td><input type="text" name="spulheems[]"></td><td><input type="text" name="spulheems[]"></td>
              </tr>
            </table><br>
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
  </body>
</html>
