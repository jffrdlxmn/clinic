<?php
    include('../../model/assetTypeModel.php');
    $type = new assetType();
    
    if(isset($_POST['typeName']))
    {
        $received = $type->save($_POST['typeName']);
        if($received == 1)echo '1';   
    }
?>


