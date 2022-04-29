<?php
    
    include('../../model/assetConditionModel.php');
    $condition = new assetCondition();

    if(isset($_POST["conditionId"],$_POST["conditionName"])){
        $received = $condition->update($_POST["conditionId"],$_POST['conditionName']);
        if($received == 1)echo '1';   
    }
    
?>




