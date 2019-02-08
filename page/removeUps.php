<!DOCTYPE html>
<html>
<head>
<?php include("./web-include/head.php") ?>
</head>
<body>
<?php include("./web-include/navbar.php") ?>
<script src="./web-include/js/updateButton.js"></script>
<div id="content" class="container-fluid">

    <h1>Delete List</h1>
    <div id="alertBox"> </div> 
    <div class="table table-responsive">
        <table id="list">
            <?php include("./web-include/rmList.php")?>
        </table>
    
    
</div>
</body>
</html>