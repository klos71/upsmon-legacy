//function to reload list after update or removal
function reload(listType){
    if(listType == "ups-list"){
        $("#list").load("./web-include/Ups-list.php"); 
    }else if(listType == "rmUps"){
        $("#list").load("./web-include/rmList.php");
    }
    
}
//function to update ups list with POST request to API
function updateUps(name, controller, number){

        $.ajax({
            type: "POST",
            url: "./web-include/updateUpsList.php",
            data: { method: "update", upsname: name, ip: controller,upsnumber: number}
        }).done(function(){
            //alert("Updated ups: " + name);
            reload("ups-list");
        });
    
    
}
//function to remove UPS from list with the click of a button
function removeUps(serial){
    var txt;
    if(confirm("Do you want to remove ups with serial: " + serial)){
        txt = "Removed Ups: " + serial;
        $.ajax({
            type: "POST",
            url: "./web-include/updateUpsList.php",
            data: { method: "remove", serial: serial}
        }).done(function(){
            //alert("Updated ups: " + name);
            reload("rmUps");
        });
    }else{
        txt="Removal Canceled!"
    }
    document.getElementById("alertBox").innerHTML = "<div class='alert alert-info' style='min-width: 100%;'>" + txt + "</div>";
}
