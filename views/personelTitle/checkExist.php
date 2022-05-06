
<?php
    include('../../model/personelTitleModel.php');
    $title = new personelTitle();
    
    if(isset($_POST['titleName']))
    {
        $checkDulplicate = $title->checkExist($_POST['titleName']);
        if($checkDulplicate == 1)echo '1';   
    }
?>
