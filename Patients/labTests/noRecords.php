<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Basci ECG Request</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/labTestRequests.css">
  </head>
  <body>
    <div class="form-style">
      <?php
        $h1 = $_SESSION['h1'];
        $h2 = $_SESSION['h2'];
      ?>
      <h1><?php echo $h1; ?></h1>
      <h2><?php echo $h2; ?></h2>
      <h2>No Records to Display</h2>
      
      <form action="../labtests.php" method="post">
        <div class="button-section">
          <button type="button" name="back">Back</button>
        </div>
      </form>

    </div>

  </body>
</html>
