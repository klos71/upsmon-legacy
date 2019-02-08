<!DOCTYPE html>
<html>
<head>
<?php include("./web-include/head.php") ?>
</head>
<body>
<?php include("./web-include/navbar.php") ?>

<div id="content" class="container-fluid">
<form method="post" action="./../server/upsHandeling/newUps.php" id="removalForm">
    <div class="form-group">
        <label> UPS-Name: </label>
        <input type="text" name="upsname" class="form-control"><br>
    </div>
    <div class="form-group">
        <label>Controller Ip Adress:</label>
        <input type="text" name="ipadress" class="form-control">
    </div>
    <input type="submit" Value="Add UPS" class="btn btn-primary" ><br>
</form>
    
    
</div>
</body>
</html>