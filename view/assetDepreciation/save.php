<?php
    include('../../model/assetDepreciationModel.php');
    $depreciaton = new assetDepreciation();
    
    if(isset($_POST['description']))
    {
        $received = $depreciaton->save($_POST['description'],$_POST['rbr']);
        if($received == 1)echo '1';   
    }
?>


