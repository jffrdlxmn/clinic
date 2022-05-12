<?php
    include('../../model/personnelGroupModel.php');
    $group = new personnelGroup();
    
    if(isset($_POST['groupId']))
    {
        $received = $group->delete($_POST['groupId']);
        if($received == 1)echo '1';   
    }
?>



