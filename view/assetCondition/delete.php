<?php
    include('../../model/assetConditionModel.php');
    $condition = new assetCondition();
    if(isset($_POST['conditionId']))
    {
        $received = $condition->delete($_POST['conditionId']);
        if($received == 1)echo '1';   
    }
?>



