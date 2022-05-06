<?php
    
    include('../../model/assetStatusModel.php');
    $status = new assetStatus();
    if(isset($_POST["statusId"],$_POST["statusName"])){

        $received = $status->update($_POST["statusId"],$_POST['statusName']);
        if($received == 1)echo '1';   
    }
    
?>

