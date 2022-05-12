
<?php
    include('../../model/personnelGroupModel.php');
    $group = new personnelGroup();
    
    if(isset($_POST['groupName']))
    {
        $checkDulplicate = $group->checkExist($_POST['groupName']);
        if($checkDulplicate == 1)echo '1';   
    }
?>
