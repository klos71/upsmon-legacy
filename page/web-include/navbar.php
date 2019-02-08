<?php //Navbar for every web page ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="./">Upsmon</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="./">Home</a></li>
      <li><a href="Upses.php">UPS List</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">UPS
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="addUps.php">Add UPS</a></li>
          <li><a href="removeUps.php">Remove UPS</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>