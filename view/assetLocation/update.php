<?php
    include('../../model/assetLocationModel.php');
    $location = new assetLocation();

    if(isset($_POST["locationId"],$_POST["locationName"])){
        $received = $location->update($_POST["locationId"],$_POST['locationName']);
        if($received == 1)echo '1';   
    }
    
?>




