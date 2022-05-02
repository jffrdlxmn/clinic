<?php
    include('../../model/personelTitleModel.php');
    $title = new personelTitle();
    
    if(isset($_POST['titleName']))
    {
        $received = $title->save($_POST['titleName']);
        if($received == 1)echo '1';   
    }
?>
