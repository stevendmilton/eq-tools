<?php
include_once __DIR__ .
'/../includes/DatabaseFunctions.php';?>

<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/eqtools.css">
  <title><?=$title?></title>
</head>

<body>
  <header>
    <h1 id="title"><?=$title?></h1>
  </header>
  <nav>
    <ul id="nav">
      <li><a href="index.php">Quorum Maintenance
        </a>
        <ul>
          <li><a href="elders.php">Quorum Member Maint.</a></li>
        </ul>
      </li>
      <li><a href="#">Ministering</a>
        <ul>
          <li><a href="districts.php">District Maint.</a></li>
          <li><a href="companions.php">Companionship Maint.</a></li>
          <li><a href="households.php">Household Maint.</a></li>
        </ul>
      </li>
      <li><a href="#">Ward Mission</a>
        <ul>
          <li><a href="missionroles.php">Mission Roles</a></li>
          <li><a href="bomclass.php">Book of Mormon Class</a></li>
          <li><a href="missionaries.php">Missionaries</a></li>
          <li><a href="missionprep.php">Missionary Prep Class</a></li>
        </ul>
      </li>
      <li><a href="#">Temple/Family History</a>
        <ul>
          <li><a href="consultants.php">Consultants</a></li>
          <li><a href="#">Temple Preparation</a>
            <ul>
              <li><a href="templeclasses.php">Class Maint.</a></li>
              <?php prepMenu();?>
            </ul>
          </li>
          <li><a href="#">Temple Trips</a>
            <ul>
              <li><a href="templetrips.php">Trip Maint.</a></li>
              <?php tripMenu();?>
            </ul>
          </li>
        </ul>
      </li>
      <li><a href="#">Building Maintenance</a>
        <ul>
          <li><a href="teams.php">Team Maintenance</a></li>
          <?php maintenanceMenu();?>
        </ul>
      </li>
      <li><a href="#">Quorum Committees</a>
        <ul>
          <li><a href="committees.php">Committee Maintenance</a></li>
          <?php committeeMenu();?>
        </ul>
      </li>
    </ul>
    <br><br>
  </nav>

  <main>
    <?php if (isset($output)) {echo $output;}?>
  </main>

  <footer>
    The contents of this web page are copyright &copy;
    2016&ndash;<?php echo date('Y'); ?> Steven Milton
    All Rights Reserved.
  </footer>
</body>

</html>
