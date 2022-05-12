<?php
    include('../../model/personnelTitleModel.php');
    $title = new personnelTitle();;
    
    if(isset($_POST['titleId']))
    {
        $received = $title->delete($_POST['titleId']);
        if($received == 1)echo '1';   
    }
?>



