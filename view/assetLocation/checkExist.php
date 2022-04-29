
<?php

    include('../../model/assetLocationModel.php');
    $location = new assetLocation();
    
    if(isset($_POST['locationName']))
    {
        $checkDulplicate = $location->checkExist($_POST['locationName']);
        if($checkDulplicate == 1)echo '1';   
    }
?>

