<?php
    include('../../model/assetConditionModel.php');
    $condition = new assetCondition();
    
    if(isset($_POST['conditionName']))
    {
        $received = $condition->save($_POST['conditionName']);
        if($received == 1)echo '1';   
    }
?>
