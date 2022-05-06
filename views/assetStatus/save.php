<?php
    include('../../model/assetStatusModel.php');
    $status = new assetStatus();
    
    if(isset($_POST['statusName']))
    {
        $received = $status->save($_POST['statusName']);
        if($received == 1)echo '1';   
    }
?>
