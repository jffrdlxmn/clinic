<?php
    include('../../model/programModel.php');
    $program = new Program();
    if(isset($_POST['programId']))
    {
        $received = $program->delete($_POST['programId']);
        if($received == 1)echo '1';   
    }
?>



