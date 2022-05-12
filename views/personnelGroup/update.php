<?php
    
    include('../../model/personnelGroupModel.php');
    $group = new personnelGroup();

    if(isset($_POST["groupId"],$_POST["groupName"])){
        $received = $group->update($_POST["groupId"],$_POST['groupName']);
        if($received == 1)echo '1';   
    }
    
?>
