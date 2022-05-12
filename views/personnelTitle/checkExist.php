
<?php
    include('../../model/personnelTitleModel.php');
    $title = new personnelTitle();
    
    if(isset($_POST['titleName']))
    {
        $checkDulplicate = $title->checkExist($_POST['titleName']);
        if($checkDulplicate == 1)echo '1';   
    }
?>
