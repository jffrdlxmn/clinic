
<?php
    include('../../model/personelGroupModel.php');
    $group = new personelGroup();
    
    if(isset($_POST['groupName']))
    {
        $checkDulplicate = $group->checkExist($_POST['groupName']);
        if($checkDulplicate == 1)echo '1';   
    }
?>
