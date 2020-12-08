<?php
include_once __DIR__ .
'/../includes/DatabaseFunctions.php';?>

<!doctype html>
<html>

<head>
  <title><?=$title?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/eqtools.css">
</head>

<body>
  <header>
    <h1 id="title"><?=$title?></h1>
  </header>
  <!--  <nav>-->
  <div class="collapsible-menu">
    <input class="menu" type="checkbox" id="menu" />
    <label class="menu-icon" for="menu">Menu</label>
    <div class="menu-content">
      <ul id="nav">
        <li><a href="index.php">Quorum&nbsp;Maintenance
          </a>
          <ul>
            <li><a href="/public/elders.php">Quorum&nbsp;Member&nbsp;Maint.</a></li>
          </ul>
        </li>
        <li><a href="index.php">Ministering</a>
          <ul>
            <li><a href="/public/districts.php">District&nbsp;Maint.</a></li>
            <li><a href="/public/companions.php">Companionship&nbsp;Maint.</a></li>
            <li><a href="/public/households.php">Household&nbsp;Maint.</a></li>
          </ul>
        </li>
        <li><a href="index.php">Ward&nbsp;Mission</a>
          <ul>
            <li><a href="/public/missionroles.php">Mission&nbsp;Roles</a></li>
            <li><a href="/public/bomclass.php">Book&nbsp;of Mormon&nbsp;Class</a></li>
            <li><a href="/public/missionaries.php">Missionaries</a></li>
            <li><a href="/public/missionprep.php">Missionary&nbsp;Prep Class</a></li>
          </ul>
        </li>
        <li><a href="index.php">Temple/Family&nbsp;History</a>
          <ul>
            <li><a href="/public/consultants.php">Consultants</a></li>
            <li><a href="#">Temple&nbsp;Preparation</a>
              <ul>
                <li><a href="/public/templeclasses.php">Class&nbsp;Maint.</a></li>
                <?php prepMenu();?>
              </ul>
            </li>
            <li><a href="#">Temple&nbsp;Trips</a>
              <ul>
                <li><a href="/public/templetrips.php">Trip Maint.</a></li>
                <?php tripMenu();?>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="index.php">Building&nbsp;Maintenance</a>
          <ul>
            <li><a href="/public/teams.php">Team Maintenance</a></li>
            <?php maintenanceMenu();?>
          </ul>
        </li>
        <li><a href="index.php">Quorum&nbsp;Committees</a>
          <ul>
            <li><a href="/public/committees.php">Committee&nbsp;Maintenance</a></li>
            <?php committeeMenu();?>
          </ul>
        </li>
      </ul>
    </div>
    <br><br>
  </div>
  <!--  </nav>-->

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
