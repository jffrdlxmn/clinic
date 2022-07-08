
<?php
    include('../../model/programModel.php');
    $program = new Program();
    
    if(isset($_POST['program']))
    {
        $checkDulplicate = $program->checkExist($_POST['program']);
        if($checkDulplicate == 1)echo '1';   
    }
?>
