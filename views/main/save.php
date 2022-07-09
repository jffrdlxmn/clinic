<?php
      include('../../model/studentModel.php');
      $student = new Student();
    
    if(isset($_POST['name'],$_POST['program'],$_POST['studentCtrlNo']))
    {
        $received = $student->save($_POST['name'],$_POST['program'],$_POST['studentCtrlNo']);
        if($received == 1)echo '1';   
    }
?>
