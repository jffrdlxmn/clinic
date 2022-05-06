
<?php
    include('../../model/assetTypeModel.php');
    $type = new assetType();
    
    if(isset($_POST['typeName']))
    {
        $checkDulplicate = $type->checkExist($_POST['typeName']);
        if($checkDulplicate == 1)echo '1';   
    }
?>

