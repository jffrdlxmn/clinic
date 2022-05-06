<?php
    include('../../model/personelGroupModel.php');
    $group = new personelGroup();
    
    if(isset($_POST['groupName']))
    {
        $received = $group->save($_POST['groupName']);
        if($received == 1)echo '1';   
    }
?>
