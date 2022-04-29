<?php
    include('../../model/assetStatusModel.php');
    $status = new assetStatus();
    if(isset($_POST['statusId']))
    {
        $received = $status->delete($_POST['statusId']);
        if($received == 1)echo '1';   
    }
?>
