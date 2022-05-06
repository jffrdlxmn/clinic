<?php
    include('../../model/assetStatusModel.php');
    $status = new assetStatus();
    
    if(isset($_POST['statusName']))
    {
        $checkStatus = $status->checkExist($_POST['statusName']);
        if($checkStatus == 1)echo '1';   
    }
?>
