<?php
    include('../../model/personelTitleModel.php');
    $title = new personelTitle();
    
    if(isset($_POST['titleId']))
    {
        $received = $title->delete($_POST['titleId']);
        if($received == 1)echo '1';   
    }
?>



