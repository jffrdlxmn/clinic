<?php
    include('../../model/personnelGroupModel.php');
    $group = new personnelGroup();
    
    if(isset($_POST['groupName']))
    {
        $received = $group->save($_POST['groupName']);
        if($received == 1)echo '1';   
    }
?>
