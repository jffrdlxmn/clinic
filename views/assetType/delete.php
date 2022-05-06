<?php
    include('../../model/assetTypeModel.php');
    $type = new assetType();
    if(isset($_POST['typeId']))
    {
        $received = $type->delete($_POST['typeId']);
        if($received == 1)echo '1';   
    }
?>




