
<?php
    include('../../model/assetConditionModel.php');
    $condition = new assetCondition();
    
    if(isset($_POST['conditionName']))
    {
        $checkDulplicate = $condition->checkExist($_POST['conditionName']);
        if($checkDulplicate == 1)echo '1';   
    }
?>
