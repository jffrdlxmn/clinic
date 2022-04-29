<?php
    include('../../model/assetTypeModel.php');
    $type = new assetType();

    if(isset($_POST["typeId"],$_POST["typeName"])){
        $received = $type->update($_POST["typeId"],$_POST['typeName']);
        if($received == 1)echo '1';   
    }
    
?>




