
<?php
    include('../../model/assetDepreciationModel.php');
    $depreciation = new assetDepreciation();
    
    if(isset($_POST['description']))
    {
        $checkDulplicate = $depreciation->checkExist($_POST['description'],$_POST['rbr']);
        if($checkDulplicate == 1)echo '1';   
    }
    else{
        echo 0;
    }
?>

