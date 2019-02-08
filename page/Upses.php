<!DOCTYPE html>
<html>
<head>
<?php include("./web-include/head.php") ?>
</head>
<body>
<?php include("./web-include/navbar.php") ?>
<script src="./web-include/js/updateButton.js"></script>
<div id="content" class="container-fluid">

    <h1> UPS List <!-- <button style="float:right;" class="btn btn-success" onclick="updateUps('all')">Update All</button>--></h1>
    <div class="table table-responsive">
        
        <table id="list">
            <?php include("./web-include/Ups-list.php")?>
        </table>
    </div>
    
    
</div>
</body>
</html>