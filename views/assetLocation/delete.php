<?php
    include('../../model/assetLocationModel.php');
    $location = new assetLocation();

    if(isset($_POST['locationId']))
    {
        $received = $location->delete($_POST['locationId']);
        if($received == 1)echo '1';   
    }
?>




