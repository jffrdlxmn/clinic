<?php
    
    include('../../model/personelTitleModel.php');
    $title = new personelTitle();

    if(isset($_POST["titleId"],$_POST["titleName"])){
        $received = $title->update($_POST["titleId"],$_POST['titleName']);
        if($received == 1)echo '1';   
    }
    
?>
