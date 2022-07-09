<?php
    include('../../model/studentModel.php');
    $student = new Student();
    if(isset($_POST['id']))
    {
        $received = $student->delete($_POST['id']);
        if($received == 1)echo '1';   
    }
?>



