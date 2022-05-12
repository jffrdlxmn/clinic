<?php
    include('../../model/personnelTitleModel.php');
    $title = new personnelTitle();
    
    if(isset($_POST['titleName']))
    {
        $received = $title->save($_POST['titleName']);
        if($received == 1)echo '1';   
    }
?>
