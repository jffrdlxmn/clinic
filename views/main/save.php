<?php
    date_default_timezone_set('Asia/Manila');
    include('../../model/studentModel.php');
    $student = new Student();
    $date= date("d/m/Y");
    
    if(isset($_POST['name'],$_POST['program'],$_POST['studentCtrlNo'],$_POST['healthStatus']))
    {
        $received = $student->save($_POST['name'],$_POST['program'],$_POST['studentCtrlNo'],$_POST['healthStatus'],$date);
        if($received == 1)echo '1';   
    }
?>
