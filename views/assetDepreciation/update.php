<?php
    include('../../model/assetDepreciationModel.php');
    $depreciaton = new assetDepreciation();

    if(isset($_POST["id"],$_POST["description"])){
        $received = $depreciaton->update($_POST["id"],$_POST['description'],$_POST['rbr']);
        if($received == 1)echo '1';   
    }
    
?>



