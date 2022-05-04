<?php
    include('../../model/assetDepreciationModel.php');
    $depreciaton = new assetDepreciation();
    if(isset($_POST['depreciationId']))
    {
        $received = $depreciaton->delete($_POST['depreciationId']);
        if($received == 1)echo '1';   
    }
?>




