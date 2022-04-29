<?php
    include('../../model/assetLocationModel.php');
    $location = new assetLocation();
    
    if(isset($_POST['locationName']))
    {
        $received = $location->save($_POST['locationName']);
        if($received == 1)echo '1';   
    }
?>


