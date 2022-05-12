<?php
    
    include('../../model/personnelTitleModel.php');
    $title = new personnelTitle();

    if(isset($_POST["titleId"],$_POST["titleName"])){
        $received = $title->update($_POST["titleId"],$_POST['titleName']);
        if($received == 1)echo '1';   
    }
    
?>
