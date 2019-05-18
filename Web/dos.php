<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title>LeD</title>
</head>
<body>

  <style>
    body {
      height: 100%;
      padding-top: 150px;
      font-family: Gill Sans,Gill Sans MT,Calibri,sans-serif;
      background-color: #001628;
    }

    .head {
      font-size: 20px;
    }

    .bg {
      background-image: url("megaoof.png");
      height: 200%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: auto;
    }

    table,th,td {
      border: 1px solid black;
      border-collapse: collapse;
    }

    th,td {
      padding: 5px;
      text-align: left;
    }

    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      text-align: center;
      margin: auto;
      width: 30%;
      border: 5px solid #00ffff;
      padding: 10px;
    }

    .button {
      background-color: #555555;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }

    .tbox {
      background-color: #555555;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
    }


  </style>

<div class="">
  <div class="container">
    <h2>Mission Control</h2>
      <p class="head">Change IP then hit Start to begin Ping</p>

      <?php
      if (isset($_POST['submit1'])) {
      $file = fopen("active.txt","w+") or die("file no open :(");

      $s = "<p>"."1"."</p>"."\n";
      fputs($file,$s) or die("Data didnt write :(");

      fclose($file);
      }
     ?>

     <?php
     if (isset($_POST['submit2'])) {
       $file = fopen("active.txt","w+") or die("file no open :(");

       $s = "<p>"."0"."</p>"."\n";
       fputs($file,$s) or die("Data didnt write :(");

       fclose($file);
       }
      ?>
  <br>
    <form class="" action="#" method="post">
      <input class="button" type="submit" name="submit1" value="Start">
      <input class="button" type="submit" name="submit2" value="Stop">
      <br>
    </form>
  <br>

    <h1>Activity</h1>
      <div class="check">
        <?php
          $myfile = fopen("active.txt", "r") or die("Unable to open file!");
          echo fread($myfile,filesize("active.txt"));
          fclose($myfile);
        ?>
      </div>

      <br>

      <?php
      if (isset($_POST['submit'])) {
        $ip = $_POST['ip'];

        $file = fopen("ip.txt","w+") or die("file no open :(");

        $s = "<p>".$ip."</p>"."\n";
        fputs($file,$s) or die("Data didnt write :(");

        fclose($file);
        }
       ?>

      <form class="" action="#" method="post">
        <input class="tbox" type="text" name="ip">
        <input class="button" type="submit" name="submit" value="Change IP">
        <br>
      </form>

    <h1>Current IP</h1>
      <div class="ip">
        <?php
        $myfile = fopen("ip.txt", "r") or die("Unable to open file!");
        echo fread($myfile,filesize("ip.txt"));
        fclose($myfile);
      ?>
    </div>

  </div>
</div>

</body>
</html>
