<?php
    include('../../model/personelGroupModel.php');
    $group = new personelGroup();
    
    if(isset($_POST['groupId']))
    {
        $received = $group->delete($_POST['groupId']);
        if($received == 1)echo '1';   
    }
?>



